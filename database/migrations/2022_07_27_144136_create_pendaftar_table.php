<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarTable extends Migration
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
            $table->string('no_pendaftaran', 300)->nullable()->unique('no_pendaftaran');
            $table->string('nama_siswa', 300)->nullable();
            $table->string('tempat_lahir', 300)->nullable();
            $table->dateTime('tanggal_lahir')->nullable();
            $table->integer('agama')->nullable();
            $table->integer('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_orang_tua', 300)->nullable();
            $table->integer('pekerjaan_orang_tua')->nullable();
            $table->string('nomor_telp', 300)->nullable();
            $table->integer('kelas')->nullable();
            $table->integer('tahun_ajaran')->nullable();
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
}
