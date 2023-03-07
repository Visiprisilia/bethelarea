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
        Schema::create('ttd', function (Blueprint $table) {
            $table->string('id_ttd')->autoIncrement();
            $table->string('ketua_yayasan')->nullable();        
            $table->string('bendahara_yayasan')->nullable();        
            $table->string('kepala_sekolah')->nullable();        
            $table->string('bagian_administrasi')->nullable();        
            $table->string('bendahara_sekolah')->nullable();        
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
        Schema::dropIfExists('ttd');
    }
};
