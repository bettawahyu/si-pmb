<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_sekolah', 150)->nullable();
            $table->string('alamat_sekolah', 150)->nullable();
            $table->string('kel_desa', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kab_kota', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('akreditasi', 15)->nullable();
            $table->integer('tahun_akre')->nullable();
            $table->string('telp_sekolah', 20)->nullable();
            $table->string('email_sekolah', 50)->nullable();
            $table->string('website_sekolah', 50)->nullable();
            $table->string('logo_sekolah', 150)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}
