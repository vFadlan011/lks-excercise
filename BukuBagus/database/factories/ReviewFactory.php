<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'user_id' => fake()->numberBetween(1, 20),
            'book_id' => fake()->numberBetween(1, 20),
            'review' => fake()->sentence(fake()->numberBetween(10, 40))
        ];
    }
}