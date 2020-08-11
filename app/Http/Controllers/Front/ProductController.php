<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var Product
     */
    private $product;

    /**
     * ProductController constructor.
     * @param Category $category
     * @param Product $product
     */
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(int $id)
    {
        $categories = $this->category->get();
        $product = $this->product->where('id', $id)->first();

        return view('site.product', ['categories'=>$categories, 'product' => $product]);
    }
}
