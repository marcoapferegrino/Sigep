<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;

/**
 * Asignatura en un grupo
 * Class AsignaturaGrupo
 * @package PosgradoService\Entities AsignaturaGrupo
 */
class AsignaturaGrupo extends Entity {


    protected $table = 'asignatura_grupo';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany HoraDia
     */
    public function horasDias()
    {
        return $this->hasMany(HoraDia::getClass());
    }

}
