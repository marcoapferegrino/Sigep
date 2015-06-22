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
           // $table->string('name');
            //$table->string('apellidoP');
            //$table->string('apellidoM');
            //$table->date('fechanac');
            //$table->string('nacionalidad');
            //$table->string('edonacimiento');
            //$table->enum('genero', ['Hombre', 'Mujer']);
            //$table->string('rfc')->unique();
            //$table->string('curp')->unique();
            $table->string('status');               //es estado ?
            $table->string('tipoIdOficial');
            $table->string('noIdOficial');
            $table->string('escuelaLugarIpn');
            $table->string('extensionIpn',7);
            $table->string('email1');
            $table->string('movil');
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
            $table->string('ultimoaniolicenciatura');
            $table->string('tesisLicenciatura');
            $table->date('examenlicenciatura');
            $table->string('cedulalicenciatura');
            $table->string('observacioneslicenciatura',300);
                        //maestria
            $table->string('escuelamaestria');
            $table->string('localidadmaestria');
            $table->string('carreramaestria');
            $table->string('especialidadmaestria');
            $table->string('situacionestudiosmaestria'); //cambiar en bd
            $table->string('anioiniciaestudiosmaestria');
            $table->string('ultimoanioestudiosmaestria');
            $table->string('tesismaestria');
            $table->date('examenmaestria');
            $table->string('cedulamaestria');
            $table->string('observacionesmaestria',300);

                        //doctorado

            $table->string('escueladoctorado');
            $table->string('localidaddoctorado');
            $table->string('carreradoctorado');
            $table->string('especialidaddoctorado');
            $table->string('situacionestudiosdoctorado'); //cambiar en BD por duplicidad de atributo
            $table->string('anioiniciaestudiosdoctorado');
            $table->string('ultimoanioestudiosdoctorado');
            $table->string('tesisdoctorado');
            $table->date('examendoctorado');
            $table->string('ceduladoctorado');
            $table->string('observacionesdoctorado',300);

            $table->string('categoria',10);
            $table->string('nivel',1);
            $table->string('clavepresupuestal');
            $table->date('ingresoipn');
            $table->string('numempleado',8);
            $table->string('numtarjetaescom',8);
            $table->string('idusuarioregistra');
            $table->string('fechahoraregistro');
            $table->string('idusuarioactualiza'); //el usuario que hizo la ultima actualizacion
            $table->string('sip')->unique();
            //$table->string('email')->unique();
            //$table->string('password', 60);

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
