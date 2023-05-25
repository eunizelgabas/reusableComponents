<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home() {
        return inertia('Home');
    }

    public function loginForm() {
        return inertia('Login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = auth()->attempt($request->all());

        if($login)
            return redirect('/users');
        else
            return back()->withErrors(['authentication'=>'Invalid username and/or password.']);
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
