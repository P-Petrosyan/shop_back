<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\OrderRepository;
use Auth;


class OrdersController extends Controller
{
    public $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function add(){
    	$this->orderRepository->addOrder();
		return redirect('/products');
	}

//	public  function
    public function index(){
        $orders = $this->orderRepository->getOrders();
        return view("orders.index", compact(["orders"]));

    }
}
