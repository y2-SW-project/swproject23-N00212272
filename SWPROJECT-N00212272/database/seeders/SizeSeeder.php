<?php

namespace Database\Seeders;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
      

        {
            $sizes= [
               ['ageRange' => '0-6M'],
               ['ageRange' => '6-12M'],
               ['ageRange' => '1+'],
               ['ageRange' => '2+'],
               ['ageRange' => '3+'],
               ['ageRange' => '4+'],
               ['ageRange' => '5+'],
           ];
       
          
           
           Size::insert($sizes);
             
          }
   }
    }


