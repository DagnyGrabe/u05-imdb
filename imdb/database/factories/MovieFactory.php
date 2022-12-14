<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
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
            'tags' => 'action, romantisk, dokumentär',
            'country' => $this->faker->country(),
            'year' => $this->faker->numberBetween(1940, 2022),
            
            'description' => $this->faker->paragraph(5)
            
        ];
    }
}
