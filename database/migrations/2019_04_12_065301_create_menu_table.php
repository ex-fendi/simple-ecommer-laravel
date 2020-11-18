<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('no');
            $table->string('id_menu', 5);
            $table->string('nama_menu', 25);
            $table->string('is_header', 1);
            $table->string('induk', 5);
            $table->string('nama_controller');
            $table->string('urutan', 2);
            $table->string('level_admin', 1)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
