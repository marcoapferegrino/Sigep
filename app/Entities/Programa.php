<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;

class Programa extends Entity {

    protected $fillable = array('escuela', 'nombre');
    /**
     * Get the Periodo that owns the Programa.
     */
    public function periodo()
    {
        return $this->belongsTo(Periodo::getClass());
    }

}
