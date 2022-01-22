<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class AuthController extends Controller
{

    public function __construct()
    {

    }
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|email:rfc,dns|exists:users,email|bail',
            'password'  => 'required|string|bail',
        ]);
        $Input = $validator->validate();
        if (Auth::guard('web')->attempt(['email' => $Input['email'], 'password' => $Input['password'],'role_id'=>2])) {
            return redirect()->route('member.dashboard');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->back();
        }
    }

    public function admin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|email:rfc,dns|exists:users,email|bail',
            'password'  => 'required|string|bail',
        ]);
        $Input = $validator->validate();
        if (Auth::guard('admin')->attempt(['email' => $Input['email'], 'password' => $Input['password'],'role_id'=>1])) {
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->back();
        }
    }


}
