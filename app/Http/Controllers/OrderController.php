<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:30'],
                'phone' => ['required', 'string'],
                'email' => ['required', 'string', 'email'],
                'textInfo' => ['required', 'string', 'max:250'],
            ]
        );

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $textInfo = $request->input('textInfo');

        session(['alert' => __("Заказ отправлен")]);

        return redirect(route("order"));
    }
}
