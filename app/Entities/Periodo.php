<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;

class Periodo extends Entity {

    protected $fillable = array('nombre', 'inicio', 'fin','programa_id');
    /**
     * Get the programa record associated with the Periodo.
     */
    public function programa()
    {
        return $this->hasOne(Programa::getClass());
    }
}
