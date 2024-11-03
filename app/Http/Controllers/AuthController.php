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
        $users = User::all();
        return view('auth.register', compact('users'));
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'emp_image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'empnumber' => 'required|string|unique:users',
            'empname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $empImage = null;
        if ($request->hasFile('emp_image')) {
            $empImage = $request->file('emp_image')->store('emp_images', 'public');
        }

        $user = User::create([
            'emp_image' => $empImage,
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

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('register')->with('success', 'Employee deleted successfully.');
    }
}
