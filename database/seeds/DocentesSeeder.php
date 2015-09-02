<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 22/06/15
 * Time: 11:43
 */




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

                    'status' =>  $faker->randomElement(['Activo','Sabatico','De baja']),
                    'sip' => $faker->unique()->swiftBicNumber,
                    'escuelaLugarIpn' => 'ESCOM',
                    'extensionIpn' => $faker ->numberBetween(1111111,9999999),   //7
                    'email2'  => $faker->unique()-> email,
                    'web'  => $faker->url,
                    ///licenciatura

                    'escuelaLicenciatura' => $faker->  randomElement(['ESCOM','ESIME','UPIITA','UNAM']),
                    'localidadLicenciatura'  => $faker->randomElement(['MEXICO','DF','GUADALAJARA','EXTRANJERO']),
                    'carreraLicenciatura'  => $faker-> randomElement(['ISC','QUIMICA','MECANICA','PSICOLOGIA']),
                    'especialidadLicenciatura'  => $faker-> randomElement(['BD','REDES','MATERIALES','CONDUCTIVISTA']),
                    'situacionLicenciatura'  => $faker-> randomElement(['Terminada','Trunca','En progreso']),
                    'anioinicialLicenciatura' => $faker-> randomElement(['ESCOM','ESIME','UPIITA','UNAM']),
                    'ultimoAnioLicenciatura'  => $faker->numberBetween(1970,2014),
                    'tesisLicenciatura'   => $faker-> sentence($nbWords = 6),
                    'examenLicenciatura' =>  $faker->date(),
                    'cedulaLicenciatura' => $faker->unique()->swiftBicNumber,
                    'observacionesLicenciatura'  => $faker-> sentence($nbWords = 10), //300
                    //
                    'escuelaMaestria'  => $faker->  randomElement(['ESCOM','ESIME','UPIITA','UNAM']),
                    'localidadMaestria'  => $faker->randomElement(['MEXICO','DF','GUADALAJARA','EXTRANJERO']),
                    'carreraMaestria'  => $faker->randomElement(['ISC','QUIMICA','MECANICA','PSICOLOGIA']),
                    'especialidadMaestria'  => $faker-> randomElement(['BD','REDES','MATERIALES','CONDUCTIVISTA']),
                    'situacionEstudiosMaestria' => $faker-> randomElement(['Terminada','Trunca','En progreso']),
                    'anioIniciaEstudiosMaestria'  =>  $faker->numberBetween(1970,2014),
                    'ultimoAnioEstudiosMaestria'  => $faker->numberBetween(1970,2014),
                    'tesisMaestria'  => $faker-> sentence($nbWords = 6),
                    'examenMaestria' =>  $faker->date(),
                    'cedulaMaestria'  => $faker->unique()->swiftBicNumber,
                    'observacionesMaestria'  => $faker->sentence($nbWords = 10), //300
                    //
                    'escuelaDoctorado'  => $faker->randomElement(['ESCOM','ESIME','UPIITA','UNAM']),
                    'localidadDoctorado'   => $faker->randomElement(['MEXICO','DF','GUADALAJARA','EXTRANJERO']),
                    'carreraDoctorado'   => $faker-> randomElement(['ISC','QUIMICA','MECANICA','PSICOLOGIA']),
                    'especialidadDoctorado'  => $faker-> randomElement(['BD','REDES','MATERIALES','CONDUCTIVISTA']),
                    'situacionEstudiosDoctorado'  => $faker->randomElement(['Terminada','Trunca','En progreso']),
                    'anioiniciaestudiosDoctorado'  => $faker->randomElement(['Terminada','Trunca','En progreso']),
                    'ultimoAnioEstudiosDoctorado'  =>  $faker->numberBetween(1970,2014),
                    'tesisDoctorado'  => $faker->numberBetween(1970,2014),
                    'examenDoctorado'  => $faker->date(),
                    'cedulaDoctorado'  => $faker->unique()->swiftBicNumber,
                    'observacionesDoctorado'  =>$faker->sentence($nbWords = 10), //300
                    'categoria'    => $faker->randomElement(['asociado','titular']),
                    'nivel'    => $faker->randomElement(['A','B','C']),
                    'clavePresupuestal'  => $faker->unique()->swiftBicNumber,
                    'ingresoIpn' => $faker->date(),
                    'numEmpleado'  =>$faker->swiftBicNumber,//8);
                    'numTarjetaEscom' => $faker->swiftBicNumber,//8
                    'idUsuarioRegistra'  => $faker->numberBetween(1,100),
                    'fechaHoraRegistro'  => $faker->numberBetween(1,100),
                    'idUsuarioActualiza'  =>$faker->numberBetween(1,100),





                ]);
                User::create([
                   // 'id' => $docente->id,  //commented by luis for testing
                    'docente_id'=>$docente->id,
                    'name' => $faker->firstName($gender = null|'male'|'female'),
                    'rol' => 'docente',
                    'apellidoP' =>  $faker->lastName,
                    'apellidoM' => $faker->lastName,
                    'fechanac' => $faker->date(),
                    'nacionalidad'=> $faker->country,
                    'edoNacimiento'=> $faker->state,
                    'genero' => $faker->randomElement(['Hombre','Mujer']),
                    'rfc'=> $faker->swiftBicNumber,
                    'curp'=> $faker->swiftBicNumber,
                    'tipoIdOficial'=>$faker->randomElement(['ife','licenciaManejo','pasaporte','cartilla','cedula','docMigrat','certMatriConsul']),
                    'noIdOficial' => $faker->swiftBicNumber,
                    'direccion' => $faker->streetAddress,
                    'colonia'=> $faker->citySuffix,
                    'ciudad' => $faker->city,
                    'estado' => $faker->state,
                    'cp' => $faker->postcode,
                    'telefono' => $faker->unique()->phoneNumber,
                    'telMovil' => $faker->unique()->phoneNumber,
                    'edoCivil' => $faker->randomElement(['casado','soltero','viudo','divorciado']),
                    'numHijos'=> $faker->numberBetween(0,10),
                    'email' => $faker->email,
                    'password' => bcrypt('secret'),
                ]);
            }

    }
}