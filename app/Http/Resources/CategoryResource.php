<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'parent_id' => $this->parent_id,
//            'short_description' => $this->short_description,
//            'full_description' => $this->full_description,
//            'categories' => $this->categories,
//            'price' => number_format($this->price , 2),
//            'parent' => $this->parent_id
        ];
//        return parent::toArray($request);
    }
}
