<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function create() {
        return view('register', [
            'title' => 'Registrasi'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username|max:30',
            'password' => 'required',
            'name' => 'required|max:100',
            'description' => 'required|max:65535',
            'regional' => 'required|max:60',
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['birthdate'] = strtotime($request->birthdate);

        $user = User::create($validatedData);

        return redirect()->intended('/login');
    }

    public function index() {
        return view('profile', [
            'title' => 'Profil Saya',
            'profile' => Auth::user()
        ]);
    }
}
