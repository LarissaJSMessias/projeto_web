<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datareserva');
            $table->string('horarioreserva', 10);

            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
