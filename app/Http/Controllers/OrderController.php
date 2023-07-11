<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Order\Store;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function store(Order $order, Store $request)
    {
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->text = $request->input('textInfo');
        $order->save();

        session(['alert' => __("Заказ отправлен")]);

        return redirect(route("order"));
    }
}
