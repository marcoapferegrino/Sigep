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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function archivoAlumnos()
    {
        return $this->hasMany(ArchivoAlumno::getClass());
    }

    public function checadas()
    {
        return $this->hasMany(Checadas::getClass());
    }



}
