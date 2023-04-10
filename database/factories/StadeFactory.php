<?php

namespace Database\Factories;

use App\Models\Variete;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variete>
 */
class StadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'nom' =>fake()->name(),
           'phaseFin' =>fake()->word(),
           'espece' => fake()->randomDigit(),
           'description' => fake()->text(),
        ];
    }
}
