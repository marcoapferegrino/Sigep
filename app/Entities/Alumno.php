<?php namespace PosgradoService\Entities;


use PosgradoService\Entities\Entity;

class Alumno extends Entity {

    protected $table = 'alumnos';


    /**
     * Regresa el usuario principal
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::getClass());
    }


    /**
     * @return Tutor
     */
    public function tutor()
    {
        return $this->belongsTo(Tutor::getClass());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function archivoAlumnos()
    {
        return $this->hasMany(ArchivoAlumno::getClass());
    }

    /**
     * @return Checadas
     */
    public function checadas()
    {
        return $this->hasMany(Checadas::getClass());
    }


    /**
     * @return Inscripcion
     */
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::getClass());
    }







}
