<?php

namespace Database\Factories;

use App\Models\Espece;
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
        $especeId = null;
        if (\Schema::hasTable('especes')) {
            $espece = Espece::query()->first();
            if ($espece !== null) {
                $especeId = $espece[Espece::PK];
            } else {
                $especeId = Espece::factory()->create()->first()[Espece::PK];
            }
        }

        $varieteId = null;
        if (\Schema::hasTable('varietes')) {
            $variete = Variete::query()->first();
            if ($variete !== null) {
                $varieteId = $variete[Variete::PK];
            } else {
                $varieteId = Variete::factory()->create()->first()[Variete::PK];
            }
        }

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
