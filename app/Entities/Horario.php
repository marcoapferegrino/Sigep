<?php

namespace PosgradoService\Entities;

class Horario extends Entity
{

    protected $fillable = ['dias','horario','nombre'];
    protected $table ='horaDias';


    /**
     * @return AsignaturaGrupo
     */
    public function asignaturaGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }


}
