<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Wóz strażacki');
            $table->integer('user_id')->default(1);
            $table->decimal('combustion')->default(0);
            $table->decimal('fuel')->default(0);
            $table->integer('milage')->default(0);
            $table->date('insurance')->default(Carbon::createFromDate(0, 1, 1));
            $table->date('inspection')->default(Carbon::createFromDate(0, 1, 1));
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
        Schema::dropIfExists('vehicles');
    }
}
