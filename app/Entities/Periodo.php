<?php namespace Sigep\Entities;



use Illuminate\Support\Facades\DB;

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
    /* for testing with sql
     * SELECT distinct alumnos.id FROM alumnos
     * INNER JOIN inscripciones ON inscripciones.alumno_id=alumnos.id
     * INNER JOIN asignatura_grupo ON asignatura_grupo.id=inscripciones.asignatura_grupo_id
     * INNER JOIN grupos ON grupos.id=asignatura_grupo.grupo_id
     * INNER JOIN periodos ON grupos.periodo_id=periodos.id
     *  where periodos.id=2
     *  where inscripciones.calificacion >7;
     * */
    private static function getInscripcionesPorPeriodoBase()
    {
        $inscripciones = DB::table('alumnos')
            ->join('inscripciones','inscripciones.alumno_id','=','alumnos.id')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id');


        return $inscripciones;
    }




    public static function getInscripcionesPorAlumno($idPeriodo,$idAlumno,$idAsignatura)
    {
        $query = self::getInscripcionesPorPeriodoBase();

        if ($idPeriodo!="") {
            $query = self::scopeByPeriodo($query,$idPeriodo);
        }

        if ($idAsignatura!="") {
            $query = self::scopeByAsignatura($query,$idAsignatura);
        }

        $query=$query->where('alumnos.id',$idAlumno)
            ->select('alumnos.id as alumnoId','inscripciones.calificacion as calificacion',
            'asignatura_grupo.asignatura_id as idAsignatura')->get();
        return $query;
    }

    public static function getInscripcionesPorPeriodo($idPeriodo,$idAsignatura)
    {

        $query = self::getInscripcionesPorPeriodoBase();
        if ($idPeriodo!="") {
            $query = self::scopeByPeriodo($query,$idPeriodo);
        }

        if ($idAsignatura!="") {
            $query = self::scopeByAsignatura($query,$idAsignatura);
        }

        $query=$query->select('alumnos.id as alumnoId','inscripciones.calificacion as calificacion',
                'asignatura_grupo.asignatura_id as idAsignatura ')
            ->get();
        return $query;
    }

    public static function getAlumnosPorPeriodo($idPeriodo,$idAsignatura)
    {
        $query = self::getInscripcionesPorPeriodoBase();

        if ($idPeriodo!="") {
            $query = self::scopeByPeriodo($query,$idPeriodo);
        }

        if ($idAsignatura!="") {
            $query = self::scopeByAsignatura($query,$idAsignatura);
        }

        $query = $query->select('alumnos.id')->distinct()->get();
        return $query;
    }

    public static function getAlumnosReprobadosPorPeriodo($idPeriodo,$idAsignatura)
     {
         $alumnos = self::getAlumnosPorPeriodo($idPeriodo,$idAsignatura);
         $reprobados = 0;
         foreach ($alumnos as $alumno) {
             $inscripciones = self::getInscripcionesPorAlumno($idPeriodo,$alumno->id,$idAsignatura);
             foreach ($inscripciones as $inscripcion) {
                 if ($inscripcion->calificacion <=7) {
                     $reprobados++;
                     break;
                 }

             }
         }
//         $query= self::getInscripcionesPorPeriodoBase($idPeriodo)->where('inscripciones.calificacion','>',7)->select('alumnos.id')->distinct()->get();

        return $reprobados;

     }
    private static function scopeByAsignatura($query,$idAsignatura)
    {
        $query = $query->where('asignaturas.id',$idAsignatura);
        return $query;
    }
    private static function scopeByPeriodo($query,$idPeriodo)
    {
        $query = $query->where('periodos.id',$idPeriodo);
        return $query;
    }











}
