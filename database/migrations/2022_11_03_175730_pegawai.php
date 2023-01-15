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
            $table->string('niy')->primary();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('ttl')->nullable();
            $table->string('jk')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('penempatan')->nullable();
            $table->string('tanggal_masuk')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('tanggal_ppt')->nullable();
            $table->string('file_suket')->nullable();
            $table->string('status')->nullable();
            $table->string('tanggal_terminasi')->nullable();
            $table->string('foto_pegawai')->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('keterangan')->nullable();
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
        //
    }
};
