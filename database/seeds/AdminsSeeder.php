<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 24/07/15
 * Time: 10:50
 */
use Faker\Factory as Faker;
use Faker\Provider;
use \Sigep\Entities\User;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $admin=User::create([

            'rol' => 'admin',
            'name' =>'PruebaAdmin',
            'apellidoP' =>  'PaternoAdmin',
            'apellidoM' => 'MaternoAdmin',
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
            'alumno_id' => null,
            'docente_id' => null,

            'numHijos'=> 0,
            'email' => 'adminOneSecret@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $admin2=User::create([

            'rol' => 'admin',
            'name' =>'Administrador',
            'apellidoP' =>  'PaternoAdmin',
            'apellidoM' => 'MaternoAdmin',
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
            'alumno_id' => null,
            'docente_id' => null,

            'numHijos'=> 0,
            'email' => 'admintwoSecret@gmail.com',
            'password' => bcrypt('secret'),
        ]);

       $super =  User::create([

            'rol' => 'superAdmin',
            'name' =>'Edgardo Adrian',
            'apellidoP' =>  'Franco',
            'apellidoM' => 'Martínez',
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
            'alumno_id' => null,
            'docente_id' => null,
            'numHijos'=> 0,
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('secret'),
        ]);

//        $docente =  User::create([
//
//            'rol' => 'docente',
//            'name' =>'PruebaDocente',
//            'apellidoP' =>  'PaternoDocente',
//            'apellidoM' => 'MaternoDocente',
//            'fechanac' => $faker->date(),
//            'nacionalidad'=> $faker->country,
//            'edoNacimiento'=> $faker->state,
//            'genero' => 'Hombre',
//            'rfc'=> $faker->swiftBicNumber,
//            'curp'=> $faker->swiftBicNumber,
//            'tipoIdOficial'=>$faker->randomElement(['ife','licenciaManejo','pasaporte','cartilla']),
//            'noIdOficial' => $faker->swiftBicNumber,
//            'direccion' => $faker->streetAddress,
//            'colonia'=> $faker->citySuffix,
//            'ciudad' => $faker->city,
//            'estado' => $faker->state,
//            'cp' => $faker->postcode,
//            'telefono' => $faker->phoneNumber,
//            'telMovil' => $faker->phoneNumber,
//            'edoCivil' => 'soltero',
//            'alumno_id' => null,
//            'docente_id' => null,
//            'numHijos'=> 0,
//            'email' => 'docente@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);

//        $alumno =  User::create([
//
//            'rol' => 'alumno',
//            'name' =>'PruebaAlumno',
//            'apellidoP' =>  'PaternoAlumno',
//            'apellidoM' => 'MaternoAlumno',
//            'fechanac' => $faker->date(),
//            'nacionalidad'=> $faker->country,
//            'edoNacimiento'=> $faker->state,
//            'genero' => 'Hombre',
//            'rfc'=> $faker->swiftBicNumber,
//            'curp'=> $faker->swiftBicNumber,
//            'tipoIdOficial'=>$faker->randomElement(['ife','licenciaManejo','pasaporte','cartilla']),
//            'noIdOficial' => $faker->swiftBicNumber,
//            'direccion' => $faker->streetAddress,
//            'colonia'=> $faker->citySuffix,
//            'ciudad' => $faker->city,
//            'estado' => $faker->state,
//            'cp' => $faker->postcode,
//            'telefono' => $faker->phoneNumber,
//            'telMovil' => $faker->phoneNumber,
//            'edoCivil' => 'soltero',
//            'alumno_id' => null,
//            'docente_id' => null,
//            'numHijos'=> 0,
//            'email' => 'alumno@gmail.com',
//            'password' => bcrypt('shepecret'),
//        ]);

        $super->rol='superAdmin';
        $super->password=bcrypt('posgradoSA$234');
        $super->save();

        $admin->rol='admin';
        $admin->password=bcrypt('posgradoDR$489');
        $admin->save();

        $admin2->rol='admin';
        $admin2->password=bcrypt('posgradoTH$987');
        $admin2->save();

//        $docente->rol='docente';
//        $docente->password=bcrypt('secret');
//        $docente->save();
//
//        $alumno->rol='alumno';
//        $alumno->password=bcrypt('secret');
//        $alumno->save();
    }

}