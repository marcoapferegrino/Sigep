<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;
class Checadas extends Entity {

    public function alumno(){

        return $this->belongsTo(Alumno::getClass());

    }

}
