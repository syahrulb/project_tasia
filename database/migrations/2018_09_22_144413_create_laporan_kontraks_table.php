<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_kontraks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_surat_kontrak');
            $table->foreign('id_surat_kontrak')->references('id_surat_kontrak')->on('surat_kontraks');
            $table->unsignedInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periodes');
            $table->string('judul_laporan', 1000);
            $table->date('tanggal_laporan');
            $table->double('pendapatan_kotor');
            $table->double('pendapatan_bersih');
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
        Schema::dropIfExists('laporan_kontraks');
    }
}
