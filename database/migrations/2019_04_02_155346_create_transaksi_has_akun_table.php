<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiHasAkunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_has_akuns', function (Blueprint $table) {
            $table->integer('transaksi_id_transaksi');
            $table->integer('akun_id_akun');
            $table->string('sifat', 45);
            $table->string('urutan', 45);
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
        Schema::dropIfExists('transaksi_has_akuns');
    }
}
