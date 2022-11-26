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
        Schema::create('murid', function (Blueprint $table) {
            $table->string('nomor_induk')->primary();
            $table->string('nomor_isn')->unique();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('ttl')->nullable();
            $table->string('jk')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('anak_keberapa')->nullable();
            $table->string('no_akte')->nullable();
            $table->string('foto_murid')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('kontak')->nullable();
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
