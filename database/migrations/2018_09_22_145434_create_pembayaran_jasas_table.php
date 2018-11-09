<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranJasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_jasas', function (Blueprint $table) {
            $table->unsignedInteger('id_jenis_komponen_jasa');
            $table->foreign('id_jenis_komponen_jasa')->references('id_jenis_komponen_jasa')->on('jenis_komponen_jasas');
            $table->unsignedInteger('nomor_pembayaran');
            $table->foreign('nomor_pembayaran')->references('nomor_pembayaran')->on('pembayarans');
            $table->double('total_pembayaran');
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
        Schema::dropIfExists('pembayaran_jasas');
    }
}
