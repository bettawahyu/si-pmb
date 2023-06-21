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
        Schema::create('ditolak_siswa_yang_ditolak_many', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->index('fk_ditolak_siswa_yang_ditolak');
            $table->unsignedBigInteger('selected_id');
            $table->integer('admiko_order')->nullable()->default(10000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ditolak_siswa_yang_ditolak_many');
    }
};
