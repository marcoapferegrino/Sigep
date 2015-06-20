<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;


class Asignatura extends Entity {


    /**
     * Regresa los grupos que tienen esta asignatura
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grupos()
    {
        return $this->belongsToMany(Grupo::getClass());
    }

}
