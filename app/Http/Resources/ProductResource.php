<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
//    public static $wrap = 'product';
//    /**
//     * Transform the resource into an array.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
    public function toArray($request)
    {


//        return response()->json([
//            'error' => false,
//            'products'  => Product::all(),
//        ], 200);
        return[
//            response()->json([
//            'products'  => Product::all(),])
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'short_description' => $this->short_description,
            'full_description' => $this->full_description,
            'categories' => $this->categories,
            'price' => number_format($this->price , 2),
//            'parent' => $this->parent_id
//
        ];
//        return parent::toArray($request);
    }
}
