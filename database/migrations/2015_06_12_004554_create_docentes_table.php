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

            $table->string('status');               //es estado ?
            $table->string('escuelaLugarIpn');
            $table->string('extensionIpn',7);
            $table->string('email2');
            $table->string('web',200);

            $table->string('viveCon');              //duda

                        //licenciatura
            $table->string('escuelaLicenciatura');
            $table->string('localidadLicenciatura');
            $table->string('carreraLicenciatura');
            $table->string('especialidadLicenciatura');
            $table->string('situacionLicenciatura');
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
            $table->string('situacionEstudiosMaestria'); //cambiar en bd
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
            $table->string('situacionEstudiosDoctorado'); //cambiar en BD por duplicidad de atributo
            $table->string('anioiniciaestudiosDoctorado');
            $table->string('ultimoAnioEstudiosDoctorado');
            $table->string('tesisDoctorado');
            $table->date('examenDoctorado');
            $table->string('cedulaDoctorado');
            $table->string('observacionesDoctorado',300);

            $table->string('categoria',10);
            $table->string('nivel',1);
            $table->string('clavePresupuestal');
            $table->date('ingresoIpn');
            $table->string('numEmpleado',8);
            $table->string('numTarjetaEscom',8);
            $table->string('idUsuarioRegistra');
            $table->string('fechaHoraRegistro');
            $table->string('idUsuarioActualiza'); //el usuario que hizo la ultima actualizacion
            $table->string('sip')->unique();


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
