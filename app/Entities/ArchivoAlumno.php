<?php namespace PosgradoService\Entities;



class ArchivoAlumno extends Entity {

    public function alumno(){
        return $this->belongsTo(Alumno::getClass());
    }

}
