<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 17:21
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Sigep\Entities\Periodo;
use Sigep\Entities\Programa;

class ProgramaPeriodoSeeder extends Seeder {

    public function run()
    {

        Periodo::create([
            'nombre' => 'Invierno',
            'inicioPeriodo' => Carbon::now(),
            'finPeriodo' => Carbon::create(2016,11,10,null,null,null,null),
            'inicioCalificaciones' => Carbon::now(),
            'finCalificaciones' => Carbon::create(2016,11,10,null,null,null,null),

        ]);
        Periodo::create([
            'nombre' => 'Verano',
            'inicioPeriodo' => Carbon::create(2014,11,10,null,null,null,null),
            'finPeriodo' => Carbon::create(2015,05,10,null,null,null,null),
            'inicioCalificaciones' => Carbon::now(),
            'finCalificaciones' => Carbon::create(2015,05,10,null,null,null,null),

        ]);



    }
}