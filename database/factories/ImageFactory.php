<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            "name" =>   $this->faker->image(),
            "url"  =>   $this->faker->imageUrl(),
            "alt" =>    $this->faker->sentence(),
            "size" =>   $this->faker->randomDigit(10000,20000),
            "path"  =>  $this->faker->imageUrl(),
               
        ];
    }
}


