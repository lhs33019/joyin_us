<?php

namespace App\Http\Controllers;

use App\Todo;
use App\TodoList;
use App\User;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class TodoController extends Controller
{
    public function getTodoLists() {

        $lists = TodoList::where('user_id',\Auth::user()->id)->get();

        $ldate = date('Y-m-d H:i');

        $todos = Todo::where('user_id',\Auth::user()->id)->where('due_date','<',$ldate)->get();

        return view('Todo/todo_main',['lists' => $lists, 'count' => count($todos), 'todos' => $todos]);

    }

    public function getTodoList($id) {

        $list = TodoList::find($id);

        if($list == null) {
            abort(404);
        }

        if($list->user_id != \Auth::user()->id) {
            abort(403);
        }

        $todos = DB::table('todos')->where('todo_list_id',$list->id)->orderBy('seq')->get();

        //return response()->json($todos);

        $data = array(
            'list' => $list,
            'todos' => $todos,
        );
        return view('Todo/todo_list_detail')->with($data);

    }


    public function createTodoList(Request $request) {

        $list = new TodoList;

        $list->name = $request->name;
        $list->user_id = \Auth::user()->id;

        $list->save();

        return redirect(route('todoList'));


    }

    public function updateTodoList(Request $request, $id) {

        $list = TodoList::find($id)->get()->firstOrFail();

        if ($list->user_id != \Auth::user()->id) {
            abort(403,"PERMISSION DENIED");
        }

        $list->name = $request->name;

        $list->update();

        return redirect(url(''));

    }

    public function deleteTodoList(Request $request) {

        $list = TodoList::find($request->id);

        if($list == null) {
            abort(404);
        }

        if ($list->user_id != \Auth::user()->id) {
            abort(403,"PERMISSION DENIED");
        }

        $todos = Todo::where('todo_list_id',$list->id)->get();

        foreach ($todos as $key => $value) {
            $value->delete();
        }

        $list->delete();


        return redirect(route('todoList'));

    }


    public function getTodo($listId, $todoId) {

        $list = TodoList::find($listId);
        $todo = Todo::find($todoId);

        return view('Todo/todo_edit_view',['todo' => $todo, 'list' => $list]);
    }

    public function createTodo(Request $request) {

        $duedate = $request->date.' '.$request->time;
        $list = TodoList::find($request->list_id);


        if ($duedate == ' ') {
            $duedate = null;
        }

        $request['due_date'] = $duedate;

        try {
            $todo = \Validator::make($request->all(), [
                'title' => 'required|string',
                'content' => 'string',
                'due_date' => 'string|nullable|regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}/',
                'seq'      => 'numeric',
            ])->validate();
        } catch (ValidationException $e) {
            abort(static::VALIDATION_FAILED);
        }
        $todo['due_date'] = $duedate;
        $todo['todo_list_id'] = $request->list_id;
        $todo['user_id'] = \Auth::user()->id;

        for ($i=$list->todo_count+1;$i>$request->seq;$i--) {

            $past_seq = Todo::where('todo_list_id',$list->id)->where('seq',($i-1))->first();
            $past_seq->seq = $i;
            $past_seq->update();
        }
        $todo = Todo::create($todo);

        if($todo==null) {
            return abort(409);
        }

        

        $list->todo_count = $list->todo_count +1;
        $list->update();

        return redirect(route('todoList').'/'.$request->list_id);

    }

    public function updateTodo(Request $request, $id) {

        $todo = Todo::find($request->id);

        $duedate = $request->date.' '.$request->time;

        if ($duedate == ' ') {
            $duedate = $todo->due_date;
        }

        $request['due_date'] = $duedate;

        $list = TodoList::find($request->list_id);


        try {
            $validated = \Validator::make($request->all(), [
                'title' => 'required|string',
                'content' => 'string',
                'due_date' => 'string|nullable|regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}/',
            ])->validate();
        } catch (ValidationException $e) {
            abort(static::VALIDATION_FAILED);
        }

        $validated['todo_list_id'] = $request->list_id;
        $validated['user_id'] = \Auth::user()->id;
        $validated['isComplete'] = $request->isComplete;

        //TODO: 배열 2->5 바꾼다할때 3,4,5가 앞으로 한칸씩 당겨져야한다. 5->2는 반대
        if ($request->seq != null) {

            if($request->seq > $todo->seq) {
                for ($i=$todo->seq;$i<$request->seq;$i++) {

                    $past_seq = Todo::where('todo_list_id',$list->id)->where('seq',($i+1))->first();
                    $past_seq->seq = $i;
                    $past_seq->update();
                }
            }
            elseif($request->seq < $todo->seq) {

                for ($i=$todo->seq;$i>$request->seq;$i--) {

                    $past_seq = Todo::where('todo_list_id', $list->id)->where('seq', ($i - 1))->first();
                    $past_seq->seq = $i;
                    $past_seq->update();
                }
            }
            $validated['seq'] = $request->seq;
        }

        $todo->update($validated);

        if($todo==null) {
            return abort(409);
        }




        //return response()->json($request);
        return redirect(route('todoList').'/'.$request->list_id);

    }

    public function deleteTodo(Request $request, $id) {

        $todo = Todo::find($request->id);
        $list = TodoList::find($request->list_id);

        if($todo == null) {
            abort(404);
        }

        if ($todo->user_id != \Auth::user()->id) {
            abort(403,"PERMISSION DENIED");
        }

        for ($i=$todo->seq;$i<$list->todo_count;$i++) {

            $past_seq = Todo::where('todo_list_id',$list->id)->where('seq',($i+1))->first();
            $past_seq->seq = $i;
            $past_seq->update();
        }

        $todo->forceDelete();

        $list->todo_count = $list->todo_count -1;
        $list->update();

        return redirect(route('todoList').'/'.$request->list_id);
    }
}
