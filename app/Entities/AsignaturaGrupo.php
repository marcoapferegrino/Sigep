<?php namespace PosgradoService\Entities;




class AsignaturaGrupo extends Entity {



    protected $fillable = array('docente_id','grupo_id','acta','asignatura_id','horaDias_id');

    protected $table = 'asignatura_grupo';

    /**
     * @return horarios
     */
    public function horarios()
    {
        return $this->hasMany(Horario::getClass());
    }

    /**
     * @return Docente
     */
    public function docente()
    {
        return $this->belongsTo(Docente::getClass());
    }

    /**
     * @return Asignatura
     */
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::getClass());
    }

    /**
     * @return Grupo
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::getClass());
    }

    /**
     * @return Inscripcion
     */
    public function inscripciones()
    {
        return $this->belongsTo(Inscripcion::getClass());
    }



}
