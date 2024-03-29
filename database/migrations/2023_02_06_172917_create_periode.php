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
        
            Schema::create('periode', function (Blueprint $table) {
                $table->string('kode_periode')->primary();
                $table->string('nama_periode')->unique();
                $table->string('awal_periode')->nullable();
                $table->string('akhir_periode')->nullable();
                $table->string('status')->nullable();
                $table->integer('counter_proker')->nullable();
                $table->integer('counter_kk')->nullable();
                $table->integer('counter_km')->nullable();
                $table->integer('counter_kb')->nullable();
                $table->integer('counter_amandemen')->nullable();
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
        Schema::dropIfExists('periode');
    }
};
