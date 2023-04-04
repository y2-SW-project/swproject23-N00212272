<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\team>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //means it chooses this db and uses a fake word,text or name
            'name' => $this->faker->word,
            'user_id' => 2,
            'description' => $this->faker->text(200),
            'price'=>$this->faker->numberBetween($min = 1, $max = 150),
            'image1' => $this->faker->randomElement(['liverpool.png']),
            'image2' => $this->faker->randomElement(['manu.jpg']),
            'image3' => $this->faker->randomElement(['liverpool.png']),
            'condition_id' => 1,
            'category_id' => 1,
            'size_id' => 1,
        ];
    }
    
}
