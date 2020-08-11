<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class SiteController extends Controller
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
     * @var ProductsService
     */
    private $productsService;

    /**
     * SiteController constructor.
     * @param Category $category
     * @param Product $product
     * @param ProductsService $productsService
     */
    public function __construct(Category $category, Product $product, ProductsService $productsService)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productsService = $productsService;
    }

    /**
     * @param ProductsFilterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ProductsFilterRequest $request)
    {
        $productsQuery = $this->product->query();
        $this->productsService->productsFilter($request, $productsQuery);
        $products = $productsQuery->paginate(3)->withPath("?" . $request->getQueryString());
        $recomendProducts = $this->product->Is_reccomended()->get();
        $categories = $this->category->get();

        return view('site.index', ['categories' => $categories, 'products' => $products, 'recomendProducts'=>$recomendProducts]);
    }

    /**
     * @param string $categoryName
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryProducts(string $categoryName)
    {
        $category = $this->category->where('slug', $categoryName)->first();
        $categories = $this->category->get();

        return view('site.category_products', ['category' => $category, 'categories' => $categories]);
    }
}
