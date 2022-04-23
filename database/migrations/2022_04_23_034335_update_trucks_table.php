<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trucks', function (Blueprint $table) {

            $table->integer('year')->default('null')->length(4)->change();
            $table->string('make')->default('null')->change();
            $table->string('model')->default('null')->change();
            $table->integer('mileage')->default('null')->length(7)->change();
            $table->string('main_photo')->default('images/toy_truck.jpg')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
