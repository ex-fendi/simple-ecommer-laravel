<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKelurahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // untuk pengembangan

        // Schema::create('tbl_kelurahan', function (Blueprint $table) {
        //     $table->increments('no');
        //     $table->string('id_kelurahan');
        //     $table->text('nama_kelurahan');
        //     $table->string('id_kecamatan'); //foreign
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kelurahan');
    }
}
