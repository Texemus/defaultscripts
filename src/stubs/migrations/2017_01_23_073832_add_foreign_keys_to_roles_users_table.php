<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolesUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles_users', function (Blueprint $table) {
            $table->foreign('roles_id', 'fk_roles_users_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('users_id', 'fk_roles_users_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles_users', function (Blueprint $table) {
            $table->dropForeign('fk_roles_users_roles1');
            $table->dropForeign('fk_roles_users_users');
        });
    }
}
