<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Queries\OrdersQueryBuilder;

class OrderController extends Controller
{
    public function index(OrdersQueryBuilder $ordersQueryBuilder)
    {

        $order = $ordersQueryBuilder->getOrders();
        return view('admin.order.index', compact('order'));
    }

    public function create()
    {
        return view('admin.order.create');
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

        session(['alert' => __("Заказ создан")]);

        return redirect(route("admin.order.index"));
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(Order $order, Request $request)
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

        session(['alert' => __("Заказ сохранен")]);

        return redirect(route("admin.order.index"));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        session(['alert' => __("Заказ " . $order->id . " успешно удален")]);
    }
}
