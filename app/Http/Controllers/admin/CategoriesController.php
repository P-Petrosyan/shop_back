<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product_Category;

class CategoriesController extends Controller
{
    public $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->getAll();
        return CategoryResource::collection($categories);
//    	return view('admin.categories.index',  compact('categories'));
    }

    public function create(){
        $categories = $this->categoryRepository->getAll();
        return CategoryResource::collection($categories);
//    	return view('admin.categories.create',  compact('categories'));
    }

    public function save(Request $request){
        dd($request);
        $params = ['request' => $request,];
        $this->categoryRepository->createNewCategory($params);

//        return redirect('/admin/categories');
    }

     public function edit($id){
        $params = ['id' => $id,];
    	$category1 = $this->categoryRepository->findOneById($params);
    	$categories = $this->categoryRepository->getAll();

    	return view('admin.categories.edit',  compact('category1', 'categories'));
    }

    public function update(Request $request, $id){
        $params = [
            'id' => $id,
            'request' => $request
        ];
        $this->categoryRepository->updateOne($params);

    	return redirect('/admin/categories');
    }

     public function delete($id){
        $params = ['id' => $id,];
        $this->categoryRepository->deleteOne($params);
        return redirect('/admin/categories');
    }
}
