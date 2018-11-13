<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunHasPengelompokansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun_has_pengelompokans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_akun')->nullable();
            $table->foreign('id_akun')->references('id_akun')->on('akuns')->onDelete('cascade');
            $table->unsignedInteger('id_kelompok')->nullable();
            $table->foreign('id_kelompok')->references('id_kelompok')->on('pengelompokans')->onDelete('cascade');
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
        Schema::dropIfExists('akun_has_pengelompokans');
    }
}
