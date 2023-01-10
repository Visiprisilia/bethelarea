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
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->string('kode_proker')->primary();
            $table->string('periode')->nullable();
            $table->string('nama_proker')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->string('waktu_mulai')->nullable();
            $table->string('waktu_selesai')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('indikator')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('keterangan_proker')->nullable();
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
        Schema::dropIfExists('program_kerja');
    }
};
