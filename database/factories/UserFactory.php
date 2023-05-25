<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fname = fake()->firstName;
        $lname = fake()->lastName;
        return [
            'username' => $fname,
            'fullname' => $fname . " " . $lname,
            'designation' => fake()->jobTitle,
            'department' => fake()->randomElement(['Finance','Production','IT Support','Maintenance','Administrative']),
            'password' => bcrypt('password123'), // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
