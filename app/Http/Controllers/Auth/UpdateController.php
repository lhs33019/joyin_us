<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Update Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    /**
     * Update a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Update a user instance after a valid registration.
     *
     * @param  \Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(\Request $request)
    {
        return response()->json($request);
        $data = \Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'numeric|nullable',
            'gender' => 'string',
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::query()->where('id','=',\Auth::user()->id)->firstOrFail();
        $user->update($data);


        return response()->view('main.index');
    }
}
