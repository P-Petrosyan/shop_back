<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Http\Requests\ProductRequest;
use Auth;

class ProductsController extends Controller
{
    public $productRepository;
    public $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $params =['items_count' => 15];
        $products = $this->productRepository->getProducts($params);
        $categories = $this->categoryRepository->getAll();

    	return view('admin.products.index',  compact('products', 'categories'));
    }

    public function edit($id){
        $params =['id' => $id];
//        $categories = $this->categoryRepository->getAll();
        $product = $this->productRepository->findOneById($params);
        return $product;
//    	return view('admin.products.edit',  compact('product','categories'));
    }

    public function update(ProductRequest $request, $id){
        $params =[
            'request' => $request,
            'id' => $id
        ];
       return $this->productRepository->updateOne($params);

    }

    public function create(){
//        dd('asdasdadsa');
        $categories = $this->categoryRepository->getAll();
    	return view('admin.products.create', compact('categories'));
    }

    public function save(ProductRequest $request){
//        dd($request->all());
        $params =['request' => $request];
        $this->productRepository->createNewProduct($params);
        return true;
//    	return redirect('/admin/products');
    }

    public function delete($id){
        $params=['id' => $id];
        $this->productRepository->deleteOne($params);
//        $product = Product::destroy($id);
        return response('asdasdasda');
    }
}
