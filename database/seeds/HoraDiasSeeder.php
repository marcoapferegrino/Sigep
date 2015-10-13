<?php

use Illuminate\Database\Seeder;
use \Sigep\Entities\Horario;
use \Sigep\Entities\AsignaturaGrupo;
use \Sigep\Entities\Grupo;
use \Sigep\Entities\Inscripcion;
use \Sigep\Entities\Asignatura;
use \Sigep\Entities\Docente;
use \Sigep\Entities\Alumno;
use Faker\Factory as Faker;
use Faker\Provider;

class HoraDiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $horarios = array(
            '{"dias":{"Lunes":"08:30 - 10:00","Martes": " - ","Miercoles":"08:30 - 10:00" ,"Jueves": "08:30 - 10:00","Viernes": " - "}}',
            '{"dias":{"Lunes":" - ","Martes":"10:30 - 12:00" ,"Miercoles":"10:30 - 12:00" ,"Jueves": " - ","Viernes":"10:30 - 12:00" }}',
            '{"dias":{"Lunes":" - ","Martes":"12:00 - 13:30" ,"Miercoles":"13:30 - 15:00" ,"Jueves": " - ","Viernes": "12:00 - 13:30"}}',
            '{"dias":{"Lunes":"12:00 - 13:30","Martes":" - " ,"Miercoles":"12:00 - 13:30" ,"Jueves": "12:00 - 13:30","Viernes": " - "}}'
        );
        $nombres = array(
            'A',
            'B',
            'C',
            'D'
        );

        $grupos = Grupo::all();

        foreach ($nombres as $nombre) {
            Horario::create([
                'dias'=>$faker->randomElement($horarios),
                'horario'=>'',
                'nombre'=>$nombre,

            ]);
        }
        $asignaturas = Asignatura::all();
        $docentes = Docente::all();

        $horaDias = Horario::all();

        foreach ($docentes as $docente) {

        $numGrupos = count($grupos);
        $numAsignaturas = count($asignaturas);
        $numHora = count($horaDias);

            AsignaturaGrupo::create([
                'acta' => 1,
                'docente_id' => $docente->id,
                'grupo_id' => $faker->numberBetween(1,$numGrupos),
                'asignatura_id' => $faker->numberBetween(1,$numAsignaturas),
                'horaDias_id' =>$faker->numberBetween(1,$numHora)
            ]);
            AsignaturaGrupo::create([
                'acta' => 1,
                'docente_id' => $docente->id,
                'grupo_id' => $faker->numberBetween(1,$numGrupos),
                'asignatura_id' => $faker->numberBetween(1,$numAsignaturas),
                'horaDias_id' =>$faker->numberBetween(1,$numHora)
            ]);
            AsignaturaGrupo::create([
                'acta' => 1,
                'docente_id' => $docente->id,
                'grupo_id' => $faker->numberBetween(1,$numGrupos),
                'asignatura_id' => $faker->numberBetween(1,$numAsignaturas),
                'horaDias_id' =>$faker->numberBetween(1,$numHora)
            ]);
        }

        $alumnos = Alumno::all();
        $asignaturaGrupo = AsignaturaGrupo::all();

        foreach ($asignaturaGrupo as $asigGrup) {
            $numAlumnos =  $faker->numberBetween(1,count($alumnos));

            for ($i=0;$i<2;$i++) {
                Inscripcion::create([
                    'asignatura_grupo_id'=>$asigGrup->id ,
                    'calificacion' => $faker->numberBetween(6,10),
                    'alumno_id' => $faker->numberBetween(1,$numAlumnos),
                    'docente_id'=> $asigGrup->docente_id,
                    'grupo_id' => $asigGrup->grupo_id,
                    'asignatura_id' => $asigGrup->asignatura_id
                ]);
            }



            }
        }

}
