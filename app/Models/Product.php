<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function orderproduct()
	{
	    return $this->hasMany(OrderProduct::class);
	}

	public function categories()
	{
	    return $this->belongsToMany(Category::class);
	}

	public function category()
	{
	    return $this->belongsTo(Category::class);
	}


}
