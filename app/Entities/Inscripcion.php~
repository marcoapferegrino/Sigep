<?php

namespace PosgradoService\Entities;



class Inscripcion extends Entity
{
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
