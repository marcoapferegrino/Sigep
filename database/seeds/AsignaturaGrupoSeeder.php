<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 19:03
 */




class AsignaturaGrupoSeeder extends \Illuminate\Database\Seeder{
    public function run()
    {
        $arquitectura = \PosgradoService\Entities\Asignatura::find(1);
        $metodos = \PosgradoService\Entities\Asignatura::find(2);
        $mobiles = \PosgradoService\Entities\Asignatura::find(3);



        $grupo1 = \PosgradoService\Entities\Grupo::find(1);
        $grupo2 = \PosgradoService\Entities\Grupo::find(2);




        $grupo1->asignaturas()->save($arquitectura);
        $grupo1->asignaturas()->save($metodos);
        $grupo1->asignaturas()->save($mobiles);
        $grupo2->asignaturas()->save($mobiles);

        return "Todo good";
    }
}