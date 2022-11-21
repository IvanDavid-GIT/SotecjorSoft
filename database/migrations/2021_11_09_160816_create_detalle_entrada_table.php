<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_entrada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('IdMaterial')->references('id')->on('materiales')->onDelete('cascade');
            $table->foreignId('IdEntrada')->references('id')->on('entradas')->onDelete('cascade');
            $table->string('CodigoEntrada',20);
            $table->integer('Cantidad');
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
        Schema::dropIfExists('detalle_entrada');
    }
}
