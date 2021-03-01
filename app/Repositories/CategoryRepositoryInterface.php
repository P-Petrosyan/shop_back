<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 09.02.2021
 * Time: 15:10
 */

namespace App\Repositories;


interface CategoryRepositoryInterface extends ParentInterface
{
    public function createNewCategory($params);
}
