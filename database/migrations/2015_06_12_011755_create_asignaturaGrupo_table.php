<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_grupo', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('acta'); //1 si esta abierta 0 si esta cerrada para calificar

            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos');

            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');

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
        Schema::drop('asignatura_grupo');
    }
}
