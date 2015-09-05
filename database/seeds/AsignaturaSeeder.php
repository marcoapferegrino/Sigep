<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 17:47
 */


use \PosgradoService\Entities\Asignatura;
use Faker\Factory as Faker;
use Faker\Provider;

class AsignaturaSeeder extends \Illuminate\Database\Seeder {


    public  function run()
    {
        $faker = Faker::create();
        $asignaturas = array(
            'Arquitectura de moviles',
            'Métodos matématicos',
            'Moviles tecnologías',
            'Seminario I',
            'Seminario II',
            'Redes moviles ',
            'Seminario III',

        );

        for($i=0 ; $i< count($asignaturas) ; $i++)
        {
            Asignatura::create([
                'nombre' => $asignaturas[$i],
                'claveAsignatura'=>'clv'.$i,
                'creditos' => $i*10,
                'horas' => $i*2,
                'curso'=> $faker->randomElement(['Teórico','Práctico','T/P']),
                'tipo' => $faker->randomElement(['obligatoria','seminario','optativa','movilidad']),
                'fechaVigencia'=>\Carbon\Carbon::now(),


        ]);
        }



    }


}