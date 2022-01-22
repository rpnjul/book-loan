<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::with('users')->get();
        return view('admin.dashboard');
    }
}
