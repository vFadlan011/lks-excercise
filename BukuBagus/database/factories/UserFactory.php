<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User::class>
 */
class UserFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'username' => fake()->text(12),
            'password' =>
            '$2y$10$uTKUigHLmGmT3n5wKgTA2uk9A.SSPWdCnhmBiGAkTlcdmnxnj0.XO', //password
        ];
    }
}
