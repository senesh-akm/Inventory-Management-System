<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            "password" => 'required|min:6'
        ]);

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("home"));
        }

        return redirect(route("login"))->with("error", "Login Failed");
    }
}
