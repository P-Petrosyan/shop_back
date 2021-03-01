<?php
/**
 * Created by PhpStorm.
 * User: WF3New
 * Date: 09.02.2021
 * Time: 15:11
 */

namespace App\Repositories\Eloquent;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function createNewCategory($params){
        if(array_key_exists('request', $params)){
            $category = new Category();
//            dd("$params");
            $category->name = $params['request']->name?:'asdasda';
            $category->parent_id = isset($params['request']->parent_id)?$params['request']->parent_id:null;
            $category->save();
            return new CategoryResource($category);
//            return true;
        }
        return false;
    }

    public function findOneById($params)
    {
        $category = Category::find($params['id']);
        return $category;
    }

    public function updateOne($params)
    {
//        dd($params['request']);
        $category = $this->findOneById($params);
        $category->name = $params['request']->name;
        $category->parent_id = $params['request']->parent_id;
        $category->save();
        return new CategoryResource($category);
//        return true;
    }

    public function deleteOne($params)
    {
        $category = $this->findOneById($params);
        if($category->products){
            $category->products()->detach();
        }
        Category::destroy($params['id']);
        return true;
    }

}
