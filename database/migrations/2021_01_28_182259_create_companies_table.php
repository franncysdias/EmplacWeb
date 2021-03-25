<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_name');
            $table->string('alias_name')->nullable();
            $table->string('document_company')->unique();
            $table->string('document_company_secondary')->nullable();

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
             * last access
             */
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();

            /**
             * access
             */
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
