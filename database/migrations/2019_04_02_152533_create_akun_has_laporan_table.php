<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunHasLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun_has_laporans', function (Blueprint $table) {
            $table->integer('akun_id_akun');
            $table->integer('laporan_id_laporan');
            $table->integer('urutan');
            $table->string('keterangan', 45);
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
        Schema::dropIfExists('akun_has_laporans');
    }
}
