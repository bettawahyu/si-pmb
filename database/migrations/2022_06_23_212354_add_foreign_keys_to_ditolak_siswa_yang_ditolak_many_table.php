<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDitolakSiswaYangDitolakManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ditolak_siswa_yang_ditolak_many', function (Blueprint $table) {
            $table->foreign(['parent_id'], 'fk_ditolak_siswa_yang_ditolak')->references(['id'])->on('ditolak')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ditolak_siswa_yang_ditolak_many', function (Blueprint $table) {
            $table->dropForeign('fk_ditolak_siswa_yang_ditolak');
        });
    }
}
