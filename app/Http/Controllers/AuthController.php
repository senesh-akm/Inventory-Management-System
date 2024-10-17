<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
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

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'empnumber' => 'required|string|unique:users',
            'empname' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'empnumber' => $request->empnumber,
            'empname' => $request->empname,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'is_active' => true,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration Successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
