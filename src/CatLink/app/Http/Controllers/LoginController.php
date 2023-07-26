<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function register($token) {
        User::where('token', $token)->whereNull('password')->firstOrFail();

        return view('login.register', compact('token'));
    }

    public function registerSubmit($token, Request $request) {
        $request->validate([
            'username' => 'required|unique:users|min:3|max:20',
            'password' => 'required|max:100',
            'profile_link' => 'required|max:2000',
        ]);

        $user = User::where('token', $token)->whereNull('password')->firstOrFail();

        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->profile_link = $request->input('profile_link');
        $user->role = 'user';
        $user->state = 'active';
        $user->save();

        Auth::login($user);

        return redirect()->route('user');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function login() {
        return view('login.login');
    }

    public function loginSubmit(Request $request) {
        /*$credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        return redirect()->route('login')->withErrors(['Wrong username or password']);*/

        return "TODO";
    }
}
