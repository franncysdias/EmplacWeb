<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            /**
             * Data
             */
            $table->string('genre')->nullable();
            $table->string('document')->unique();
            $table->string('document_secondary', 20)->nullable();
            $table->string('document_secondary_complement')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('cover')->nullable();

            /**
             * address
             */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /**
             * contact
             */
            $table->string('cell')->nullable();
            $table->string('telephone')->nullable();

            /**
             * access
             */
            $table->boolean('admin')->nullable();
            $table->boolean('client')->nullable();
            $table->boolean('status')->default('1');

            /**
             * last access
             */
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
