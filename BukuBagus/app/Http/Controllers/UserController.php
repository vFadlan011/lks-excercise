<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function index() {
        return view('register');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'username' =>
            'required|alpha_dash|min:5|max:12|unique:users,username',
            'password' => 'required|min:5|max:12',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public static function getUserById($user_id) {
        return User::find($user_id);
    }
}
