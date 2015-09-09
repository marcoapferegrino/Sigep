<?php namespace PosgradoService\Entities;


use PosgradoService\Entities\Entity;

use Illuminate\Support\Facades\DB;

class Alumno extends Entity {

    protected $table = 'alumnos';
    protected $fillable = [  'status','dependEconomic','viveCon','gradoDeEstudios','situacionEstudios' ,
        'califEstudios','localidadEstudios','aniosEstudios' ,'escuela' ,'especialidadCarrera',
        'observacionEstudios','empresaUltimoEmpleo' ,'puestoCategUltimoEmpleo','jefeInmediatoUltimoEmpleo','telefonoUltimoEmpleo',
        'fechaIngresoUltimoEmpleo','fechaTerminoUltimoEmpleo','actividadesUltimoEmpleo'  ,'motivosSeparacionUltimoEmpleo',
        'actividadesQueConoce','conocimientoSoftware' ,'obsconocimientos','ref1Nombre','ref1Afinidad' ,'ref1Domicilio','ref1Telefono',
        'ref1Tiempoconocerlo','ref2Nombre','ref2Afinidad','ref2Domicilio','ref2Telefono' ,'ref2Tiempoconocerlo','ref3Nombre'
        ,'ref3Afinidad','ref3Domicilio', 'ref3Telefono','ref3Tiempoconocerlo','idUsuarioQueActualiza','tutor_id'];

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

	
    public static function getCalificaciones($idAlumno) // obtiene las calificaciones
    {
        $idAlumno=6;

        $boleta = DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.asignatura_id','=','inscripciones.id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->select('asignaturas.nombre','grupos.nombre as grupoNombre','inscripciones.calificacion')
            ->where('inscripciones.alumno_id','=',$idAlumno)
            ->get();

        //$boleta = array(2,3,4);
        return $boleta;
    }

    public static function getHorarioAlumno($idAlumno)
    {
        $horario = DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.asignatura_id','=','inscripciones.id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('horaDias','asignatura_grupo.horaDias_id','=','horaDias.id')
            ->select('asignaturas.nombre','grupos.nombre as grupoNombre','asignatura_grupo.')
            ->where('asignatura_grupo.docente_id','=',$idAlumno)
            ->get();
    }








}
