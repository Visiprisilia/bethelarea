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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->string('id_tagihan')->autoIncrement();            
            $table->string('nis_tagihan')->nullable();
            $table->string('periode_tagihan')->nullable();          
            $table->integer('uang_pendaftaran')->nullable();
            $table->integer('uang_pengembanganpendidikan')->nullable();
            $table->integer('uang_peralatan')->nullable();
            $table->integer('uang_seragam')->nullable();
            $table->integer('uang_parenting')->nullable();
            $table->integer('uang_spp')->nullable();
            $table->integer('uang_kegiatan')->nullable();
            $table->integer('uang_lainlain')->nullable();
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
        Schema::dropIfExists('tagihan');
    }
};
