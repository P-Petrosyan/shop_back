<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
        	DB::table('products')->insert([
	            'name' => Str::random(5),
	            'image' => rand(1,10),
	            'short_description' => Str::random(10),
	            'full_description' => Str::random(20),
	            'price' => rand(200,300)
        	]);
        };
    }
}
