<?php

namespace Sigep\Entities;



class Tutor extends Entity
{
    public function docente()
    {
        return $this->belongsTo(Docente::getClass());
    }

    public function alumnos(){
        return $this->hasMany(Alumno::getClass());
    }
}
