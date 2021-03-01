<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return[
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
//            'full_description' => $this->full_description,
//            'categories' => $this->categories,
//            'price' => number_format($this->price , 2),
//            'parent' => $this->parent_id
        ];
    }
}
