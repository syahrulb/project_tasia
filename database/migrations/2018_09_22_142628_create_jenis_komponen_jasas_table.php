<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisKomponenJasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_komponen_jasas', function (Blueprint $table) {
            $table->increments('id_jenis_komponen_jasa');
            $table->string('jenis_jasa_sewa', 1000);
            $table->string('item_jasa_sewa', 1000);
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
        Schema::dropIfExists('jenis_komponen_jasas');
    }
}
