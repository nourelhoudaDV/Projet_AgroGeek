<?php

namespace Database\Factories;

use App\Models\Variete;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variete>
 */
class StadeVarieteFactory extends Factory
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
           'variete' => fake()->randomDigit(),
           'sommesTemps' => fake()->randomFloat(NULL, 0, NULL),
           'sommesTempFroid' => fake()->randomFloat(NULL, 0, NULL),
           'Kc' => fake()->randomFloat(NULL, 0, NULL),
           'enracinement' => fake()->randomFloat(NULL, 0, NULL),
           'maxEnracinement' => fake()->randomElement($array = array ('Y','N')) ,
           'description' => fake()->text(),
        ];
    }
}
