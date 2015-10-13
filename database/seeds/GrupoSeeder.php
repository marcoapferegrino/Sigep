<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 17:54
 */

use Sigep\Entities\Grupo;
use Faker\Factory as Faker;
use Faker\Provider;

class GrupoSeeder extends \Illuminate\Database\Seeder {


    public function run(){
        $faker = Faker::create();
        $grupos = array(
            '1cv1',
            '1cv2',
            '1cv3',
            '1cv4',
            '2cv1',
            '2cv2',
            '2cv3',
            '2cv4',
        );

        for($i=0 ; $i < count($grupos); $i++)
        {
            Grupo::create([
                'nombre' => $grupos[$i],
                'salon' => $grupos[$i],
                'semestre' => $faker->randomElement([1,2]),
                'periodo_id' => $faker->randomElement([1,2])
            ]);
        }

    }
}