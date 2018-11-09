<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kontraks', function (Blueprint $table) {
            $table->increments('id_surat_kontrak');
            $table->unsignedInteger('pihak_1');
            $table->foreign('pihak_1')->references('id')->on('users');
            $table->unsignedInteger('pihak_2');
            $table->foreign('pihak_2')->references('id')->on('users');
            $table->unsignedInteger('nota_jasa_nomor_bukti');
            $table->foreign('nota_jasa_nomor_bukti')->references('nomor_bukti')->on('nota_jasas');
            $table->date('tanggal_laporan');
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
        Schema::dropIfExists('surat_kontraks');
    }
}
