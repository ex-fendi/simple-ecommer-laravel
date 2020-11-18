<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // untuk pengembangan

        // Schema::create('tbl_kecamatan', function (Blueprint $table) {
        //     $table->increments('no');
        //     $table->string('id_kecamatan');
        //     $table->text('nama_kecamatan');
        //     $table->string('id_kabupaten'); //foreign
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kecamatan');
    }
}
