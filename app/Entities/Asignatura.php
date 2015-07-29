<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;


class Asignatura extends Entity {

    protected $fillable = array('nombre','creditos','horasPract','horasTeoricas','fechaElabP','periodo_id');
    /**
     * Regresa los grupos que tienen esta asignatura
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grupos()
    {
        return $this->belongsToMany(Grupo::getClass());
    }
    /**
     * Reegresa los alumnos que van en este grupo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::getClass());
    }

    /**
     * Reegresa los docentes que imparten en esta asignatura
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function docentes()
    {
        return $this->belongsToMany(Docente::getClass());
    }

}
