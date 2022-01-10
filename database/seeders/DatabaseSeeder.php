<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Roomtype;

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
            "email" => "admin@dmin.com",
            "password" => bcrypt("123456789")
        ]);



        Roomtype::factory()->create([
            "name" => "pokój jednoosobowy",
            "ename" => "single room",
        ]);


        Roomtype::factory()->create([
            "name" => "pokój dwuosobowy",
            "ename" => "two-person room",
        ]);
        Roomtype::factory()->create([
            "name" => "studio",
            "ename" => "studio",
        ]);
        Roomtype::factory()->create([
            "name" => "mieszkanie",
            "ename" => "apartment",
        ]);


        // Note::factory(2)->create();
        //  Image::factory(10)->create();
        // Place::factory(10)->create(10);
         // Category::factory(7)->create();
    }
}
