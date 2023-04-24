<?php

namespace Database\Factories;

use App\Models\Espece;
use App\Models\Variete;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variete>
 */
class VarieteFactory extends Factory
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
           ' espece' => Variete::factory(1)->create()->first()[Variete::PK],
           'nomCommercial' =>fake()->name(),
           'appelationAr' => fake()->name(),
           'quantite' => fake()->text(),
           'precocite' => fake()->text(),
           'resistance' => fake()->text(),
           'competitivite' => fake()->text(),
           'description' => fake()->text(),
        ];
    }
}
