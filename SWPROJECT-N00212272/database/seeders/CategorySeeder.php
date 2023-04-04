<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $categories= [
               ['name' => 'Clothes'],
               ['name' => 'Accessories'],
               ['name' => 'Water'],
               ['name' => 'Toys'],
               ['name' => 'Car'],
               ['name' => 'Nursery'],
           ];
       
           
           Category::insert($categories);
             
          }
   }
}
