<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 09.02.2021
 * Time: 18:17
 */

namespace App\Repositories;

interface ParentInterface
{
    public function getAll();
    public function findOneById($params);
    public function updateOne($params);
    public function deleteOne($params);
}
