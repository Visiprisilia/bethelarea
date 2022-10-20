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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('kode_pegawai')->primary();
            $table->string('nama_pegawai')->nullable();
            $table->string('jabatan_pegawai')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('tanggal_masuk')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('tanggal_ppt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
