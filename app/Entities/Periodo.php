<?php namespace PosgradoService\Entities;



class Periodo extends Entity {

    protected $fillable = array('nombre', 'inicioPeriodo', 'finPeriodo','inicioCalificaciones','finCalificaciones');
    /**
     * Get the programa record associated with the Periodo.
     * @return Programa
     */
    public function programas()
    {
        return $this->hasMany(Programa::getClass());
    }

    /**
     * @return Grupo
     */
    public function grupos()
    {
        return $this->hasMany(Grupo::getClass());
    }
}
