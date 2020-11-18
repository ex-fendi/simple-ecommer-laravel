<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKabupaten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // untuk pengembangan

        // Schema::create('tbl_kabupaten', function (Blueprint $table) {
        //     $table->increments('no');
        //     $table->string('id_kabupaten');
        //     $table->text('nama_kabupaten');
        //     $table->string('id_provinsi'); //foreign
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kabupaten');
    }
}
