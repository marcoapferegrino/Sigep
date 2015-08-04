<?php namespace PosgradoService\Entities;



class Grupo extends Entity {

    protected $table = 'grupos';


    /**
     * @return Periodo
     */
    public function periodo()
    {
        return $this->belongsTo(Periodo::getClass());
    }

    /**
     * @return AsignaturaGrupo
     */
    public function asignaturasGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }



}
