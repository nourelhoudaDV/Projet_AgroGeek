<?php

namespace App\helper\Data;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use function Symfony\Component\Translation\t;

class Faker extends Factory
{


    public function faker(): \Faker\Generator
    {
        return $this->faker;
    }

    public function definition()
    {
        // TODO: Implement definition() method.
    }

}
