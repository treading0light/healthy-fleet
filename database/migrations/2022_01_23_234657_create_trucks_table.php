<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year')->nullable()->length(4);
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->integer('mileage')->nullable()->length(7);
            $table->string('main_photo')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('trucks');
    }
}
