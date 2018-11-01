<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Exception;


class UserController extends Controller
{
    public function register(Request $request)
    {

        $user = User::whereUsername($request->username)->first();



        $user = new User;


        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;


        try {
            $user->save();
        }
        catch (\Exception $e) {
            abort(408, "create error");
    }

        return redirect(Request::root());
    }

    public function login(Request $request)
    {

        //$user = User::find($request->)
        $request->name;
        return redirect()->route('localhost:8080/user',
            response()->json([
                'Error' => 408
            ]));

        return response()->json(['title'=>'login']);
    }
}
