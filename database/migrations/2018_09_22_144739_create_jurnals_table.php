<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nota_jasa_nomor_bukti');
            $table->foreign('nota_jasa_nomor_bukti')->references('nomor_bukti')->on('nota_jasas');
            $table->unsignedInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periode');
            $table->date('tanggal_jurnal');
            $table->string('jenis', 1000);
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
        Schema::dropIfExists('jurnals');
    }
}
