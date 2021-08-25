<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero', 16);
            $table->string('valor', 16);
            $table->string('saida', 16);
            $table->string('chegada', 16);
            $table->string('tempovoo', 16);
            $table->string('aeroportosaida', 100);
            $table->string('aeroportochegada', 100);
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
        Schema::dropIfExists('voos');
    }
}
