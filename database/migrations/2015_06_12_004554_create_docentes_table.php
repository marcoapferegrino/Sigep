<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sip')->unique();
            $table->enum('status',['Activo' , 'Licencia','Con goce de sueldo', 'Licencia sin goce de sueldo', 'Cambios de adscripción', 'Semestre sabático', 'Año sabático', 'Otro(observaciones profesor)']);
            $table->string('escuelaLugarIpn');
            $table->string('extensionIpn',20);
            $table->string('email2');
            $table->string('web',200);
            $table->string('observacionesDocente',300);

            //$table->string('viveCon');              //duda

                        //licenciatura
            $table->string('escuelaLicenciatura');
            $table->string('localidadLicenciatura');
            $table->string('carreraLicenciatura');
            $table->string('especialidadLicenciatura');
            $table->enum('situacionLicenciatura',['S/E'=>'S/E','Titulado'=>'Titulado','Pasante'=>'Pasante','Créditos'=>'Créditos','Finalizado'=>'Finalizado']);
            $table->string('anioinicialLicenciatura');
            $table->string('ultimoAnioLicenciatura');
            $table->string('tesisLicenciatura');
            $table->date('examenLicenciatura');
            $table->string('cedulaLicenciatura');
            $table->string('observacionesLicenciatura',300);
                        //maestria
            $table->string('escuelaMaestria');
            $table->string('localidadMaestria');
            $table->string('carreraMaestria');
            $table->string('especialidadMaestria');
            $table->enum('situacionEstudiosMaestria',['S/E'=>'S/E','Titulado'=>'Titulado','Pasante'=>'Pasante','Créditos'=>'Créditos','Finalizado'=>'Finalizado']); //cambiar en bd
            $table->string('anioIniciaEstudiosMaestria');
            $table->string('ultimoAnioEstudiosMaestria');
            $table->string('tesisMaestria');
            $table->date('examenMaestria');
            $table->string('cedulaMaestria');
            $table->string('observacionesMaestria',300);

                        //doctorado

            $table->string('escuelaDoctorado');
            $table->string('localidadDoctorado');
            $table->string('carreraDoctorado');
            $table->string('especialidadDoctorado');
            $table->enum('situacionEstudiosDoctorado',['S/E'=>'S/E','Titulado'=>'Titulado','Pasante'=>'Pasante','Créditos'=>'Créditos','Finalizado'=>'Finalizado']); //cambiar en BD por duplicidad de atributo
            $table->string('anioiniciaestudiosDoctorado');
            $table->string('ultimoAnioEstudiosDoctorado');
            $table->string('tesisDoctorado');
            $table->date('examenDoctorado');
            $table->string('cedulaDoctorado');
            $table->string('observacionesDoctorado',300);

            $table->enum('categoria',['Asociado','Titular']);//asociado,titular
            $table->enum('nivel',['A','B','C']);//ABC
            $table->string('clavePresupuestal');
            $table->date('ingresoIpn');
            $table->string('numEmpleado',8);
            $table->string('numTarjetaEscom',8);
            $table->string('idUsuarioRegistra');
            $table->dateTime('fechaHoraRegistro');
            $table->string('idUsuarioActualiza'); //el usuario que hizo la ultima actualizacion



            $table->integer('tutor_id')->unsigned()->nullable();
            $table->foreign('tutor_id')->references('id')->on('tutores')->onDelete('cascade');

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
        Schema::drop('docentes');
    }
}
