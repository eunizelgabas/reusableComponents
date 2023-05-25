<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word,
            'description' => fake()->sentence(5, true),
            'value' => fake()->numberBetween(999,99999),
            'status' => fake()->randomElement(['good condition','good condition','good condition','damaged','lost']),
            'office_id' => fake()->numberBetween(1,6)
        ];
    }
}
