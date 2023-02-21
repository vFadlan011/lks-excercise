<?php

namespace Database\Factories;

use App\Models\Report;
use Carbon\Carbon;
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
    protected $model = Report::class;

    public function definition() {
        return [
            'name' => fake()->name(),
            'nik' => fake()->regexify('[0-9]{16}'),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'report_msg' => fake()->sentence(200),
            'report_img1' => "report-images/hby2HwfRCOJlyNkSk885a2aWXH4F0S7X0mfiV3VT.png",
            'report_timestamp' => Carbon::now()->timestamp,
        ];
    }
}
