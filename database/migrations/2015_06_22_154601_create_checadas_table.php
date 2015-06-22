<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checadas', function(Blueprint $table)
		{


			$table->increments('id');
            $table->string('tipo');
            $table->date('fechachecada');
            $table->time('horachecada');
            $table->integer('semana');
            $table->integer('anio');
            $table->mediumText('observaciones');
            $table->integer('idusuarioregistra');
            $table->dateTime('fechahoraregistro');
            $table->integer('idusuarioactualiza');
            $table->dateTime('fechahoraultimaactualizacion');

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');

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
		Schema::drop('checadas');
	}

}
