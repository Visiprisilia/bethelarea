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
        {
            Schema::create('amandemen', function (Blueprint $table) {
                $table->string('id_amandemen')->autoIncrement();
                $table->string('kode_prokeramandemen')->nullable();
                $table->string('periode_amandemen')->nullable();
                $table->string('tanggal_amandemen')->nullable();
                $table->string('anggaran_amandemen')->nullable();
                $table->string('status_amandemen')->nullable();
                $table->string('keterangan_amandemen')->nullable();
                $table->string('catatan_amandemen')->nullable();
                $table->timestamps();
            });
        }
    
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
