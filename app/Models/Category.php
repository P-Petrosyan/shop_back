<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function product_category()
	{
	    return $this->hasMany(Product_Category::class);
	}

	public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function products()
    {
        return $this->belongstoMany(Product::class);
    }

    public function parent()
	{
	    return $this->belongsTo(Category::class);
	}
}
