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
            $table->integer('year')->default(null)->length(4);
            $table->string('make')->default('null');
            $table->string('model')->default('null');
            $table->integer('mileage')->default(null)->length(7);
            $table->integer('average_mileage')->default(0);
            $table->string('mileage_update_method')->default('off');
            $table->timestamp('last_mileage_update')->nullable();
            $table->string('main_photo')->default('images/default_truck.jpg');
            $table->foreignId('department_id')->nullable();
            $table->foreignId('company_id');

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
