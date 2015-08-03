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
            'inicio' => Carbon::now(),
            'fin' => Carbon::now(),


        ]);

        Programa::create([
            'escuela' => 'Escuela superior de cómputo',
            'nombre' => 'Programa piloto',
            'periodo_id' => 1,

        ]);



    }
}