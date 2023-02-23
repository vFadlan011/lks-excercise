<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    use HasFactory;

    public function login(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:30|exists:users,username',
            'password' => 'required'
        ]);

        if (Auth::attempt($validatedData, $request->remember == "on")) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['wrong' => 'Wrong username or password']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
