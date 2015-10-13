<?php namespace Sigep\Entities;


class Checadas extends Entity {

    public function alumno(){

        return $this->belongsTo(Alumno::getClass());

    }

}
