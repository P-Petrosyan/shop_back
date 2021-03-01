<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 10.02.2021
 * Time: 11:42
 */

namespace App\Repositories\Eloquent;


use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface
{
    public function addOrder()
    {
        $baskets = Basket::where("user_id",Auth::id())->get();
        foreach ($baskets as $basket) {
            $order = new Order();
            $order->user_id = $basket->user_id;
            $order->submit_date = $basket->updated_at;
            $order->save();
            $orderproduct = new OrderProduct();
            $orderproduct->order_id = $order->id;
            $orderproduct->product_id = $basket->product_id;
            $orderproduct->save();

            $basket->destroy($basket->id);
        }
    }
    public function getOrders()
    {
        if(Auth::user()->roles != 'customer'){
            $orderproducts = OrderProduct::get();
            return $orderproducts;
        }else{
            $orders = Order::where('user_id',Auth::id())->get();
            return $orders ;
        }

    }
}
