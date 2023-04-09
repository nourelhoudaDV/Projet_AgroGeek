<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EspecesModel>
 */
class EspeceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'nomSc' => fake()->name(),
            'nomCommercial' => fake()->userName(),
            'appelationAr' => fake()->phoneNumber(),
            'categorieEspece' => fake()->text(),
            'typeEnracinement' => fake()->text(),
            'description' => fake()->text(),
        ];
    }
}
