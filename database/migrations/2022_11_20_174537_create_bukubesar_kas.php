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
        Schema::create('bukubesar_kas', function (Blueprint $table) {
            $table->string('kode_akun')->primary();
            $table->string('uraian')->nullable();
            $table->string('bertambah')->nullable();
            $table->string('berkurang')->nullable();
            $table->string('saldo')->nullable();
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
        Schema::dropIfExists('bukubesar_kas');
    }
};
