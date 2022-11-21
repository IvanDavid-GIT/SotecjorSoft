<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40)->unique();
            $table->foreignId('categoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreignId('medida')->references('id')->on('medidas')->onDelete('cascade');
            $table->text('descripcion');
            $table->foreignId('Estado')->references('id')->on('estados')->onDelete('cascade');
            $table->integer('stock')->nullable();
            $table->integer('stockMin');
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
        Schema::dropIfExists('materiales');
    }
}
