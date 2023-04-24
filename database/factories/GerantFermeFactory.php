<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\Components\Action;
use App\Helpers\Components\Head;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gerant_Ferme>
 */
class GerantFermeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'telephone' => fake()->phoneNumber(),
            
            'email' => fake()->email(),

            'nomG' => fake()->name(),
            'prenomG' => fake()->name(),


        ];
    }
}
