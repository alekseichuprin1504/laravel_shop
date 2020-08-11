<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    /**
     *
     * @return int
     */
    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product)
        {
            $sum+=$product->getPriceForCount();
        }

        return $sum;
    }

    /**
     * The method returns the value of the sum from the session
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public static function getFullSum()
    {
        return session('full_order_sum',0);
    }

    /**
     * method for the total amount of the order
     * @return int
     */
    public function calculateForSum()
    {
        $sum = 0;
        foreach ($this->products as $product)
        {
            $sum+=$product->getPriceForCount();
        }

        return $sum;
    }

    /**
     * The method clears the session after placing an order
     */
    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }

    /**
     * The method changes the amount of items in the cart
     * @param $changeSum
     */
    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    /**
     * Method for counting the number of ordered items
     * @return int
     */
    public function countGoods()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product){
            $sum+=$product->pivot->count;
        }
        return $sum;
    }

    /**
     * method of saving orders
     * @param $name
     * @param $phone
     * @return bool
     */
    public function saveOrder($name, $phone)
    {

        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        $this->save();
        session()->forget('orderId');
        return true;
    }

    /**
     * method for active orders
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
