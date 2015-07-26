<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 22/06/15
 * Time: 11:44
 */




use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider;
use \PosgradoService\Entities\User;
use \PosgradoService\Entities\Alumno;

class AlumnosSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 10; $i++)
        {
            $alumno = Alumno::create([

                'status' => $faker->randomElement(['Activo','Egresado','De baja']),
                'dependEconomic' => $faker->randomElement(['Papá','Mamá','Padres','No']),
                'viveCon' => $faker->randomElement(['Padres','Solo']),
                'gradoDeEstudios'=> $faker->randomElement(['Maestria','Doctorado','Licencitura']),
                'situacionEstudios'=> $faker->randomElement(['Activo','Egresado','De baja']),
                'califEstudios'=> $faker->numberBetween(6,10),
                'localidadEstudios'=> $faker->city,
                'aniosEstudios'=> $faker->numberBetween(1,6),
                'escuela'=> 'Escuela Superior de Cómputo',
                'especialidadCarrera'=> 'Sistemas Computacionales',
                'retomarEstudios'=> 'Si',
                'observacionEstudios'=> 'El usuario parece querer entrar',

                'empresaUltimoEmpleo'=> $faker->company.$faker->companySuffix,
                'puestoCategUltimoEmpleo'=> $faker->randomElement(['Project Manager','Designer','DBA','Network Manager']),
                'jefeInmediatoUltimoEmpleo'=> $faker->name.$faker->lastName,
                'telefonoUltimoEmpleo'=> $faker->phoneNumber,
                'fechaIngresoUltimoEmpleo'=> $faker->date(),
                'fechaTerminoUltimoEmpleo'=>$faker->date(),
                'actividadesUltimoEmpleo'=> $faker->randomElement(['Admin BD','Admin NetWork','Web','FrontEnd','BackEnd','WebServices']),
                'motivosSeparacionUltimoEmpleo'=> 'No hay oportunidad de crecimiento',
                'tiempoEnRamoConstruccion' => $faker->time(),
                'actividadesQueConoce'=> $faker->randomElement(['Admin BD','Admin NetWork','Web','FrontEnd','BackEnd','WebServices']),
                'conocimientoHerramientasConstru'=> $faker->randomElement(['MySQL Workbench','Visual Paradigm','.NET','Xcode','PHPStorm']),
                'conocimientoherramientasadmin'=> $faker->randomElement(['MySQL Workbench','Visual Paradigm','.NET','Xcode','PHPStorm']),
                'conocimientoSoftware'=> $faker->randomElement(['Admin BD','Admin NetWork','Web','FrontEnd','BackEnd','WebServices']),
                'obsconocimientos'=>$faker->randomElement(['Admin BD','Admin NetWork','Web','FrontEnd','BackEnd','WebServices']),

                'ref1Nombre'=>$faker->name.$faker->lastName,
                'ref1Afinidad'=> $faker->randomElement(['Jefe Inmediato','Jefe','Personal','Director']),
                'ref1Domicilio'=>$faker->streetAddress,
                'ref1Telefono'=>$faker->phoneNumber,
                'ref1Tiempoconocerlo'=>$faker->numberBetween(1,6),

                'ref2Nombre'=>$faker->name.$faker->lastName,
                'ref2Afinidad'=>$faker->randomElement(['Jefe Inmediato','Jefe','Personal','Director']),
                'ref2Domicilio'=>$faker->streetAddress,
                'ref2Telefono'=>$faker->phoneNumber,
                'ref2Tiempoconocerlo'=>$faker->numberBetween(1,6),

                'ref3Nombre'=>$faker->name.$faker->lastName,
                'ref3Afinidad'=>$faker->randomElement(['Jefe Inmediato','Jefe','Personal','Director']),
                'ref3Domicilio'=>$faker->streetAddress,
                'ref3Telefono'=>$faker->phoneNumber,
                'ref3Tiempoconocerlo'=>$faker->numberBetween(1,6),

                'idUsuarioQueActualiza'=>$faker->numberBetween(1,6),


            ]);

            User::create([
                'alumno_id' => $alumno->id,
                'rol' => 'alumno',
                'name' => $faker->firstName($gender = null|'male'|'female'),
                'apellidoP' =>  $faker->lastName,
                'apellidoM' => $faker->lastName,
                'fechanac' => $faker->date(),
                'nacionalidad'=> $faker->country,
                'edoNacimiento'=> $faker->state,
                'genero' => $faker->randomElement(['Hombre','Mujer']),
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
                'edoCivil' => $faker->randomElement(['casado','soltero','viudo','divorciado']),
                'numHijos'=> $faker->numberBetween(0,10),
                'email' => $faker->email,
                'password' => bcrypt('secret'),
            ]);
        }
    }
}