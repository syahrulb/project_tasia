<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangPendukungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_pendukungs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_jenis_komponen_jasa');
            $table->foreign('id_jenis_komponen_jasa')->references('id_jenis_komponen_jasa')->on('jenis_komponen_jasas');
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
        Schema::dropIfExists('barang_pendukungs');
    }
}
