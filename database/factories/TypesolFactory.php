<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcelle>
 */
class TypesolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vernaculaure' => fake()->word(),
            'nomDomaine' => fake()->word(),
            'teneurAgile' => fake()->randomFloat(NULL, 0, NULL),
            'teneurLimon' => fake()->randomFloat(NULL, 0, NULL),
            'teneurSable' => fake()->randomFloat(NULL, 0, NULL),
            'teneurPhosphore' => fake()->randomFloat(NULL, 0, NULL),
            'teneurPotassiume' => fake()->randomFloat(NULL, 0, NULL),
            'teneurAzote' => fake()->randomFloat(NULL, 0, NULL),
            'calcaireActif' => fake()->randomFloat(NULL, 0, NULL),
            'calcaireTotal' => fake()->randomFloat(NULL, 0, NULL),
            'conductiviteElectrique' => fake()->randomFloat(NULL, 0, NULL),
            'HCC' => fake()->randomFloat(NULL, 0, NULL),
            'HPF' => fake()->randomFloat(NULL, 0, NULL),
            'DA' => fake()->randomFloat(NULL, 0, NULL)
        ];
    }
}
