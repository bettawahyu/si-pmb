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
        Schema::table('admins_roles_permission', function (Blueprint $table) {
            $table->foreign(['role_id'], 'fk_admins_roles')->references(['id'])->on('admins_roles')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins_roles_permission', function (Blueprint $table) {
            $table->dropForeign('fk_admins_roles');
        });
    }
};
