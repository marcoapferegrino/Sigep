<?php namespace PosgradoService\Entities;

use Illuminate\Support\Facades\DB;
use PosgradoService\Entities\Entity;

class Docente extends Entity {

    protected $table = 'docentes';

    /**
     * Regresa el usuario principal
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::getClass());
    }


    /**
     * Docente setea la calificacion a una alumno
     * @param $idAlumno
     * @param $idAsignatura
     * @param $idGrupo
     * @param $calificacion
     */
    public function setCalificacion($idAlumno,$idAsignatura,$idGrupo,$calificacion)
    {
        DB::table('alumno_grupo_asignatura')
            ->where('alumno_id', $idAlumno)
            ->where('grupo_id',$idGrupo)
            ->where('asignatura_id',$idAsignatura)
            ->update(['calificacion'=>$calificacion]);
    }


}
