<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdminsMultiTenancyAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins_multi_tenancy_access', function (Blueprint $table) {
            $table->foreign(['parent_id'], 'fk_admiko_multi_tenancy_admins')->references(['id'])->on('admins')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins_multi_tenancy_access', function (Blueprint $table) {
            $table->dropForeign('fk_admiko_multi_tenancy_admins');
        });
    }
}
