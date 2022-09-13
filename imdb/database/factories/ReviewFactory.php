<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            
            'rating' => $this->faker->numberBetween(1, 5),
            
            'description' => $this->faker->paragraph(5),
            'movie_id' => $this->faker->numberBetween(1, 6)
        ];
    }
}
