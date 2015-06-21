<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 18:58
 */



class HorarioSeeder extends \Illuminate\Database\Seeder {


    public function run()
    {
        \PosgradoService\Entities\HoraDia::create([
            'dia'=>'lun',
            'horaInicio' => \Carbon\Carbon::createFromTime(),
            'horaFin' => \Carbon\Carbon::createFromTime(),
            'asignatura_grupo_id'=>1

        ]);
        \PosgradoService\Entities\HoraDia::create([
            'dia'=>'mar',
            'horaInicio' => \Carbon\Carbon::createFromTime(),
            'horaFin' => \Carbon\Carbon::createFromTime(),
            'asignatura_grupo_id'=>1

        ]);
        \PosgradoService\Entities\HoraDia::create([
            'dia'=>'mier',
            'horaInicio' => \Carbon\Carbon::createFromTime(),
            'horaFin' => \Carbon\Carbon::createFromTime(),
            'asignatura_grupo_id'=>1

        ]);

        \PosgradoService\Entities\HoraDia::create([
            'dia'=>'juev',
            'horaInicio' => \Carbon\Carbon::createFromTime(),
            'horaFin' => \Carbon\Carbon::createFromTime(),
            'asignatura_grupo_id'=>2

        ]);
        \PosgradoService\Entities\HoraDia::create([
            'dia'=>'viern',
            'horaInicio' => \Carbon\Carbon::createFromTime(),
            'horaFin' => \Carbon\Carbon::createFromTime(),
            'asignatura_grupo_id'=>2

        ]);
    }
}