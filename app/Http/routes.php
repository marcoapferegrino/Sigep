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

Route::group(['middleware' => 'auth'],function(){

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
            'as' => 'materias.showMaterias',
            'uses' => 'SuperAdminController@showMaterias'
        ]);
        Route::post('/addAsignaturas', [
            'as' => 'materias.addMateria',
            'uses' => 'SuperAdminController@addMateria'
        ]);
        Route::delete('/deleteAsignatura{id}', [
            'as' => 'periodo.deleteAsignatura',
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






