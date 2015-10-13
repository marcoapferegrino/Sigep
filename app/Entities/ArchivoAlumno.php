<?php namespace Sigep\Entities;



class ArchivoAlumno extends Entity {

    public function alumno(){
        return $this->belongsTo(Alumno::getClass());
    }

}
