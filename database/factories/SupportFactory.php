<?php

namespace Database\Factories;

use App\Enums\SupportStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject' => fake()->unique()->sentence($nbWords = 3, $variableNbWords = false),
            'status' => fake()->randomElement(SupportStatus::cases()),
            'body' => fake()->text(30),
            'created_at' => fake()->iso8601('now'),
        ];
    }
}
