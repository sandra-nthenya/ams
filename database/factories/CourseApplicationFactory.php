<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseApplication>
 */
class CourseApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => fake()->numberBetween(1, \App\Models\Course::count()),
            'firstName' => fake()->firstName,
            'lastName' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'phoneNumber' => fake()->phoneNumber
        ];
    }
}
