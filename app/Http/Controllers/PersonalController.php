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
        $data = $request->only(['login', 'password', 'remember']);

        if (!$request->has('remember')) {
            $data['remember'] = false;
        }
            return "<div style='text-align: center'>Вы успешно авторизовались! <br>
 <p>Login: " . $data['login'] . " </p>
 <p>Пароль: " . $data['password'] . "</p>
 <p>Помнить меня: " . ($data['remember']?"Да":"Нет") . "</p>
 <a href='" . route("personal") . "'> Назад</a></div>";
    }
}
