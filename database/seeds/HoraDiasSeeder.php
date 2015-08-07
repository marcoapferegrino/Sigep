<?php

use Illuminate\Database\Seeder;
use \PosgradoService\Entities\Horario;
use \PosgradoService\Entities\AsignaturaGrupo;
use \PosgradoService\Entities\Grupo;
use \PosgradoService\Entities\Inscripcion;

class HoraDiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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

        Horario::create([
            'dias'=>$horarios[0],
            'horario'=>'',
            'nombre'=>$nombres[0],

        ]);
        Horario::create([
            'dias'=>$horarios[1],
            'horario'=>'',
            'nombre'=>$nombres[1],

        ]);

        Horario::create([
            'dias'=>$horarios[2],
            'horario'=>'',
            'nombre'=>$nombres[2],

        ]);
        Horario::create([
            'dias'=>$horarios[3],
            'horario'=>'',
            'nombre'=>$nombres[3],

        ]);



            AsignaturaGrupo::create([
                'acta'=> 1,
                'docente_id'=> 1,
                'grupo_id'=>$grupos[1]->id,
                'asignatura_id'=>1,
                'horaDias_id'=>1
            ]);



            /*---------------------------------------------*/
            AsignaturaGrupo::create([
                'acta'=> 1,
                'docente_id'=> 1,
                'grupo_id'=>$grupos[2]->id,
                'asignatura_id'=>1,
                'horaDias_id'=>2
            ]);



            /*---------------------------------------------*/
           AsignaturaGrupo::create([
                'acta'=> 1,
                'docente_id'=> 2,
                'grupo_id'=>$grupos[1]->id,
                'asignatura_id'=>2,
                'horaDias_id'=>2
            ]);




            /*---------------------------------------------*/
             AsignaturaGrupo::create([
                'acta'=> 1,
                'docente_id'=> 2,
                'grupo_id'=>$grupos[2]->id,
                'asignatura_id'=>2,
                'horaDias_id'=>3
            ]);




             /*---------------------------------------------*/
             AsignaturaGrupo::create([
                'acta'=> 1,
                'docente_id'=> 1,
                'grupo_id'=>$grupos[3]->id,
                'asignatura_id'=>3,
                'horaDias_id'=>3
            ]);


            for($i=1;$i<=5;$i++)
            {
                Inscripcion::create([

                    'asignatura_grupo_id'=> 1,
                    'alumno_id' => $i,
                    'docente_id'=> 1,
                    'grupo_id'=>2,
                    'asignatura_id'=>1,
                ]);
                Inscripcion::create([

                    'asignatura_grupo_id'=> 2,
                    'alumno_id' => $i+5,
                    'docente_id'=> 1,
                    'grupo_id'=>3,
                    'asignatura_id'=>1,
                ]);
                Inscripcion::create([

                    'asignatura_grupo_id'=> 5,
                    'alumno_id' => $i+5,
                    'docente_id'=> 1,
                    'grupo_id'=>4,
                    'asignatura_id'=>3,
                ]);

                Inscripcion::create([

                    'asignatura_grupo_id'=> 3,
                    'alumno_id' => $i,
                    'docente_id'=> 2,
                    'grupo_id'=>2,
                    'asignatura_id'=>2,
                ]);

                Inscripcion::create([

                    'asignatura_grupo_id'=> 4,
                    'alumno_id' => $i+5,
                    'docente_id'=> 2,
                    'grupo_id'=>3,
                    'asignatura_id'=>2,
                ]);


            }





        }




}
