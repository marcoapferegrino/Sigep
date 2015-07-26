<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 24/07/15
 * Time: 10:50
 */
use Faker\Factory as Faker;
use Faker\Provider;
use \PosgradoService\Entities\User;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        User::create([

            'rol' => 'admin',
            'name' =>'Marco',
            'apellidoP' =>  'Perez',
            'apellidoM' => 'Feregrino',
            'fechanac' => $faker->date(),
            'nacionalidad'=> $faker->country,
            'edoNacimiento'=> $faker->state,
            'genero' => 'Hombre',
            'rfc'=> $faker->swiftBicNumber,
            'curp'=> $faker->swiftBicNumber,
            'tipoIdOficial'=>$faker->randomElement(['ife','licenciaManejo','pasaporte','cartilla']),
            'noIdOficial' => $faker->swiftBicNumber,
            'direccion' => $faker->streetAddress,
            'colonia'=> $faker->citySuffix,
            'ciudad' => $faker->city,
            'estado' => $faker->state,
            'cp' => $faker->postcode,
            'telefono' => $faker->phoneNumber,
            'telMovil' => $faker->phoneNumber,
            'edoCivil' => 'soltero',
            'numHijos'=> 0,
            'email' => 'ferefuc@gmail.com',
            'password' => bcrypt('secret'),
        ]);


    }

}