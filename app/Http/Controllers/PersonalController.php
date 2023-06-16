<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        return view('personal.index');
    }

    public function auth(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        return response()->json(compact("login", "password", "remember"));
    }
}
