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
            'logo' => fake()->imageUrl,
            'nomDomaine' => fake()->word(),
            'fullNameG' => fake()->name(),
            'cin' => fake()->idNumber(),
            'contactG' => fake()->phoneNumber(),
            'SAT'=> fake()->randomFloat(NULL,0,NULL),
            'SAU'=> fake()->randomFloat(NULL,0,NULL),
            'observation'=> fake()->word(),
            'fixe'=> fake()->landlineNumber(),
            'fax'=> fake()->faxNumber(),
            'GSM1'=> fake()->phoneNumber(),
            'GSM2'=> fake()->phoneNumber(),
            'email'=> fake()->email(),
            'siteWeb'=> fake()->domainName(),
            'Douar'=> fake()->streetAddress(),
            'Cercle'=> fake()->streetName(),
            'province'=> fake()->city(),
            'region'=> fake()->region(),
            'adresse'=> fake()->address(),
            'gps'=> fake()->address(),
            'ville'=> fake()->city(),
        ];
    }
}
