<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('apellidos',40);
            $table->string('email',60)->unique()->nullable();
            $table->string('password',100);
            $table->foreignId('id_tipo_documento')->references('id')->on('tipodocumentos')->onDelete('cascade');
            $table->foreignId('id_rol')->references('id')->on('roles')->onDelete('cascade');
            $table->string('numero_documento',20);
            $table->string('telefono',20);
            $table->string('direccion',100);
            $table->foreignId('estado')->references('id')->on('estados')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
