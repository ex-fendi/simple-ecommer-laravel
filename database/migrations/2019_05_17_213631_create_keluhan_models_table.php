<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluhanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan_models', function (Blueprint $table) {
            $table->increments('no');
            $table->integer('id_pesan')->default(0);
            $table->string('id_user');
            $table->text('pesan');
            $table->enum('is_super', ['n', 'y'])->default('n');
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
        Schema::dropIfExists('keluhan_models');
    }
}
