<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Location;
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

        District::factory()->create([
            "name" => "Bałuty",
            "ename" => "Baluty"
        ]);
        District::factory()->create([
            "name" => "Bałuty",
            "ename" => "Baluty"
        ]);
        District::factory()->create([
            "name" => "Śródmieście",
            "ename" => "Srodmiescie"
        ]);

        Location::factory()->create([
            "id" => '1',
            "name" => 'tarninowa 1',
            "ename" => 'tarninowa 1',
            "thumbnail" => 'https://images.pexels.com/photos/7224424/pexels-photo-7224424.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            "lat" => '41.8933203',
            "lon" => '12.4829321'
        ]);


        // Note::factory(2)->create();
        //  Image::factory(10)->create();
        // Place::factory(10)->create(10);
        // Category::factory(7)->create();
    }
}
