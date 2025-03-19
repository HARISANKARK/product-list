<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:8'
        ]);

        try
        {
            $
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
