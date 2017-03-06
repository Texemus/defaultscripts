<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateRightsTable
 */
class CreateRightsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rights', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('object')->nullable();
            $table->text('description')->nullable();
            $table->integer('see')->nullable();
            $table->integer('create')->nullable();
            $table->integer('update')->nullable();
            $table->integer('delete')->nullable();
            $table->integer('approve')->nullable();
            $table->integer('publish')->nullable();
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
        Schema::drop('rights');
    }
}
