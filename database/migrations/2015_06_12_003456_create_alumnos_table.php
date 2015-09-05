<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('boleta');
            $table->string('dependEconomic');//de quien depende economicmente
            $table->string('viveCon'); //con quien vive
            $table->enum('gradoDeEstudios',['Licenciatura','Maestria','Doctorado']);
            $table->enum('situacionEstudios',['Titulado','Pasante','Créditos','Finalizado']);
            $table->double('califEstudios');
            $table->string('localidadEstudios');
            $table->double('aniosEstudios');
            $table->string('escuela',70);
            $table->string('carrera');
            $table->string('especialidadCarrera',70);
            //$table->string('retomarEstudios');
            $table->mediumText('observacionEstudios');//¿?
            //ultimoempleo
            $table->string('empresaUltimoEmpleo');
            $table->string('puestoCategUltimoEmpleo');
            $table->string('jefeInmediatoUltimoEmpleo');
            $table->string('telefonoUltimoEmpleo');
            $table->date('fechaIngresoUltimoEmpleo');
            $table->date('fechaTerminoUltimoEmpleo');
            //conocimientos
            $table->mediumText('actividadesUltimoEmpleo');
            $table->mediumText('motivosSeparacionUltimoEmpleo');
//            $table->string('tiempoEnRamoConstruccion'); //¿?
            $table->longText('actividadesQueConoce');
  //          $table->longText('conocimientoHerramientasConstru');
    //        $table->longText('conocimientoherramientasadmin');
            $table->longText('conocimientoSoftware');
            $table->longText('obsconocimientos');
            //Referencias


            $table->string('ref1Nombre');
            $table->string('ref1Afinidad');
            $table->string('ref1Domicilio');
            $table->string('ref1Telefono');
            $table->string('ref1Tiempoconocerlo');

            $table->string('ref2Nombre');
            $table->string('ref2Afinidad');
            $table->string('ref2Domicilio');
            $table->string('ref2Telefono');
            $table->string('ref2Tiempoconocerlo');


            $table->string('idUsuarioQueActualiza'); //el usuario que hizo la ultima actualizacion

            $table->integer('tutor_id')->unsigned()->nullable();
            $table->foreign('tutor_id')->references('id')->on('tutores');

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
        Schema::drop('alumnos');
    }
}
