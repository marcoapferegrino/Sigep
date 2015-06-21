<?php namespace PosgradoService\Entities;

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

    public function getDocente()
    {
        return $this->hasOne(Docente::getClass());

    }

    public function getAlumno()
    {
        return $this->hasOne(Alumno::getClass());
    }

    public static function getUsuarioDocenteById($idDocente){

        $docente = \DB::table('users')
            ->join('docentes', 'users.docente_id', '=', 'docentes.id')->where('users.docente_id', '=', $idDocente)
            ->select('users.*', 'docentes.id', 'docentes.nacionalidad', 'docentes.edonacimiento', 'docentes.status','docentes.sip')
            ->get();

        return $docente;


    }



}
