<?php


namespace App\Services;


use Illuminate\Support\Facades\Request;
use App\Http\Requests\ProductsFilterRequest;

class ProductsService
{
    /**
     * @param ProductsFilterRequest $request
     * @param $productsQuery
     */
    public function productsFilter(ProductsFilterRequest $request, $productsQuery)
    {
        if($request->filled('price_from')){
            $productsQuery->where('price','>=', $request->price_from);
        }
        if($request->filled('price_to')){
            $productsQuery->where('price','<=', $request->price_to);
        }
        foreach(['hit', 'is_reccomended', 'new'] as $field){
            if($request->has($field)){
                $productsQuery->$field();
            }
        }
    }
}
