<?php

namespace App\Repositories;


interface ProductRepositoryInterface extends ParentInterface
{
    public function getProducts($params);
    public function createNewProduct($params);
}
