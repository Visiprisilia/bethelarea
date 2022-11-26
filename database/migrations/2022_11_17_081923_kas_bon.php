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
            $table->string('proker')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->string('tanggal_ptj')->nullable();
            $table->string('status')->nullable();
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
