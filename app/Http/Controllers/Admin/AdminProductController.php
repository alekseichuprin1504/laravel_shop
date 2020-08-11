<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class AdminProductController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->get();

        return view('admin.admin-products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get();

        return view('admin.product-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $params = $request->all();
        unset($params['image']);
        if($request->has('image')){
            $file = $request->file('image');
            $params['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/images/home', $file->getClientOriginalName());
        }
          $this->product->create($params);
          $product = $params['name'];
          session()->flash('success', 'Добавлен товар - '.$product);

          return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = $this->category->get();

        return view('site.product', ['categories'=>$categories, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->category->get();

        return view('admin.product-edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        if($request->has('image')){
            $file = $request->file('image');
            $file->move(public_path().'/assets/images/home', $file->getClientOriginalName());
            $params['image'] = $file->getClientOriginalName();
        }else{
            $params['image'] = $params['old_image'];
        }
        unset($params['old_image']);
        $product->update($params);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('warning', 'Удален товар - '.$product->name);

        return redirect()->route('products.index');
    }
}
