<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActivasiUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_aktivasi', function (Blueprint $table) {
            $table->bigIncrements('no');
            $table->string('id_user'); //foreign
            $table->string('kode_aktivasi', 5);
            $table->string('status_aktivasi', 1);// S/B
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
        Schema::dropIfExists('tbl_aktivasi');
    }
}
