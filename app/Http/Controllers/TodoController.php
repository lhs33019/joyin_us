<?php

namespace App\Http\Controllers;

use App\Todo;
use App\TodoList;
use App\User;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getTodoLists() {

        $lists = TodoList::where('user_id',\Auth::user()->id)->get();

        $timeover = 0;
        $todos = Todo::where('user_id',\Auth::user()->id)->get();

        $ldate = date('Y-m-d H:i:s');


        return view('Todo/todo_main',['lists' => $lists]);

    }

    public function getTodoList($id) {

        $list = TodoList::find($id);

        if($list == null) {
            abort(404);
        }

        if($list->user_id != \Auth::user()->id) {
            abort(403);
        }


        $seq = json_decode($list->todo_seq,true);

        $todos = [];

        for ($i =1; $i<$list->todo_count+1; $i++) {

            $todos[$i] = Todo::find($seq[$i]);

        }

        return view('Todo/todo_list_detail',['list' => $list, 'todos' => $todos]);

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


    public function getTodo($id) {
        return redirect(route('todoList'));
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
            ])->validate();
        } catch (ValidationException $e) {
            abort(static::VALIDATION_FAILED);
        }
        $todo['due_date'] = $duedate;
        $todo['todo_list_id'] = $request->list_id;
        $todo['user_id'] = \Auth::user()->id;

        $todo = Todo::create($todo);

        if($todo==null) {
            return abort(409);
        }

        $seq = json_decode($list->todo_seq,true);
        for($i=$list->todo_count+1; $i>$request->seq;  $i--) {
            $seq[$i] = $seq[$i-1];
        }
        $seq[$request->seq] = $todo['id'];
        $list->todo_seq = json_encode($seq);
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
                'due_date' => 'string|nullable|regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}/'
            ])->validate();
        } catch (ValidationException $e) {
            abort(static::VALIDATION_FAILED);
        }

        $validated['todo_list_id'] = $request->list_id;
        $validated['user_id'] = \Auth::user()->id;
        $validated['isComplete'] = $request->isComplete;

        $todo->update($validated);

        if($todo==null) {
            return abort(409);
        }

        //TODO: 배열 2->5 바꾼다할때 3,4,5가 앞으로 한칸씩 당겨져야한다. 5->2는 반대
        if ($request->seq != null) {

            $seq = json_decode($list->todo_seq,true);
            for($i=$request->todo_count+1; $i>$request->index;  $i--) {
                $seq[$i] = $seq[$i-1];
            }
            $seq[$request->seq] = $todo['id'];
            $list->todo_seq = json_encode($seq);
            $list->update();
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

        $seq = json_decode($list->todo_seq,true);
        for($i=$request->id; $i<$list->todo_count;  $i++) {
            $seq[$i] = $seq[$i+1];
        }

        //TODO: 삭제하고 순서 바뀌는거 버그 수정
        unset($seq[$list->todo_count]);
        $list->todo_seq = json_encode($seq);
        $list->todo_count = $list->todo_count -1;
        $list->update();




        return redirect(route('todoList').'/'.$request->list_id);
    }
}
