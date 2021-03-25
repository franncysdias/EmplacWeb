<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedInteger('user')->nullable();
            $table->unsignedInteger('company')->nullable();
            $table->string('board', 7)->nullable()->default(NULL)->unique();
            $table->string('renavam', 11);
            $table->string('chassis', 17)->unique();
            $table->unsignedInteger('brand');
            $table->unsignedInteger('model');
            $table->unsignedInteger('type');
            $table->integer('year_manu');
            $table->integer('year_model');
            $table->boolean('status')->default('1');
            $table->timestamps();

            $table->foreign('brand')->references('id')->on('vehicle_brands');
            $table->foreign('model')->references('id')->on('vehicle_models');
            $table->foreign('type')->references('id')->on('vehicle_types');
            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('company')->references('id')->on('companies')->onDelete('CASCADE');
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
