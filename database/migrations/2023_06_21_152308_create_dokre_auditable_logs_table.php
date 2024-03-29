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
        Schema::create('dokre_auditable_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action')->nullable();
            $table->unsignedBigInteger('row_id')->nullable();
            $table->string('model')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('info')->nullable();
            $table->text('url')->nullable();
            $table->string('ip')->nullable();
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
        Schema::dropIfExists('dokre_auditable_logs');
    }
};
