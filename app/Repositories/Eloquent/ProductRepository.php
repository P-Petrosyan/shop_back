<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProducts($params)
    {
        $products = Product::with('categories')->get();
        if(array_key_exists('search', $params) && $params['search']){
            $products = $products->where('name', 'LIKE', '%'.$params['search'].'%');
        }
        if(array_key_exists('id', $params) && $params['id']){
            $category_id = $params['id'];
            $products = $products->whereHas('categories', function ($products) use ($category_id){
                $products->where('id', $category_id);
            });
        }
        return $products;
    }

    public function getAll()
    {
        return Product::all();
    }

    public function findOneById($params)
    {
        $product = Product::with('categories')->find($params['id']);
        return $product;
//        return new ProductResource($product);
    }

    public function updateOne($params)
    {
        $product = $this->findOneById($params);
//        dd($params['request']->category_id);
        if(!$params['request']->image || $params['request']->hasfile('image')){
            if($params['request']->hasfile('image')){

                $file = $params['request']->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time().'.'.$extension;
                $file->storeAs('public/storage',$filename);
                $product->image = $filename;
            }else{
                $product->image = '';
            }
        }
        $product->name = $params['request']->name;
//        $product->categories()->sync($params['request']->category_id);
//
        $arr1 = preg_split ("/\,/", $params['request']->category_id);
        $product->categories()->detach();
        foreach($arr1 as $cat_id){
            $product->categories()->attach($product->id , array('category_id' => $cat_id));
        }
        $product->short_description = $params['request']->short_description;
        $product->full_description = $params['request']->full_description;
        $product->price = $params['request']->price;
        $product->save();
        return $product;
    }

    public function deleteOne($params)
    {
        $product = $this->findOneById($params);
        if($product->categories){
            $product->categories()->detach();
        }
        $product::destroy($params['id']);
        return true;
    }

    public function createNewProduct($params)
    {
        $product = new Product();
        $product->name = $params['request']->name;

        if($params['request']->hasfile('image')){

            $file = $params['request']->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->storeAs('public/storage',$filename);
            $product->image = $filename;
        }else{
            $product->image = '';
        }
        $product->short_description = $params['request']->short_description;
        $product->full_description = $params['request']->full_description;
        $product->price = $params['request']->price;
        $product->save();
        $arr1 = preg_split ("/\,/", $params['request']->category_id);
        foreach($arr1 as $cat_id){
            $product->categories()->attach($product->id , array('category_id' => $cat_id));
        }

        return $product ;
    }

}
