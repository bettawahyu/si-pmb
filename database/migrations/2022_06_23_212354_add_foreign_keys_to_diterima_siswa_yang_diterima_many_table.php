<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDiterimaSiswaYangDiterimaManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diterima_siswa_yang_diterima_many', function (Blueprint $table) {
            $table->foreign(['parent_id'], 'fk_diterima_siswa_yang_diterima')->references(['id'])->on('diterima')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diterima_siswa_yang_diterima_many', function (Blueprint $table) {
            $table->dropForeign('fk_diterima_siswa_yang_diterima');
        });
    }
}
