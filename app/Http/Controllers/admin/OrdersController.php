<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\OrderRepository;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;

class OrdersController extends Controller
{
    public $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
    	$orderproducts = $this->orderRepository->getOrders();

		return view("admin.orders.index", compact(["orderproducts"]));
	}
}
