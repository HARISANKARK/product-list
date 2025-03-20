<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class LoginController extends Controller
{
    public function LoginCreate()
    {
        return view('login.create');
    }
    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return view('home');
        }

        return redirect()->back()->with('danger','Invalid Login Credentials!');
    }

    public function Logout()
    {
        auth::logout();
        return view('login.create');
    }
}
