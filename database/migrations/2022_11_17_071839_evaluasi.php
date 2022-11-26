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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->string('kode_evaluasi')->autoIncrement();
            $table->string('kode_proker')->nullable();
            $table->string('periode')->nullable();
            $table->string('nama_proker')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('akun_beban')->nullable();
            $table->string('rencana_anggaran')->nullable();
            $table->string('realisasi_anggaran')->nullable();
            $table->string('rencana_waktu')->nullable();
            $table->string('realisasi_waktu')->nullable();
            $table->string('indikator_pencapaian')->nullable();
            $table->string('kinerja_pencapaian')->nullable();
            $table->string('faktor_pendorong')->nullable();
            $table->string('faktor_penghambat')->nullable();
            $table->string('tindaklanjut')->nullable();
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
        //
    }
};
