<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'slug' => $this->faker->slug,
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(10, 100),
            'image' => $this->faker->imageUrl,
        ];
    }
}
