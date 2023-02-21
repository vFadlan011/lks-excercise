<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function auth(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        if (Auth::attempt($validatedData, $request->remember == "on")) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'username' => "Wrong username or password"
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
