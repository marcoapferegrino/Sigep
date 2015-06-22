<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 13/06/15
 * Time: 16:41
 */

use Faker\Factory as Faker;
use Faker\Provider;
use \PosgradoService\Entities\Docente;
use \PosgradoService\Entities\Alumno;
use \PosgradoService\Entities\User;

class UserTableSeeder extends \Illuminate\Database\Seeder{

    /*
    public function getModel()
    {
        return new User();
    }
    public function getDummyData(Generator $faker,array $customValues = array())
    {
        return ['name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret')
        ];
    }

    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(10);

    }

    private function createAdmin (){

        $this->create([
            'name' => 'Marco Feregrino',
            'email' => 'ferefuc@gmail.com',
            'password' => bcrypt('admin'),

        ]);

    }*/

   /* public function run()
    {
        $faker = Faker::create();

        for($i=1; $i <= 10; $i++)
        {


            if ($i%2==0){
                $docente = Docente::create([

                    'fechanac' =>$faker->date,
                    'nacionalidad' => $faker->country ,
                    'edonacimiento' => $faker->state,
                    'genero' => $faker->titleMale ,
                    'rfc' => $faker->creditCardNumber,
                    'curp' => $faker->swiftBicNumber ,
                    'status'=> 'profesor Activo',
                    'sip' => $faker->swiftBicNumber ,

                ]);
                User::create([
                    'docente_id'=> $docente->id,
                    'name'=> $faker->name,
                    'email' => $faker->email,
                    'password' => bcrypt('secret'),
                ]);
            }
            else
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


*/
}