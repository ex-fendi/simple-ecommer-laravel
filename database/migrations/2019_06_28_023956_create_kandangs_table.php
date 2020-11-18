<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKandangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->text('foto');
            $table->text('fasilitas');
            $table->integer('harga');
            $table->string('luas');
            $table->integer('max');
            $table->text('lokasi');
            $table->enum('is_full', ['y','n'])->default('n');
            $table->enum('is_deleted', ['y', 'n'])->default('n');
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
        Schema::dropIfExists('kandangs');
    }
}
