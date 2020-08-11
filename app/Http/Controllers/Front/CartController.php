<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class CartController extends Controller
{

    /**
     * @returns the view for the cart
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }

        return view('site.cart', compact('order', 'orderId'));
    }

    /**
     * method for adding an item to the cart
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cartAdd(int $productId)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($productId);
        }
        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }
        $product = Product::find($productId);
        Order::changeFullSum($product->price);
        session()->flash('success', 'Добавлен товар '.$product->name);

        return redirect()->route('cart');
    }

    /**
     * method for removing an item from the cart
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cartDelete(int $productId)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            }else{
                $pivotRow->count--;
                $pivotRow->update();
            }
            $product = Product::find($productId);
            Order::changeFullSum(-$product->price);
            session()->flash('warning', 'Удален товар - '.$product->name);
        }

        return redirect()->route('cart');
    }

    /**
     * Show the form for ordering
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function cartCheckout()
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        if (Auth::check()) {
            $user = Auth::user();
            return view('site.order', ['order' => $order, 'user'=> $user]);
        }

        return view('site.order', ['order' => $order]);
    }

    /**
     * Method for order confirmation
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cartConfirm(Request $request)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);//dd($order);
        $success = $order->saveOrder($request->name, $request->phone);
        if($success){
            session()->flash('success', 'Ваш заказ принят в обработку');
        }else{
            session()->flash('warning', 'Happens Error');
        }
        Order::eraseOrderSum();

        return redirect()->route('home');
    }
}
