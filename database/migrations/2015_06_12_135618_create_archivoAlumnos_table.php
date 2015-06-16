<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivoAlumnos', function (Blueprint $table) {
            $table->increments('id');

            $table->mediumText('descripcion');
            $table->string('extension');
            $table->double('tamanio');
            $table->mediumText('observaciones');
            $table->mediumText('archivo');
            $table->string('nombreOriginal');
            $table->integer('numArchivos');
            $table->integer('idUsuarioActualiza');
            $table->timestamp('fechaActualiza');

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');

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
        Schema::drop('archivoAlumnos');
    }
}
