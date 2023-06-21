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
        Schema::table('diterima_siswa_yang_diterima_many', function (Blueprint $table) {
            $table->foreign(['selected_id'], 'fk_diterima_pendaftar')->references(['id'])->on('pendaftar')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
            $table->dropForeign('fk_diterima_pendaftar');
            $table->dropForeign('fk_diterima_siswa_yang_diterima');
        });
    }
};
