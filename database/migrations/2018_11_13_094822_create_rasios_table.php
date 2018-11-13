<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasios', function (Blueprint $table) {
            $table->increments('id_rasio');
            $table->string('nama_rasio');
            $table->string('operator');
            $table->double('nilai_batas');
            $table->unsignedInteger('jenis_rasio');
            $table->foreign('jenis_rasio')->references('id_jenis_rasio')->on('jenis_rasios')->onDelete('cascade');
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
        Schema::dropIfExists('rasios');
    }
}
