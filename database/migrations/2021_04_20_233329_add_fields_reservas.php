<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsReservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
        $table->integer('cliente_id')->unsigned();
        $table->foreign('cliente_id')->references('id')->on('cliente');
        $table->integer('voo_id')->unsigned();
        $table->foreign('voo_id')->references('id')->on('voos');
        $table->integer('compra_id')->unsigned();
        $table->foreign('compra_id')->references('id')->on('compras');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
