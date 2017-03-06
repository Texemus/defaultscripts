<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->integer('id', true);
            $table->string('first_name')->nullable();
            $table->string('insertion')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique('email_UNIQUE');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->integer('administrator')->nullable();
            $table->integer('super_user')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
