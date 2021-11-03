<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;
use App\Models\Login;

class BackController extends Controller
{
    public function index()
    {
        // $users = session('data_login');
        return view('admin.index');
    }

    public function profile()
    {
        // $users = session('data_login');
        return view('admin.profile');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        //
    }

    public function post_login(Request $request)
    {
        //
    }

    public function post_register(Request $request)
    {
        //
    }
}
