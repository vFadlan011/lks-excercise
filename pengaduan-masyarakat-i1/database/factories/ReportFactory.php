<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'nik' => fake()->numerify('################'),
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->numerify('###########'),
            'report_msg' => fake()->sentence(fake()->numberBetween(10, 300)),
            'report_timestamp' => fake()->numberBetween(1672531200, 1676447965),
        ];
    }
}
