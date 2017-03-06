<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateRightsRolesTable
 */
class CreateRightsRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rights_roles', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('roles_id')->index('fk_roles_rights_roles1_idx');
            $table->integer('rights_id')->index('fk_roles_rights_rights1_idx');
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
        Schema::drop('rights_roles');
    }
}
