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
         
        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->string('kode_proker')->nullable();
            $table->string('kode_akun')->nullable();
            $table->string('periode')->nullable();
            $table->string('jumlah')->nullable();
            $table->timestamps();
            $table->foreign('kode_proker')->references('kode_proker')->on('program_kerja')->onDelete('cascade');
            $table->foreign('kode_akun')->references('kode_akun')->on('coa')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akuns');
    }
};
