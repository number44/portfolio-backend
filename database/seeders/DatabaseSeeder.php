<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            "name" => "admin",
            "email" => "admin@dmin.com.",
            "password" => bcrypt("123456789")
        ]);
        Note::factory(2)->create();
        Image::factory(10)->create();
    }
}
