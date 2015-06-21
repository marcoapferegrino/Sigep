<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;

class ArchivoAlumno extends Entity {

    public function alumno(){
        return $this->belongsTo(Alumno::getClass());
    }

}
