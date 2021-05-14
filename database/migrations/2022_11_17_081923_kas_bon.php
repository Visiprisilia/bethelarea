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
        Schema::create('kas_bon', function (Blueprint $table) {
            $table->string('no_bukti')->primary();
            $table->string('periode')->nullable();
            $table->string('tanggal_pengajuan')->nullable();
            $table->string('keterangan_bon')->nullable();
            $table->string('proker_bon')->nullable();
            $table->string('akun_bon')->nullable();
            $table->string('anggaran_bon')->nullable();
            $table->string('jumlah_bon')->nullable();
            $table->string('jumlah_ptj')->nullable();
            $table->string('penanggungjawab_bon')->nullable();
            $table->string('tanggal_ptj')->nullable();
            $table->string('status_bon')->nullable();
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
