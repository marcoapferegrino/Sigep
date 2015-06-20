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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


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

    $grupoPHP = \PosgradoService\Entities\Grupo::find(1);
    $grupoHTML = \PosgradoService\Entities\Grupo::find(2);


    $docente->grupos()->save($grupoPHP);
    $docente2->grupos()->save($grupoHTML);

    $alumno->grupos()->save($grupoPHP);
    $alumno2->grupos()->save($grupoHTML);


    return "todo good";

});

Route::get('asignaGrupos',function() {

   $arquitectura = \PosgradoService\Entities\Asignatura::find(1);
    $metodos = \PosgradoService\Entities\Asignatura::find(2);
    $mobiles = \PosgradoService\Entities\Asignatura::find(3);



    $grupo1 = \PosgradoService\Entities\Grupo::find(1);
    $grupo2 = \PosgradoService\Entities\Grupo::find(2);




    $grupo1->asignaturas()->save($arquitectura);
    $grupo1->asignaturas()->save($metodos);
    $grupo1->asignaturas()->save($mobiles);

    $grupo2->asignaturas()->save($mobiles);

    return "Todo good";
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


