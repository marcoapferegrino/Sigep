<?php namespace PosgradoService\Entities;



class Programa extends Entity {

    protected $fillable = array('escuela', 'nombre');
    /**
     * Get the Periodo that owns the Programa.
     * @return Periodo
     */

    public function periodo()
    {
        return $this->belongsTo(Periodo::getClass());
    }


}
