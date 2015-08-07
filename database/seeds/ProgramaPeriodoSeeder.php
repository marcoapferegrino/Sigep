<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 17:21
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\Programa;

class ProgramaPeriodoSeeder extends Seeder {

    public function run()
    {

        Periodo::create([
            'nombre' => 'Verano',
            'inicioPeriodo' => Carbon::now(),
            'finPeriodo' => Carbon::now(),
            'inicioCalificaciones' => Carbon::now(),
            'finCalificaciones' => Carbon::now(),

        ]);
        Periodo::create([
            'nombre' => 'Invierno',
            'inicioPeriodo' => Carbon::now(),
            'finPeriodo' => Carbon::now(),
            'inicioCalificaciones' => Carbon::now(),
            'finCalificaciones' => Carbon::now(),

        ]);

        Programa::create([
            'escuela' => 'Escuela superior de cómputo',
            'nombre' => 'Programa piloto',
            'periodo_id' => 1,

        ]);
        Programa::create([
            'escuela' => 'Escuela superior de cómputo cuántico',
            'nombre' => 'Programa piloto',
            'periodo_id' => 2,

        ]);



    }
}