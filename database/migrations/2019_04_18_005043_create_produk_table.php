<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('id_kategory'); //foreign
            $table->integer('id_user'); //foreign
            $table->integer('id_kandang'); //foreign
            $table->string('judul_produk');
            $table->float('tinggi_kambing');
            $table->float('berat_kambing');
            $table->float('lingkar_kambing');
            $table->float('panjang_kambing');
            $table->float('umur_kambing');
            $table->text('deskripsi_kambing');
            $table->integer('harga_kambing');
            $table->text('foto');
            $table->integer('stok');
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
        Schema::dropIfExists('tbl_produk');
    }
}
