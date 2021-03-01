<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 10.02.2021
 * Time: 11:01
 */

namespace App\Repositories;


interface BasketRepositoryInterface
{
    public function getBasket();
    public function addToBasket($id);
    public function deleteBasket($id);
}
