<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('apellidoP',20);
            $table->string('apellidoM',20);
            $table->date('fechanac');
            $table->string('nacionalidad',20);
            $table->string('edoNacimiento',20);
            $table->enum('genero', ['Hombre', 'Mujer']);;
            $table->string('rfc',14)->unique();
            $table->string('curp',18)->unique();
            $table->enum('tipoIdOficial',['ife','licenciaManejo','pasaporte','cartilla']);
            $table->string('noIdOficial',20);//numero del Id de identificacion
            $table->string('direccion',60);
            $table->string('colonia',20);
            $table->string('ciudad',20);
            $table->string('estado',25);
            $table->string('cp',15);
            $table->string('telefono',15);
            $table->string('telMovil',15);
            $table->enum('edoCivil',['casado','soltero','viudo','divorciado'])->nullable();
            $table->integer('numHijos')->nullable();


            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();

            $table->integer('alumno_id')->unsigned()->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');;

            $table->integer('docente_id')->unsigned()->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');;
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
        Schema::drop('users');
    }
}
