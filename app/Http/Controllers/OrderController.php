<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function store(Order $order, Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:30'],
                'phone' => ['required', 'string'],
                'email' => ['required', 'string', 'email'],
                'textInfo' => ['required', 'string', 'max:250'],
            ]
        );

        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->text = $request->input('textInfo');
        $order->save();

        session(['alert' => __("Заказ отправлен")]);

        return redirect(route("order"));
    }
}
