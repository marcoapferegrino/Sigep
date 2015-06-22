<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 22/06/15
 * Time: 11:43
 */

namespace database\seeds;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider;
use \PosgradoService\Entities\Docente;
use \PosgradoService\Entities\User;

class DocentesSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {


                $docente = Docente::create([

                    'fechanac' => $faker->date,
                    'nacionalidad' => $faker->country,
                    'edonacimiento' => $faker->state,
                    'genero' => $faker->titleMale,
                    'rfc' => $faker->creditCardNumber,
                    'curp' => $faker->swiftBicNumber,
                    'status' => 'profesor Activo',
                    'sip' => $faker->swiftBicNumber,


                ]);
                User::create([
                    'docente_id' => $docente->id,
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => bcrypt('secret'),
                ]);
            }

    }
}
