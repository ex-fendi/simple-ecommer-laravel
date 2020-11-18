<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenjual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detailuser', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama_user');
            $table->string('alamat_user');
            $table->string('nohp_user')->unique();
            $table->text('tentang_user')->nullable();
            $table->string('email_user')->nullable();
            $table->string('is_deleted', 1)->default('n');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_detailuser');
    }
}
