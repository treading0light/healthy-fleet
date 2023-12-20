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
            $table->integer('year')->default(0)->length(4)->nullable();
            $table->string('make')->default('null')->nullable();
            $table->string('model')->default('null')->nullable();
            $table->integer('mileage')->default(0)->length(7)->nullable();
            $table->integer('average_mileage')->default(0)->nullable();
            $table->string('mileage_update_method')->default('off')->nullable();
            $table->timestamp('last_mileage_update')->nullable();
            $table->string('main_photo')->default('images/default_truck.jpg');
            $table->foreignId('department_id')->nullable()->constrained();
            $table->foreignId('company_id')->constrained();

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
