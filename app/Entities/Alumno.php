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
        $hoy=Carbon::now()->toDateString();
        $boleta =DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->join('horaDias','asignatura_grupo.horaDias_id','=','horaDias.id')
            ->select('asignaturas.nombre as nombre','grupos.nombre as grupoNombre','inscripciones.calificacion')
            ->where('periodos.inicioPeriodo','<=',$hoy)
            ->where('periodos.finPeriodo','>=',$hoy)
            ->where('inscripciones.alumno_id','=',auth()->user()->alumno_id)
            ->get();

        //dd($boleta);
        return $boleta;
    }

    public static function getKardex($id) // obtiene el historial
    {
        $kardex =DB::table('users')

            ->join('alumnos','alumnos.id','=','users.alumno_id')
            ->join('inscripciones','inscripciones.alumno_id','=','alumnos.id')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->select('alumnos.boleta','asignaturas.nombre as nombre','grupos.nombre as grupoNombre','inscripciones.calificacion','users.name as alumnoNombre','users.apellidoP','users.apellidoM','periodos.nombre as nombrePeriodo','periodos.finPeriodo','grupos.semestre')
             ->where('inscripciones.alumno_id','=',$id)
            ->orderBy('semestre')
            ->get();

        return $kardex;
    }

    public static function getAlumnosInscritosPorPeriodo($id) // obtiene el historial
    {
        $alumnos =User::getAlumnosSentence();
        $alumnos = $alumnos
            ->select('users.alumno_id as id','asignatura_grupo.id as asignatura_grupo_id','alumnos.boleta','asignaturas.nombre as nombre','grupos.nombre as grupoNombre','inscripciones.calificacion','inscripciones.id as inscripcion_id','users.name as name','users.apellidoP','users.apellidoM','periodos.nombre as nombrePeriodo','periodos.finPeriodo','grupos.semestre')
            ->where('periodos.id','=',$id)
            ->paginate(10);
        //        dd($alumnos);
        return $alumnos;
    }



    public static function getHorarioDeAlumno()
    {
        $hoy=Carbon::now()->toDateString();

        $horario = DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->join('horaDias','asignatura_grupo.horaDias_id','=','horaDias.id')
            ->select('asignaturas.nombre','grupos.salon','horaDias.dias')
            ->where('periodos.inicioPeriodo','<=',$hoy)
            ->where('periodos.finPeriodo','>=',$hoy)
            ->where('inscripciones.alumno_id','=',auth()->user()->alumno_id)
            ->get();
       // dd($horario);

        return $horario;
    }



    public static function getPromedio($materias)
    {

        $numMaterias =0;
        $aux = 0.0;

        foreach ($materias as $materia) {

        $aux += $materia->calificacion;
            if($materia->calificacion!='S/C'){
                $numMaterias ++;

            }
        }

       // $prom= ($aux / count($materias));
        if($numMaterias==0) return 'No disponible';
        $prom= ($aux / $numMaterias);

        return $prom;

    }






}
