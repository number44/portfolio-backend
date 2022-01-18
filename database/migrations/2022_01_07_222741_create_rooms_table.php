<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('location_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('roomtype_id')->nullable()->constrained()->onUpdate('cascade');
            $table->foreignId('district_id')->nullable()->constrained()->onUpdate('cascade');

            $table->string('name');
            $table->string('ename')->nullable();

            $table->string('thumbnail');


            $table->integer('son_id')->nullable();
            $table->integer('price');
            $table->date("availability");
            $table->boolean('internet')->default(0);
            $table->boolean('tv')->default(0);
            $table->boolean('washing_machine')->default(0);
            $table->boolean('dryer')->default(0);
            $table->boolean('parking')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean("oven")->default(0);
            $table->boolean("equipped_kitchen")->default(0);

            $table->integer('locales');
            $table->integer('beds');
            $table->integer('guests');
            $table->integer('bathrooms');

            $table->text('about');
            $table->text('eabout');

            $table->text('info');
            $table->text('einfo');

            $table->boolean('b_internet')->default(0);
            $table->boolean('b_water')->default(0);
            $table->boolean('b_electricity')->default(0);
            $table->boolean('b_gas')->default(0);
            $table->boolean('b_taxes')->default(0);
            $table->integer('b_costs');
            $table->integer('b_deposit');

            $table->integer('price_2');
            $table->integer('price_3');
            $table->integer('price_4');

            $table->timestamps();
        });
    }



    /**
     * 	b_internet: boolean;

     */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
