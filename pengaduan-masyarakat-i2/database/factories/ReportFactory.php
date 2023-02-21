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
    public function definition(): array {
        return [
            'name' => fake()->name(),
            'nik' => fake()->numerify('################'),
            'email' => fake()->email(),
            'phone' => fake()->numerify('############'),
            'report_msg' => fake()->sentence(fake()->numberBetween(10, 200)),
            'report_timestamp' => fake()->numberBetween(1676003415, 1676869095),
        ];
    }
}
