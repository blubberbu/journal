<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $user = User::find(Session::get('userID'));
            
            return view('home', compact('user'));
        }
        
        return view('guest');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // validation rules
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password-confirm' => 'required|same:password'
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
