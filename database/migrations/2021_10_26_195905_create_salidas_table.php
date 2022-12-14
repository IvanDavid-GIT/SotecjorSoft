<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('CodigoSalida',20)->unique();
            $table->foreignId('Obra')->references('id')->on('proyectosdeobras')->onDelete('cascade');
            $table->date('FechaSalida');
            $table->text('Descripcion');
            $table->text('Comentario')->nullable();
            $table->foreignId('Responsable')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('Estado')->references('id')->on('estados')->onDelete('cascade');
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
        Schema::dropIfExists('salidas');
    }
}
