<?php
/**
 * Created by PhpStorm.
 * User: luisknight
 * Date: 28/06/15
 * Time: 01:02 PM
 */



use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider;
use PosgradoService\Entities\Checadas;

class ChecadasSeeder extends \Illuminate\Database\Seeder {


    public function run(){

        $faker = Faker::create();

        for($i=0 ; $i < 10; $i++)
        {
            Checadas::create([
            'alumno_id'=>1,
            'tipo'=> $faker-> sentence($nbWords = 1),
            'fechachecada'=> $faker-> date,
            'horachecada' => $faker->datetime,
            'semana' => $faker ->numberBetween(1,52) ,
            'anio' => $faker ->numberBetween(2010,2015) ,
            'observaciones'  => $faker-> sentence($nbWords = 12),
            'idusuarioregistra' => 1,// $faker ->numberBetween(css,100),
            'fechahoraregistro' => \Carbon\Carbon::now(),//$faker-> datetime,
            'idusuarioactualiza' => 1,//$faker ->numberBetween(css,100),
            'fechahoraultimaactualizacion' => \Carbon\Carbon::now(),//$faker->datetime,
            ]);
        }

    }
}