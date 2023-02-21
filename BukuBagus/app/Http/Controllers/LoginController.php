<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData, $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        // if not logged in
        if (Auth::user() == null) {
            return redirect('/');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
