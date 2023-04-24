<?php

namespace Database\Factories;

use App\Models\Espece;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stade>
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
        $especeId = null;
        if (\Schema::hasTable('especes')) {
            $espece = Espece::query()->first();
            if ($espece !== null) {
                $especeId = $espece[Espece::PK];
            } else {
                $especeId = Espece::factory()->create()->first()[Espece::PK];
            }
        }

        return [

            'nom' => fake()->name,
            'phaseFin' => fake()->name,
            'espece' => $especeId,
            'description' => fake()->text,
        ];
    }
}
