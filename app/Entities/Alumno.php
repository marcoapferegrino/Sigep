<?php namespace PosgradoService\Entities;


use PosgradoService\Entities\Entity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Alumno extends Entity {

    protected $table = 'alumnos';
    protected $fillable = [  'status','dependEconomic','viveCon','gradoDeEstudios','situacionEstudios' ,'boleta','carrera',
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

	
    public static function getCalificaciones() // obtiene las calificaciones
    {
        $boleta =DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->join('horaDias','asignatura_grupo.horaDias_id','=','horaDias.id')
            ->select('asignaturas.nombre as nombre','grupos.nombre as grupoNombre','inscripciones.calificacion')
            //->where('periodos.inicioPeriodo','<=',$hoy)
            //->where('periodos.finPeriodo','>=',$hoy)
            ->where('inscripciones.alumno_id','=',auth()->user()->alumno_id)
            ->get();;


        return $boleta;
    }



    public static function getHorarioDeAlumno()
    {
        $hoy=Carbon::now()->toDateString();

        //$horario = DB::table('asignatura_grupo')
        $horario = DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->join('horaDias','asignatura_grupo.horaDias_id','=','horaDias.id')
            ->select('asignaturas.nombre','grupos.salon','horaDias.dias')
            //->where('periodos.inicioPeriodo','<=',$hoy)
            //->where('periodos.finPeriodo','>=',$hoy)
            ->where('inscripciones.alumno_id','=',auth()->user()->alumno_id)
            ->get();
       // dd($horario);

        return $horario;
    }







}
