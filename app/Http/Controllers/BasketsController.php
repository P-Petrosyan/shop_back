<?php

namespace App\Http\Controllers;


use App\Http\Resources\BasketResource;
use App\Repositories\Eloquent\BasketRepository;
use Auth;

class BasketsController extends Controller
{
    public $basketRepository;
    public function __construct(BasketRepository $basketRepository)
    {
        $this->basketRepository = $basketRepository;
    }

    public function index(){
        $baskets = $this->basketRepository->getBasket();
//		return view("baskets.index", compact(["baskets"]));
        return BasketResource::collection($baskets);
	}

    public function add($id){
//        dd($id);
        $basket = $this->basketRepository->addToBasket($id);
        return $basket->product;
    }

    public function delete($id){
    	$this->basketRepository->deleteBasket($id);
        return redirect()->back();
    }
}
