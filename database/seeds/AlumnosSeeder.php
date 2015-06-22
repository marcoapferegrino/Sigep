<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 22/06/15
 * Time: 11:44
 */

namespace database\seeds;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider;
use \PosgradoService\Entities\User;

class AlumnosSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 10; $i++)
        {
            $alumno = Alumno::create([

                'fechanac' =>$faker->date,
                'nacionalidad' => $faker->country ,
                'edonacimiento' => $faker->state,
                'genero' => $faker->titleMale ,
                'rfc' => $faker->creditCardNumber,
                'curp' => $faker->swiftBicNumber ,
                'status'=> 'alumno Activo',
                'sip' => $faker->swiftBicNumber ,

            ]);



            User::create([
                'alumno_id' => $alumno->id,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
            ]);
        }
    }
}