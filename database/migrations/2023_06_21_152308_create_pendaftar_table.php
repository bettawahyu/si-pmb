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
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pendaftaran', 300)->nullable();
            $table->string('nama_siswa', 300)->nullable();
            $table->string('tempat_lahir', 300)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedBigInteger('agama')->nullable()->index('agama_fk');
            $table->integer('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kel_desa', 150)->nullable();
            $table->string('kecamatan', 150)->nullable();
            $table->string('asal_sekolah', 150)->nullable();
            $table->string('nama_ayah', 300)->nullable();
            $table->integer('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu', 300)->nullable();
            $table->integer('pekerjaan_ibu')->nullable();
            $table->string('nomor_telp', 300)->nullable();
            $table->string('email', 150)->nullable();
            $table->integer('kelas')->nullable();
            $table->integer('tahun_ajaran')->nullable();
            $table->string('foto_pendaftar', 300)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar');
    }
};
