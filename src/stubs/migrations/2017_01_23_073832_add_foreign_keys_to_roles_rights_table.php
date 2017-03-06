<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolesRightsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rights_roles', function (Blueprint $table) {
            $table->foreign('rights_id', 'fk_roles_rights_rights1')->references('id')->on('rights')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('roles_id', 'fk_roles_rights_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rights_roles', function (Blueprint $table) {
            $table->dropForeign('fk_roles_rights_rights1');
            $table->dropForeign('fk_roles_rights_roles1');
        });
    }
}
