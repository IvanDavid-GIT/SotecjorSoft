<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosdeobrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectosdeobras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('lugar',40);
            $table->text('Observacion',200)->nullable();
            $table->string('Responsable',50);
            $table->foreignId('estado')->references('id')->on('estados')->onDelete('cascade');
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
        Schema::dropIfExists('proyectosdeobras');
    }
}
