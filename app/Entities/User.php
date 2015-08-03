<?php namespace PosgradoService\Entities;

use Illuminate\Support\Facades\DB;
use PosgradoService\Entities\Entity;
use Illuminate\Auth\Authenticatable;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Entity implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

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
     * Regresa grupos y materias que imparte el profesor
     * @param $idDocente
     * @return Grupo nombre, Asignatura nombre, Asignatura id, Grupo id
     */
    public static function getAsignaturasDeDocente($idDocente)
    {

        $gruposMateriasDeProfesor = DB::table('users')
            ->join('docentes', 'users.docente_id', '=', 'docentes.id')
            ->join('docente_grupo_asignatura', 'docente_grupo_asignatura.docente_id', '=', 'docentes.id')
            ->join('grupos', 'grupos.id','=','docente_grupo_asignatura.grupo_id')
            ->join('asignaturas','asignaturas.id','=','docente_grupo_asignatura.asignatura_id')
            ->select('grupos.salon', 'asignaturas.nombre','docente_grupo_asignatura.asignatura_id','docente_grupo_asignatura.grupo_id')
            ->where('docentes.id','=',$idDocente)
            ->get();

        return $gruposMateriasDeProfesor;
    }


    /**
     * Regresa Horario de una materia en un grupo
     * @param $grupoId
     * @param $idAsignatura
     * @return DiaHora dia ,DiaHora horaInicio, DiaHora horaFin
     */
    public static function getHorario($idGrupo,$idAsignatura)
    {

        $horario = DB::table('horaDias')
            ->select('dia','horaInicio','horaFin')
            ->where('asignatura_grupo_grupo','=',$idGrupo)
            ->where('asignatura_grupo_asignatura','=',$idAsignatura)
            ->get();

        return $horario;
    }

    public static function getAlumnosByMateriaAsignatura($idGrupo,$idAsignatura)
    {


        $alumnos = DB::table('users')
            ->join('alumnos', 'users.alumno_id', '=', 'alumnos.id')
            ->join('alumno_grupo_asignatura','alumno_grupo_asignatura.alumno_id','=','alumnos.id')
            ->join('grupos','alumno_grupo_asignatura.grupo_id','=','grupos.id')
            ->select('alumnos.id','users.name','users.apellidoP','users.apellidoM','users.email','grupos.nombre','alumno_grupo_asignatura.calificacion')
            ->where('alumno_grupo_asignatura.grupo_id' ,'=',$idGrupo)
            ->where('alumno_grupo_asignatura.asignatura_id','=',$idAsignatura)
            ->get();

        return $alumnos;

    }

    /**
     * Regresa grupos y materias que toma el alumno
     * @param $idAlumno
     * @return Grupo nombre, Asignatura nombre, calificacione
     */
    public static function getAsignaturasDeAlumno($idAlumno){

        $datosAlumnoGrupoAsignatura = DB::table('users')
            ->join('alumnos', 'users.docente_id', '=', 'alumnos.id')
            ->join('alumno_grupo_asignatura', 'alumno_grupo_asignatura.alumno_id', '=', 'alumnos.id')
            ->join('grupos', 'grupos.id','=','alumno_grupo_asignatura.grupo_id')
            ->join('asignaturas','asignaturas.id','=','alumno_grupo_asignatura.asignatura_id')
            ->select('grupos.salon', 'asignaturas.nombre','alumno_grupo_asignatura.calificacion')
            ->where('alumnos.id','=',$idAlumno)
            ->get();

        return $datosAlumnoGrupoAsignatura;
    }



}
