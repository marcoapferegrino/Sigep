<?php

namespace Sigep\Entities;



class Inscripcion extends Entity


{

    protected $fillable = array('calificacion');
    protected $table='inscripciones';


    /**
     * @return AsignaturaGrupo
     */
    public function asignaturaGrupo()
    {
        return $this->belongsTo(AsignaturaGrupo::getClass());

    }

    /**
     * @return Alumno
     */
    public function alumno()
    {
        return $this->belongsTo(Alumno::getClass());
    }
}
