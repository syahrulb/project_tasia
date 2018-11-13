<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisRasiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_rasios', function (Blueprint $table) {
            $table->increments('id_jenis_rasio');
            $table->string('jenis_rasio');
            $table->unsignedInteger('master_diagram');
            $table->foreign('master_diagram')->references('id_master_diagram')->on('master_diagrams')->onDelete('cascade');
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
        Schema::dropIfExists('jenis_rasios');
    }
}
