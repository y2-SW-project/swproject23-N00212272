<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $names= [
               ['name' => 'Cotton'],
               ['name' => 'Linen'],
               ['name' => 'Leather'],
               ['name' => 'Silk'],
               ['name' => 'Wool'],
               ['name' => 'Cashmere'],
               ['name' => 'Hemp']
           ];
       
          
           
           Material::insert($names);
             
          }
           //this gets the sizes and assigns them to a product
           foreach(Product::all() as $product) 
           {
               $materials = Material::inRandomOrder()->take(rand(1,2))->pluck('id');
               $product->materials()->attach($materials);
           }
   }
    }

