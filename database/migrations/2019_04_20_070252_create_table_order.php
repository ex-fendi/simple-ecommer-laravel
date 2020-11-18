<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('no');
            $table->string('id_order', 10)->unique();
            $table->string('id_user'); //foreign
            $table->string('nama_pembeli');
            $table->string('provinsi');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('alamat_pembeli');
            $table->string('telp');
            $table->string('kode_pos');
            $table->string('pembayaran');
            $table->enum('status_penitipan', ['y', 'n'])->default('n');
            $table->text('bukti_pembayaran');
            $table->string('shiping')->nullable();
            $table->string('status', 1);
            $table->text('tracking')->nullable();
            $table->string('batalkan',1)->nullable();
            $table->text('alasan');
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
        Schema::dropIfExists('tbl_order');
    }
}
