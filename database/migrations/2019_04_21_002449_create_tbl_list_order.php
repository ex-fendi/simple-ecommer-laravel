<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblListOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_list_order', function (Blueprint $table) {
            $table->increments('no');
            $table->string('id_order'); //foreign
            $table->string('id_produk'); //foreign
            $table->integer('jumlah');
            $table->enum('cair',['belum', 'sudah'])->default('belum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_list_order');
    }
}
