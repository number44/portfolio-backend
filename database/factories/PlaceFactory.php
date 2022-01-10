<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" =>   $this->faker->word(),
            "ename" =>   $this->faker->word(),
            "lat" => $this->faker->numerify("##,######"),
            "lon" => $this->faker->numerify("##,######"),
            "placetype_id" => 1
        ];
    }
}
