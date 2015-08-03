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
 * Primero se verifica que este autenticado, despues se verifica que tenga un rol de acceso a la ruta
 * */

Route::group(/**
 *
 */
    ['middleware' => 'auth'],function(){

    Route::group(['middleware' => 'role:superAdmin'],function() {

        Route::get('homeSA',"SuperAdminController@index");

        //agregar periodo y programa

        Route::post('/addPeriodo', [
            'as' => 'periodo.addPeriodo',
            'uses' => 'SuperAdminController@addPeriodo'
        ]);
        Route::post('/addPrograma', [
            'as' => 'programa.addPrograma',
            'uses' => 'SuperAdminController@addPrograma'
        ]);

        //Borrar periodo y programa

        Route::delete('deletePeriodo/{id}', [
            'as' => 'periodo.deletePeriodo',
            'uses' => 'SuperAdminController@deletePeriodo'
        ]);
        Route::delete('/deletePrograma{id}', [
            'as' => 'periodo.deletePrograma',
            'uses' => 'SuperAdminController@deletePrograma'
        ]);

        //Asignaturas
        Route::get('/asignaturas', [
            'as' => 'asignatura.showAsignaturas',
            'uses' => 'SuperAdminController@showAsignaturas'
        ]);
        Route::post('/addAsignaturas', [
            'as' => 'asignatura.addAsignatura',
            'uses' => 'SuperAdminController@addAsignatura'
        ]);
        Route::delete('/deleteAsignatura{id}', [
            'as' => 'asignatura.deleteAsignatura',
            'uses' => 'SuperAdminController@deleteAsignatura'
        ]);




    });



    Route::group(['middleware' => 'role:admin'],function() {
        Route::get('logAdmin',"AdminController@index");
    });

    Route::group(['middleware' => 'role:alumno'],function() {
        Route::get('logAlumno',"AlumnoController@index");
    });




    Route::group(['middleware' => 'role:docente'],function() {
        Route::get('homeP',"ProfesorController@index");

        //Calificaciones
        Route::get('/calificaciones', [
            'as' => 'calificaciones.showCalificaciones',
            'uses' => 'ProfesorController@showCalificaciones'
        ]);
        //Calificar
        Route::post('/addCalificacion', [
            'as' => 'asignatura.addCalificacion',
            'uses' => 'ProfesorController@addCalificacion'
        ]);

        Route::get('/horarioPDF', [
            'as' => 'horario.horarioPDF',
            'uses' => 'ProfesorController@horarioPDF'
        ]);
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


Route::get('testingDocentes',function(){


    $datosProfesorGrupoAsignatura = \PosgradoService\Entities\User::getAsignaturasDeAlumno(2);

    dd($datosProfesorGrupoAsignatura);
});





