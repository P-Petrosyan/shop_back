<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 10.02.2021
 * Time: 11:42
 */

namespace App\Repositories;


interface OrderRepositoryInterface
{
    public function getOrders();
    public function addOrder();
}
