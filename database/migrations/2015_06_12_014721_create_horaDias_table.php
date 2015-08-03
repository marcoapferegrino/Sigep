<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoraDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horaDias', function (Blueprint $table) {
            $table->increments('id');

            $table->json('dias');
            $table->json('horario');
            $table->string('nombre');

            $table->integer('asignatura_grupo_id')->unsigned();
            $table->foreign('asignatura_grupo_id')->references('id')->on('asignatura_grupo');

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
        Schema::drop('horaDias');
    }
}
