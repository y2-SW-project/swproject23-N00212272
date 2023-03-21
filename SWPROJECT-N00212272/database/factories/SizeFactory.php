<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ranges = ['0-12','1+','2+'];
        $random = Arr::random($ranges);
        return [ "ageRange" => Arr::random($ranges)];
       
    }

    
}
