<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 10.02.2021
 * Time: 10:52
 */

namespace App\Repositories\Eloquent;

//use App\Models\Product;
use App\Repositories\BasketRepositoryInterface;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;

class BasketRepository implements BasketRepositoryInterface
{
    public function getBasket()
    {
        $baskets = Basket::where("user_id",Auth::id())->with("product")->get();
        return $baskets;

    }
    public function addToBasket($id)
    {
        dd($id);
//        $product = Product::find($id);
        $basket = new Basket();
//        $basket->user_id = Auth::id();
        $basket->product_id = $id;
        $basket->count = 1;
        $basket->save();
        return $basket;
    }

    public function deleteBasket($id)
    {
        Basket::destroy($id);
    }
}
