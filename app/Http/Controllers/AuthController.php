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
            'login' => 'required',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'empnumber' => $request->login, 'password' => $request->password
        ];

        return Auth::attempt($credentials, $request->remember) ? redirect()->intended(route('home')) : back()->withErrors(['login' => 'The provided credentials do not match our records.']);
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
            'email' => 'required|string|email|unique:users',
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
