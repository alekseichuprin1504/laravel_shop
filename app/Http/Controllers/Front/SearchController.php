<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SearchService;

class SearchController extends Controller
{


    /**
     * @var Category
     */
    private $category;

    /**
     * SearchController constructor.
     * @param Product $product
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param SearchService $searchService
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(SearchService $searchService, Request $request)
    {
        $products = $searchService->search($request->input('search'));
        $categories = $this->category->get();

        return view('site.index', ['categories' => $categories, 'products' => $products]);

    }
}
