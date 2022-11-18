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
            $table->string('kode')->primary();
            $table->string('tanggal')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('realisasi')->nullable();
            $table->string('sisa')->nullable();
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
