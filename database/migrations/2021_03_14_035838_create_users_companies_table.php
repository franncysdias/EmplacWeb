<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->unsignedInteger('company');
            $table->timestamps();

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
        Schema::dropIfExists('users_companies');
    }
}
