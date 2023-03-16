<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ferme>
 */
class FermeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomDomaine' => fake()->name(),
            'logo' => fake()->imageUrl,
            'fullNameG' => fake()->userName(),
            'contactG' => fake()->phoneNumber()
        ];
    }
}
