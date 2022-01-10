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
            $table->foreignId('roomtype_id')->constrained()->onUpdate('cascade');
            
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
            
            $table->integer('rooms');
            $table->integer('beds');
            $table->integer('guests');
            $table->integer('bathrooms');

            $table->text('about');
            $table->text('eabout');

            $table->text('info');
            $table->text('einfo');
            $table->timestamps();
        });
    }

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

 
