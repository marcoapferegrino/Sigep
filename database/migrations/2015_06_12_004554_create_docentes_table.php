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
            $table->date('fechanac');
            $table->string('nacionalidad');
            $table->string('edonacimiento');
            $table->enum('genero', ['Hombre', 'Mujer']);;
            $table->string('rfc')->unique();
            $table->string('curp')->unique();
            $table->string('status');
            $table->string('sip')->unique();
            //$table->string('email')->unique();
            //$table->string('password', 60);
            $table->rememberToken();
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
