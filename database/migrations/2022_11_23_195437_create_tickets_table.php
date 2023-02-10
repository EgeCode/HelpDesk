<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->string('descripcion');
            $table->string('telefono');
            $table->string('departamento');
            $table->string('ip')->nullable();
            $table->integer('asignado')->nullable();
            $table->string('edificio')->nullable();
            $table->string('usuario_red')->nullable();
            $table->string('autoriza')->nullable();
            $table->integer('creador');
            $table->string('prioridad');
            $table->string('categoria')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->integer('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
