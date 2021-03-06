<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->truncateTables(array(
            'users',
            'password_resets',
            'alumnos',
            'docentes',
            'grupos',
            'asignaturas',
            'periodos',
            'checadas',
            'inscripciones',
            'horaDias',
            'tutores',
            'asignatura_grupo'
        ));
        $this->call('AlumnosSeeder');
        $this->call('DocentesSeeder');
        $this->call('ProgramaPeriodoSeeder');
        $this->call('AsignaturaSeeder');
        $this->call('GrupoSeeder');
        $this->call('ChecadasSeeder');//added by luis
        $this->call('AdminsSeeder');
        $this->call('HoraDiasSeeder');
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
