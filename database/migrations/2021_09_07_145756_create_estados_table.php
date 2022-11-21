<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20)->unique();
            $table->timestamps();
        });

        DB::table("estados")
            ->insert([
                "nombre" => "Activo",
            ]);


        DB::table("estados")
            ->insert([
                "nombre" => "Inactivo",
            ]);


        DB::table("estados")
            ->insert([
                "nombre" => "Anulada",
            ]);

        DB::table("estados")
            ->insert([
                "nombre" => "Activa",
            ]);

        DB::table("estados")
            ->insert([
                "nombre" => "Abierto",
            ]);

        DB::table("estados")
            ->insert([
                "nombre" => "Cerrado",
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
