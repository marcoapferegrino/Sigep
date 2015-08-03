<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;


class Asignatura extends Entity {

    protected $fillable = array('nombre','creditos','horasPract','horasTeoricas','fechaElabP');
    /**
     * Regresa los grupos que tienen esta asignatura
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */


}
