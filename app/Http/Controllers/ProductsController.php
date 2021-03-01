<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Category;


class ProductsController extends Controller
{
    public $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(){
        $params =['items_count' => 12];
        $products = $this->productRepository->getProducts($params);
    	$categories = Category::get();
//        return ProductResource::collection($products);
        return view('products.card',  compact('products','categories'));
    }

    public function customised(Request $request, $id = null){
        $params = [
            'search' => $request->search,
            'id' => $id,
            'items_count' => 10
        ];
        $products = $this->productRepository->getProducts($params);
        return $products;


//        $categories = Category::get();
//        ProductResource::withoutWrapping();
//    	return view('products.index',  compact('products', 'categories'));
    }

    public function getImage(){
        $products = Product::get();
        return asset('/storage/images/products/');
    }
}
