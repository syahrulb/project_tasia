<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeHasAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_has_akuns', function (Blueprint $table) {
            $table->unsignedInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periode');
            $table->unsignedInteger('id_akun');
            $table->foreign('id_akun')->references('id_akun')->on('akuns');
            $table->string('nama_akun', 1000);
            $table->double('saldo_akun');
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
        Schema::dropIfExists('periode_has_akuns');
    }
}
