<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasioHasPengelompokansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasio_has_pengelompokans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_rasio')->nullable();
            $table->foreign('id_rasio')->references('id_rasio')->on('rasios')->onDelete('cascade');
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
        Schema::dropIfExists('rasio_has_pengelompokans');
    }
}
