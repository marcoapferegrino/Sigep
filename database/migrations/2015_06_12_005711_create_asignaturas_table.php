<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('claveAsignatura');
            $table->double('creditos')->default(0);
            $table->double('horas'); //suma de teoricas y practicas
            $table->enum('curso',['Teórico','Práctico','T/P','Seminario']);
            $table->enum('tipo', ['obligatoria','seminario','optativa','movilidad']);
            $table->string('escuelaMovilidad');
            $table->date('fechaVigencia');

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
        Schema::drop('asignaturas');
    }
}
