<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        // Validate user input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the intended page
            return redirect()->intended('manufacturer.index')->with('success', 'Login successful!');
        }

        // Login failed
        return back()->withErrors(['password' => 'Invalid password'])->withInput();
    
    }
}
