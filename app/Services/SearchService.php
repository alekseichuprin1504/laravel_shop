<?php


namespace App\Services;
use App\Models\Category;
use App\Models\Product;

class SearchService
{
    /**
     * @var Product
     */
    private $product;

    /**
     * SearchService constructor.
     * @param Product $product
     */
    public function __construct(product $product)
    {
        $this->product = $product;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function searchProductByName(string $param)
    {
        return $this->product->where('name','LIKE','%'.$param.'%')->paginate(3);
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function search(string $param)
    {
        return $this->searchProductByName($param);
    }


}
