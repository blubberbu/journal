<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, true)) {
            if ($request->remember) {
                Cookie::queue('emailCookie', $request->email, 300);
                Cookie::queue('passwordCookie', $request->password, 300);
            } else {
                Cookie::queue(Cookie::forget('emailCookie'));
                Cookie::queue(Cookie::forget('passwordCookie'));
            }

            Session::put('userID', Auth::user()->id);

            return redirect('/');
        }

        return back()->withErrors('Wrong email or password', 'login');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('userSession');

        return redirect('/');
    }
}
