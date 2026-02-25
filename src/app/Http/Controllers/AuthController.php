<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('pages.auth.login');
    }
    public function register()
    {
        return view('pages.auth.register');
    }
    public function submitLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('user.home')->with('success', 'Login successful');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Logout successful');
    }
    public function submitRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
    
}
