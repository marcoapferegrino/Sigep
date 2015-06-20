<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;

class Grupo extends Entity {

    protected $table = 'grupos';


    /**
     * Reegresa los profesores que imparten en este grupo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function docentes()
    {
        return $this->belongsToMany(Docente::getClass());
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
     * Regresa las asignaturas que tiene este grupo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::getClass());
    }
}
