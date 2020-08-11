<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * CabinetController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @returns the view for the user account
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Auth::user()->orders()->where('status', 1)->get();

        return view('site.cabinet', ['user' => $user, 'orders'=> $orders]);
    }

    /**
     * @returns the view for the user order
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        $products = $order->products()->get();

        return view('site.show_order', compact('order', 'products'));
    }

}
