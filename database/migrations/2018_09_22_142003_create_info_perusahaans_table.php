<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoPerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_perusahaans', function (Blueprint $table) {
            $table->increments('id_info_perusahaan');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama_perusahaan', 1000);
            $table->string('alamat', 1000);
            $table->string('bidang_perusahaan');
            $table->string('telefon');
            $table->string('fax');
            $table->string('email')->unique();
            $table->date('tanggal_mulai_data');
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
        Schema::dropIfExists('info_perusahaans');
    }
}
