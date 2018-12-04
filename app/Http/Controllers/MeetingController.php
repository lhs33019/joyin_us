<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\User;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use DB;

class MeetingController extends Controller
{
    public function getMeetings() {

        $meetings = Meeting::query()->where('due_date','<',date('Y-m-d H:i'))
            ->orWhere('due_date', '=', null)->orderBy('created_at', 'desc')->get();

        return view('/Meeting/card',['meetings' => $meetings]);

    }

    public function createMeeting(Request $request) {

        $duedate = $request->date.' '.$request->time;
        if ($duedate == ' ') {
            $duedate = null;
        }
        $request['due_date'] = $duedate;

        $validated = null;

        try {
            $validated = \Validator::make($request->all(), [
                'title' => 'required|string',
                'content' => 'string|nullable',
                'due_date' => 'string|nullable|regex:/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}/',
                'limit' => 'numeric|nullable',
            ])->validate();
        } catch (ValidationException $e) {
            abort(static::VALIDATION_FAILED);
        }

        $meeting = Meeting::create($validated);

        $meeting->addUser(\Auth::user());

        return redirect(route('card'));

    }

    public function join_meeting($id) {

        $meeting = Meeting::query()->where('id','=',$id)->firstOrFail();

        $meeting->addUser(\Auth::user());

        return redirect()->route('card');
    }
}
