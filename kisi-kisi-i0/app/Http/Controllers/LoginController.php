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
            'username' => 'required|max:30|exists:users,username',
            'password' => 'required',
        ]);


        if (Auth::attempt($validatedData, $request->remember == "on")) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['error' => 'Wrong username or password']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
