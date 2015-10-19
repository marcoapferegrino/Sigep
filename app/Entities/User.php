<?php namespace Sigep\Entities;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Authenticatable;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Entity implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //campos que acepta en Mass Assignment
    protected $fillable = ['name','apellidoP','apellidoM','fechanac','nacionalidad',
        'edoNacimiento','genero','rfc','curp','tipoIdOficial','noIdOficial','direccion',
        'colonia','ciudad' ,'estado','cp' ,'telefono','telMovil','edoCivil' ,'numHijos','email','alumno_id','docente_id'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Regresa el docente asociado al usuario
     * @return Docente
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::getClass());

    }
    /**
     * Regresa el alumno asociado al usuario
     * @return Alumno
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::getClass());
    }

    /**
     * Regresa Horario de una materia en un grupo
     * @param $grupoId
     * @param $idAsignatura
     * @return DiaHora horaInicio, DiaHora horaFin
     */
    public static function getHorario()
    {
        $hoy=Carbon::now()->toDateString();
        $horario = DB::table('asignatura_grupo')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->join('horaDias','asignatura_grupo.horaDias_id','=','horaDias.id')
            ->select('asignaturas.nombre','grupos.salon','horaDias.dias')
            ->where('periodos.inicioPeriodo','<=',$hoy)
            ->where('periodos.finPeriodo','>=',$hoy)
            ->where('asignatura_grupo.docente_id','=',auth()->user()->docente_id)
            ->get();


        return $horario;
    }
    public static function asignaturaGrupo()
    {
        $asignaturasGrupos = DB::table('asignatura_grupo')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->select('asignatura_grupo.id','grupos.salon','asignaturas.nombre','asignatura_grupo.acta','periodos.nombre as nombrePeriodo','periodos.finPeriodo');

        return $asignaturasGrupos;
    }
    public static function getAlumnosSentence()
    {
        $alumnos = DB::table('inscripciones')
            ->join('asignatura_grupo','asignatura_grupo.id','=','inscripciones.asignatura_grupo_id')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->join('alumnos','alumnos.id','=','inscripciones.alumno_id')
            ->join('users','users.alumno_id','=','alumnos.id');

        return $alumnos;
    }



    public static function getGruposDocente($docenteId)
    {
        $grupos = DB::table('asignatura_grupo')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->select('grupos.nombre')
            ->where('asignatura_grupo.docente_id','=',$docenteId)
            ->get();

        return $grupos;
    }

    public static function getAsignaturasDocente($docenteId)
    {
        $asignaturas = DB::table('asignatura_grupo')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->select('asignaturas.nombre')
            ->where('asignatura_grupo.docente_id','=',$docenteId)
            ->get();
        return $asignaturas;
    }

    public static function getAsignaturasGruposDocenteActually($docenteId)
    {
        $hoy=Carbon::now()->toDateString();
        //dd($hoy);
        $asignaturaGrupos = User::asignaturaGrupo();
        $asignaturaGrupos = $asignaturaGrupos->where('asignatura_grupo.docente_id','=',$docenteId)->get();

        return $asignaturaGrupos;
    }

    public static function getAsignaturasGruposDocentePeriodo($idDocente,$idAsignatura,$idPeriodo,$idGrupo)
    {
        $asignaturaGrupos = User::asignaturaGrupo();
        $asignaturaGrupos = $asignaturaGrupos->where('asignatura_grupo.docente_id',$idDocente);

        $asignaturaGrupos = User::scopePeriodo($asignaturaGrupos,$idPeriodo);
        $asignaturaGrupos = User::scopeAsignatura($asignaturaGrupos,$idAsignatura);
        $asignaturaGrupos = User::scopeGrupo($asignaturaGrupos,$idGrupo);
        $asignaturaGrupos = $asignaturaGrupos->get();

        return $asignaturaGrupos;
    }

    public static function getAlumnosdeDocentePeriodo($idDocente,$idAsignatura,$idPeriodo,$idGrupo)
    {
        $alumnos = User::getAlumnosSentence();
        $alumnos = $alumnos->select('grupos.id AS grupo_id','users.name','users.id as userId','asignaturas.id AS asignatura_id','users.apellidoP','users.apellidoM','users.email', 'inscripciones.calificacion','inscripciones.id AS inscripcion_id ','asignatura_grupo.id AS asignatura_grupo_id')
            ->where('asignatura_grupo.docente_id',$idDocente);

        $alumnos = User::scopePeriodo($alumnos,$idPeriodo);
        $alumnos = User::scopeAsignatura($alumnos,$idAsignatura);
        $alumnos = User::scopeGrupo($alumnos,$idGrupo);

        $alumnos=$alumnos->orderBy('grupo_id')->get();

        return $alumnos;
    }
    public static function getAlumnosdeDocenteActually($docenteId)
    {

        $alumnos = User::getAlumnosSentence();
        $alumnos = $alumnos->select('grupos.id AS grupo_id','users.name','users.id as userId','asignaturas.id AS asignatura_id','users.apellidoP','users.apellidoM','users.email', 'inscripciones.calificacion','inscripciones.id AS inscripcion_id ','asignatura_grupo.id AS asignatura_grupo_id')
            ->where('inscripciones.docente_id','=',$docenteId)
            ->orderBy('grupo_id')
            ->get();

        return $alumnos;
    }
    public static function getAlumnosInscritosbyPeriodo($idPeriodo,$idAsignatura,$idGrupo)
    {
        $alumnos = User::getAlumnosSentence();
        $alumnos = $alumnos->select('grupos.id AS grupo_id','alumnos.boleta','users.name','users.id as userId','asignaturas.id AS asignatura_id','users.apellidoP','users.apellidoM','users.email', 'inscripciones.calificacion','inscripciones.id AS inscripcion_id ','asignatura_grupo.id AS asignatura_grupo_id');

        $alumnos = User::scopePeriodo($alumnos,$idPeriodo);
        $alumnos = User::scopeAsignatura($alumnos,$idAsignatura);
        $alumnos = User::scopeGrupo($alumnos,$idGrupo);

        $alumnos = $alumnos->get();

        return $alumnos;
    }
    public static function getAsignaturasGruposbyPeriodo($idPeriodo,$idAsignatura,$idGrupo)
    {
        $asignaturaGrupos = User::asignaturaGrupo();

        $asignaturaGrupos = User::scopePeriodo($asignaturaGrupos,$idPeriodo);
        $asignaturaGrupos = User::scopeAsignatura($asignaturaGrupos,$idAsignatura);
        $asignaturaGrupos = User::scopeGrupo($asignaturaGrupos,$idGrupo);

        $asignaturaGrupos=$asignaturaGrupos->get();

        return $asignaturaGrupos;
    }


    public static function getAlumnosInscritos()
    {
        $alumnos = User::getAlumnosSentence();
        $alumnos = $alumnos->select('grupos.id AS grupo_id','alumnos.boleta','users.name','users.alumno_id as id','users.id as userId','asignaturas.id AS asignatura_id','users.apellidoP','users.apellidoM','users.email', 'inscripciones.calificacion','inscripciones.id AS inscripcion_id ','asignatura_grupo.id AS asignatura_grupo_id')
            ->paginate(10);//->get();  //cambiar 

        //dd($alumnos);
        return $alumnos;
    }

    private static function getAlumnosDocente()
    {
        $alumnos = User::getAlumnosSentence();
        $alumnos = $alumnos->select('users.id','users.name','users.apellidoP','users.apellidoM','users.email','users.telefono','asignaturas.nombre as nombreAsignatura','grupos.nombre as nombreGrupo','periodos.finPeriodo');
        return $alumnos;
    }
    /**
     * @param $docenteId
     * @return mixed
     */
    public static function getAlumnos()
    {
        $hoy=Carbon::now()->toDateString();
        $alumnos = User::getAlumnosSentence();
        $alumnos = $alumnos->select('grupos.id AS grupo_id','alumnos.boleta','alumnos.id as alumnoId','users.name','users.id as userId','asignaturas.id AS asignatura_id','users.apellidoP','users.apellidoM','users.email', 'inscripciones.calificacion','inscripciones.id AS inscripcion_id ','asignatura_grupo.id AS asignatura_grupo_id')
            ->orderBy('boleta')
            ->get();

        return $alumnos;
    }
    public static function getAsignaturasGrupos()
    {
        $asignaturaGrupos = User::asignaturaGrupo();
        $asignaturaGrupos = $asignaturaGrupos->get();
        return $asignaturaGrupos;
    }


    public static function getAlumnosdeDocentePagination($docenteId)
    {
            $alumnos = User::getAlumnosDocente();
            $alumnos= $alumnos->where('inscripciones.docente_id','=',$docenteId)->paginate(10);

        return $alumnos;
    }

    public static function getAlumnosdeDocenteBusqueda($docenteId,$name="",$idAsignatura,$idPeriodo,$idGrupo)
    {


            $alumnos = User::getAlumnosDocente();
            $alumnos= $alumnos->where('inscripciones.docente_id','=',$docenteId)->where(DB::raw("CONCAT(name,' ',apellidoP,' ',apellidoM)"),"LIKE","%$name%");

            $alumnos = User::scopePeriodo($alumnos,$idPeriodo);
            $alumnos = User::scopeAsignatura($alumnos,$idAsignatura);
            $alumnos = User::scopeGrupo($alumnos,$idGrupo);

            $alumnos= $alumnos->paginate(10);

            return $alumnos;
    }

    public static function getAlumnosAllPagination()
    {
        $alumnos = DB::table('users')
            ->select('*')
            ->where('rol','=','alumno')
            ->paginate(10);

        return $alumnos;
    }

    public function getNombreCompleto()
    {
        return $this->name." ".$this->apellidoP." ".$this->apellidoM;
    }
    public static function getAlumnosBoletaBusqueda($alumnoId)//en construccion
    {
        $alumnos = DB::table('users')
            ->join('alumnos','alumnos.id','=','users.alumno_id')
            ->where('boleta','=',$alumnoId)
            ->paginate(10);
        //dd($alumnos);
       // $alumnos = Alumno::all()->where('boleta',$alumnoId)->;
        return $alumnos;
    }

    public static function getAsignaturasGruposSin()
    {

        $asignaturasGrupos = DB::table('asignatura_grupo')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('grupos','grupos.id','=','asignatura_grupo.grupo_id')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->select('asignatura_grupo.id','grupos.salon','asignaturas.nombre','asignatura_grupo.acta','periodos.nombre as nombrePeriodo','periodos.finPeriodo','asignatura_grupo.asignatura_id' )
            ->get();
        return $asignaturasGrupos;
    }

    
    /**
     * Docente setea la calificacion a una alumno
     * @param $inscripcionId
     * @param $calificacion
     */
    public function setCalificacion($inscripcionId,$calificacion)
    {
        DB::table('inscripciones')
            ->where('id', $inscripcionId)
            ->update(['calificacion' => $calificacion]);
    }

    /*Scopes para funciones*/
    public function scopeName($query,$name)
    {
        if(trim($name)!="")
        {
            $query->where(DB::raw("CONCAT(name,' ',apellidoP,' ',apellidoM)"),"LIKE","%$name%");
        }

    }

    private static function scopeGrupo($query,$idGrupo)
    {
        if($idGrupo != "")
        {
            $query = $query->where('grupos.id',$idGrupo);
        }
        return $query;
    }
    private static function scopeAsignatura($query,$idAsignatura)
    {
        if($idAsignatura != "")
        {
            $query = $query->where('asignaturas.id',$idAsignatura);
        }
        return $query;
    }
    private static function scopePeriodo($query,$idPeriodo)
    {
        if($idPeriodo != "")
        {
            $query = $query->where('periodos.id',$idPeriodo);
        }
        return $query;
    }
    public function scopeRol($query, $rol)
    {
        $roles = config('roles.roles');

        if($rol != "" && isset($roles[$rol]))
        {
            $query->where('rol',$rol);
        }
    }







}

