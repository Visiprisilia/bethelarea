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
        Schema::create('kategori_tagihanmurid', function (Blueprint $table) {
            $table->string('id_kategoritagihan')->primary();
            $table->string('nama_kategoritagihan')->nullable();     
            $table->integer('default_nominaltagihan')->nullable();     
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
        Schema::dropIfExists('kategori_tagihanmurid');
    }
};
