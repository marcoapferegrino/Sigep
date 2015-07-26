<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
 * Primero se veririfca que este autenticado, despues se verifica que tenga un rol de acceso a la ruta
 * */

Route::group(['middleware' => 'auth'],function(){

    Route::group(['middleware' => 'role:superAdmin'],function() {

        Route::get('logSuperAdmin',"SuperAdminController@index");
    });

    Route::group(['middleware' => 'role:admin'],function() {
        Route::get('logAdmin',"AdminController@index");
    });

    Route::group(['middleware' => 'role:alumno'],function() {
        Route::get('logAlumno',"AlumnoController@index");
    });

    Route::group(['middleware' => 'role:docente'],function() {
        Route::get('logProfesor',"ProfesorController@index");
    });

});


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('docentes', function(){


    /*Todos los docentes */
    /*$docente = DB::table('users')
        ->join('docentes', 'users.docente_id', '=', 'docentes.id')
        ->select('users.*', 'docentes.id', 'docentes.nacionalidad', 'docentes.edonacimiento', 'docentes.status','docentes.sip')
        ->get();*/


    /*uno en especifico*/

    $docente = \PosgradoService\Entities\User::getUsuarioDocenteById(2);

    dd($docente);


});

Route::get('alumnos', function(){

    /*Todos los docentes */
    $alumnos = DB::table('users')
        ->join('alumnos', 'users.alumno_id', '=', 'alumnos.id')
        ->select('users.*', 'alumnos.id', 'alumnos.nacionalidad', 'alumnos.edonacimiento', 'alumnos.status')
        ->get();

    dd($alumnos);

});

Route::get('docentesGrupos',function() {

    $docente = \PosgradoService\Entities\Docente::find(1);//Madaline Conn
    $docente2 = \PosgradoService\Entities\Docente::find(2); //Ryleigh Dickens

    $alumno = \PosgradoService\Entities\Alumno::find(1); //Jadyn Abshire
    $alumno2 = \PosgradoService\Entities\Alumno::find(2); //Hyman Glover

    $grupoPHP = \PosgradoService\Entities\Grupo::find(1); //ID=1
    $grupoHTML = \PosgradoService\Entities\Grupo::find(2); //ID=2


    $docente->grupos()->save($grupoPHP);
    $docente2->grupos()->save($grupoHTML);



    $alumno->grupos()->save($grupoPHP);
    $alumno2->grupos()->save($grupoHTML);



    return "todo good";

});



Route::get('asignaturasDegrupo', function(){

    /*Regresamos las asignaturas que tiene el grupo */

    $grupo1 = \PosgradoService\Entities\Grupo::find(2);

    dd($grupo1->asignaturas->toArray());

});

Route::get('grupoAsignaturas', function(){

    /*Regresamos los  que tiene una asignatura */

    $asignatura = \PosgradoService\Entities\Asignatura::find(1);

    dd($asignatura->grupos->toArray());

});


Route::get('horarios',function(){

    /*Regresamos el horario de una materia conforme su grupo, por eso el Modelo Asignatura grupo*/
    $horario = \PosgradoService\Entities\AsignaturaGrupo::find(2);

    dd($horario->horasDias->toArray());



});

Route::get('calificacion',function(){

    //\PosgradoService\Entities\AlumnoGrupo::find(1)->toArray());


    $datosAlumnogrupo = DB::table('users')
        ->join('alumnos', 'users.alumno_id', '=', 'alumnos.id')
        ->join('alumno_grupo', 'alumno_grupo.alumno_id', '=', 'alumnos.id')
        ->join('grupos', 'grupos.id','=','alumno_grupo.grupo_id')
        ->join('asignatura_grupo','asignatura_grupo.grupo_id','=','grupos.id')
        ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
        ->select('users.id','users.name', 'alumnos.nacionalidad','grupos.id', 'grupos.nombre', 'asignaturas.nombre','asignatura_grupo.calificacion')
        ->get();

    dd($datosAlumnogrupo);

});





