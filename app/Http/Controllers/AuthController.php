<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|email:rfc,dns|exists:users,email|bail',
            'password'  => 'required|string|bail',
        ]);
        $Input = $validator->validate();
        if (Auth::guard('web')->attempt(['email' => $Input['email'], 'password' => $Input['password']])) {
            return redirect('dashboard');
        }else{
            Session::flash('error', 'Email atau Password Salah');
        }
    }

}
