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
            'Arquitectura de móviles',
            'Métodos matématicos para el análisis de sistemas y señales',
            'Móviles tecnologías',
            'Seminario I',
            'Seminario II',
            'Seminario III',
            'Seminario IV',
            'Optativa I',
            'Optativa II'

        );

        for($i=0 ; $i< count($asignaturas) ; $i++)
        {
            Asignatura::create([
                'nombre' => $asignaturas[$i],
                'claveAsignatura'=>'clv'.$i,
                'creditos' => $i*3,
                'horas' => 4,
                'curso'=> $faker->randomElement(['Teórico','Práctico','T/P']),
                'tipo' => $faker->randomElement(['obligatoria','seminario','optativa','movilidad']),
                'fechaVigencia'=>\Carbon\Carbon::now(),
        ]);
        }



    }


}