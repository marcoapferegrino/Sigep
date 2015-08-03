<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('calificacion',['0','1','2','3','4','5','6','7','8','9','10','NP','S/C']);

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('docente_id')->on('asignatura_grupo');

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('grupo_id')->on('asignatura_grupo');

            $table->integer('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('asignatura_id')->on('asignatura_grupo');

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
        Schema::drop('inscripciones');
    }
}
