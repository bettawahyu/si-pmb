<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiterimaSiswaYangDiterimaManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diterima_siswa_yang_diterima_many', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->index('fk_diterima_siswa_yang_diterima');
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
        Schema::dropIfExists('diterima_siswa_yang_diterima_many');
    }
}
