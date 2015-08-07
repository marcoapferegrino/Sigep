<?php

namespace PosgradoService\Entities;

class Horario extends Entity
{
    protected $table ='horaDias';


    /**
     * @return AsignaturaGrupo
     */
    public function asignaturaGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }


}
