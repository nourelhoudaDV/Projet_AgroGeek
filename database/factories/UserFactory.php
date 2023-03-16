<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'date_of_birth' => fake()->dateTime(),
            'avatar' => fake()->imageUrl,
            'gender' => fake()->randomElement(['M' , 'W']),
            'full_name' => fake()->userName(),
            'country_id' => Country::factory(1)->create()->first()[Country::PK],
        ];
    }
}
