<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenitipansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penitipans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->string('id_kandang');
            $table->string('id_order');
            $table->date('awal')->nullable();
            $table->date('ahir')->nullable();
            $table->float('total_biaya');
            $table->enum('is_finish', ['y', 'n'])->default('n');
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
        Schema::dropIfExists('penitipans');
    }
}
