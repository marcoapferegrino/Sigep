x<?php namespace PosgradoService\Entities;

use Illuminate\Support\Facades\DB;


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
     * @return Tutor
     */
    public function tutor(){

        return $this->hasMany(Tutor::getClass());
    }

    /**
     * @return AsignaturaGrupo
     */
    public function asignaturasGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }


    /**
     * Docente setea la calificacion a una alumno
     * @param $idAlumno
     * @param $idAsignatura
     * @param $idGrupo
     * @param $calificacion
     */
    public function setCalificacion($inscripcionId,$calificacion)
    {
        DB::table('inscripciones')
            ->where('id', $inscripcionId)
            ->update(['calificacion' => $calificacion]);
    }


}
