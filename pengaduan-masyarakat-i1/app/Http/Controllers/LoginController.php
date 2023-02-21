<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index() {
        return view('login', [
            'title' => 'login'
        ]);
    }
    public function auth(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:30',
            'password' => 'required'
        ]);

        if (Auth::attempt($validatedData, $request->remember === "on")) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'Username atau password salah'
        ]);
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
