<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('bday');
            $table->enum('gender',['male','female']);
            $table->string('brgy');
            $table->string('city_mun');
            $table->string('prov');
            $table->string('contact_no')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('dept',['ITSM','RSTL','FAS','ORD','COA']);
            $table->string('sss')->unique();
            $table->string('tin')->unique();
            $table->string('philhealth')->unique();
            $table->string('password');
            $table->enum('type',['admin','regular']);
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
};
