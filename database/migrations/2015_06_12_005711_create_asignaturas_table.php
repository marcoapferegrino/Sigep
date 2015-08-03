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
            $table->double('creditos')->default(0);
            $table->double('horasPract');
            $table->double('horasTeoricas');
            $table->enum('tipo', ['obligatoria','seminario','optativa','estancia']);
            $table->date('fechaElabP');



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
