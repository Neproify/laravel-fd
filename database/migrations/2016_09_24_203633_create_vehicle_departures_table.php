<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_departures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->date('date');
            $table->string('reason');
            $table->string('from');
            $table->string('to');
            $table->string('supervisor');
            $table->string('driver');
            $table->time('departure');
            $table->time('return');
            $table->integer('beforeMilage');
            $table->integer('afterMilage');
            $table->integer('stopTime');
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
        Schema::dropIfExists('vehicle_departures');
    }
}
