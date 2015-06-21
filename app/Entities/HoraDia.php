<?php namespace PosgradoService\Entities;

use PosgradoService\Entities\Entity;

class HoraDia extends Entity {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $table = 'horaDias';


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo AsignaturaGrupo
     */
    public function asignaturaGrupo()
    {
        return $this->belongsTo(AsignaturaGrupo::getClass());
    }

}
