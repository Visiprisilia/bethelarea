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
        Schema::create('kas_keluar', function (Blueprint $table) {
            $table->string('no_bukti')->primary();
            $table->string('periode')->nullable();
            $table->string('tanggal_pencatatan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('akun')->nullable();
            $table->string('prokers')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('bukti')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->string('kasir')->nullable();
            $table->string('no_buktibon')->nullable();
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
