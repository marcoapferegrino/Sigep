<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateTables(array(

            'users',
            'password_resets',
            'alumnos',
            'docentes',
            'grupos',
            'asignatura_grupo',
            'asignaturas',
            'periodos',
            'checadas',//added by luis
            'programas'

        ));



        //$this->call('DocentesSeeder');
        $this->call('AdminsSeeder');
        $this->call('AlumnosSeeder');
        $this->call('DocentesSeeder');
        $this->call('ProgramaPeriodoSeeder');
        $this->call('AsignaturaSeeder');
        $this->call('GrupoSeeder');
        $this->call('AsignaturaGrupoSeeder');
        $this->call('HorarioSeeder');
        $this->call('ChecadasSeeder');//added by luis


      //  Model::reguard();
    }

    private function truncateTables(array $tables)
    {
        $this->checkForeignKeys(false);

        foreach($tables as $table)
        {
            DB::table($table)->truncate();
        }
        $this->checkForeignKeys(true);

    }

    private function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement('SET FOREIGN_KEY_CHECKS ='.$check);
    }
}
