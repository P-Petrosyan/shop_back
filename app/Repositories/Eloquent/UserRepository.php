<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 09.02.2021
 * Time: 17:33
 */

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }
    public function findOneById($params)
    {
        $user = User::find($params['id']);
        return $user;
    }
    public function updateOne($params)
    {
        $user = $this->findOneById($params);
        $user->name = $params['request']->name;
        $user->roles = $params['request']->roles;
        $user->save();
    }
    public function deleteOne($params)
    {
        User::destroy($params['id']);
    }

}
