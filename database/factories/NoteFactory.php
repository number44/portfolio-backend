<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->word(),
            "slug" => $this->faker->word(),
            "content" => $this->faker->paragraph()
        ];
    }
}
