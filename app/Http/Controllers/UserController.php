<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // validation rules
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password-confirm' => 'required|same:password',
            'agreement' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'register');
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('/login');
    }
}
