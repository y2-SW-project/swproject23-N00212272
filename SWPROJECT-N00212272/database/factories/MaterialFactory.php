<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $names = ['Cotton','Linen','Leather','Silk','Wool','Cashmere','Hemp'];
        $random = Arr::random($names);
        return [ "name" => Arr::random($names)];

    }
}
