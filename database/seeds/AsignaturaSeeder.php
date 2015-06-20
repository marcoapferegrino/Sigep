<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 17:47
 */


use \PosgradoService\Entities\Asignatura;

class AsignaturaSeeder extends \Illuminate\Database\Seeder {


    public  function run()
    {
        $asignaturas = array(
            'Arquitectura de mobiles',
            'Metodos matematicos',
            'Mobiles tecnologias'
        );

        for($i=0 ; $i< count($asignaturas) ; $i++)
        {
            Asignatura::create([
                'nombre' => $asignaturas[$i],
                'creditos' => $i*10,
                'horasPract' => $i,
                'horasTeoricas' => $i*2,
                'tipo' => 'obligatoria',
                'fechaElabP'=>\Carbon\Carbon::now(),
                'periodo_id'=>1

        ]);
        }



    }


}