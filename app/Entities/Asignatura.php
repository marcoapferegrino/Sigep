<?php namespace Sigep\Entities;




class Asignatura extends Entity {

    protected $fillable = array('nombre','creditos','horas','fechaVigencia','claveAsignatura','curso','tipo','escuelaMovilidad');
    /**
     * Regresa los grupos que tienen esta asignatura
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */


    /**
     * @return AsignaturaGrupo
     */
    public function asignaturasGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }


}
