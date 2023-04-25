<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ferme;
use App\Models\Typesol;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $FermeId = null;
        if (\Schema::hasTable('fermes')) {
            $ferme = Ferme::query()->first();
            if ($ferme !== null) {
                $FermeId = $ferme[Ferme::PK];
            } else {
                $FermeId = Ferme::factory()->create()->first()[Ferme::PK];
            }
        }
        $typeSolId = null;
        if (\Schema::hasTable('typesols')) {
            $typesol = Typesol::query()->first();
            if ($typesol !== null) {
                $typeSolId = $typesol[Typesol::PK];
            } else {
                $typeSolId = Typesol::factory()->create()->first()[Typesol::PK];
            }
        }
        return [
            'codification' => fake()->randomNumber(NULL, false),
            // 'Ferme'=> Ferme::factory(1)->create()->first()[Ferme::PK],
            'Ferme'=> $FermeId,
            'superficie' => fake()->randomFloat(NULL, 0, NULL),
            'modeCulture' => fake()->randomElement(['S' , 'M' , 'E']),
            'topographie' => fake()->text(255),
            'pente' => fake()->randomFloat(NULL, 0, NULL),
            'pierosite' => fake()->randomFloat(NULL, 0, NULL),
            'gps' => fake()->address(),
            'description' => fake()->text(255),
            'typeSol'=> $typeSolId,
            // 'typeSol'=> Typesol::factory(1)->create()->first()[Typesol::PK],
        ];
    }
}
