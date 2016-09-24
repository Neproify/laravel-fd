<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('admin')->default(0);
            $table->integer('announcments')->default(0);
            $table->integer('training')->default(0);
            $table->integer('members')->default(0);
            $table->integer('statute')->default(0);
            $table->integer('equipment')->default(0);
            $table->integer('vehicles')->default(0);
            $table->integer('fuel')->default(0);
            $table->integer('conclusions')->default(0);
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
        Schema::dropIfExists('roles');
    }
}
