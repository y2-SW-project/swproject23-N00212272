<?php

namespace Database\Seeders;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
      

       Size::factory()
       ->times(3)
       ->create();
           //this gets the sizes and assigns them to a product
           foreach(Product::all() as $product) 
           {
               $sizes = Size::inRandomOrder()->take(rand(1,3))->pluck('id');
               $product->sizes()->attach($sizes);
           }
   }
    }


