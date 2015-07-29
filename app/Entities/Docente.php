<?php namespace PosgradoService\Entities;

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
     *  Regresa los grupos a los que pertenece el alumno
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grupos()
    {
        return $this->belongsToMany(Grupo::getClass());
    }

    /**
     *  Regresa las asignaturas que imparte el docente
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::getClass());
    }


}
