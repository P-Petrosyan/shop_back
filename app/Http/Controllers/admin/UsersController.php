<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        $users = $this->userRepository->getAll();
    	return view('admin.users.index',  compact('users'));
    }

    public function edit($id){
        $params =['id'=>$id];
        $user = $this->userRepository->findOneById($params);
        $roles = User::get("roles");
    	return view('admin.users.edit',  compact('user','roles'));
    }

    public function update(Request $request, $id){
        $params =[
            'id' => $id,
            'request' => $request
        ];
        $this->userRepository->updateOne($params);
    	return redirect('/admin/users');
    }

    public function delete($id){
        $params =['id'=>$id];
        $this->userRepository->deleteOne($params);
        return redirect('/admin/users');
    }
}
