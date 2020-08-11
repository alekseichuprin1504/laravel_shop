<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;

class AdminOrderController extends Controller
{
    /**
     * Method to view all orders
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::active()->get();

        return view('admin.admin-orders', compact('orders'));
    }

    /**
     * method to view one order
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        $products = $order->products()->withTrashed()->get();

        return view('admin.order-view', compact('order', 'products'));
    }
}
