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

        Route::get('/expedienteDocente/{id}', [
            'as' => 'docentes.showExpediente',
            'uses' => 'SuperAdminController@showExpedienteDocente'
        ]);

        //Borrar periodo y programa

        Route::delete('/deletePeriodo/{id}', [
            'as' => 'periodo.deletePeriodo',
            'uses' => 'SuperAdminController@deletePeriodo'
        ]);
        Route::delete('/deletePrograma{id}', [
            'as' => 'periodo.deletePrograma',
            'uses' => 'SuperAdminController@deletePrograma'
        ]);

        Route::post('/updatePeriodo', [
            'as' => 'periodo.updatePeriodo',
            'uses' => 'SuperAdminController@updatePeriodo'
        ]);

        Route::post('/updatePrograma', [
            'as' => 'programa.updatePrograma',
            'uses' => 'SuperAdminController@updatePrograma'
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

        Route::post('/updateAsignatura', [
            'as' => 'asignatura.updateAsignatura',
            'uses' => 'SuperAdminController@updateAsignatura'
        ]);

        Route::get('/horarios', [
            'as' => 'horarios.showHorarios',
            'uses' => 'SuperAdminController@showHorarios'
        ]);

        Route::delete('/deleteHorarios/{id}', [
            'as' => 'horarios.deleteHorario',
            'uses' => 'SuperAdminController@deleteHorario'
        ]);

        Route::post('/horarios', [
            'as' => 'horarios.addHorario',
            'uses' => 'SuperAdminController@addHorario'
        ]);
        Route::post('/abrirActa', [
            'as' => 'calificaciones.abrirActa',
            'uses' => 'SuperAdminController@abrirActa'
        ]);


        Route::get('/getAddAdmin', [
            'as' => 'alumnos.getAddAdmin',
            'uses' => 'SuperAdminController@getAddAdmin'
        ]);
        Route::post('/addAdmin', [
            'as' => 'admin.addAdmin',
            'uses' => 'SuperAdminController@addAdmin'
        ]);




    });

    Route::group(['middleware' => 'role:admin'],function() {
        Route::get('logAdmin',"AdminController@index");

        Route::get('testC',"AdminController@getTestC");

        Route::get('/showUsuarios', [
            'as' => 'usuarios.showUsers',
            'uses' => 'AdminController@showUsers'
        ]);
        Route::get('/findUsuario', [
            'as' => 'usuarios.findUsuario',
            'uses' => 'AdminController@findUsuario'
        ]);

        Route::get('/alumnosBoletaEncontrados', [
            'as' => 'alumnos.boletaFindAlumnos',
            'uses' => 'AdminController@findAlumnos'
        ]);

        Route::get('/getGraficas', [
            'as' => 'graficas.graficas',
            'uses' => 'SuperAdminController@getGraficas'
        ]);
        Route::get('/getCustomGrafica', [
            'as' => 'graficas.getCustomGrafica',
            'uses' => 'SuperAdminController@getCustomGrafica'
        ]);

        Route::get('/getAddDocente', [ //form
            'as' => 'docente.getAddDocente',
            'uses' => 'AdminController@getAddDocente'
        ]);

        Route::post('/addDocente', [ //registro
            'as' => 'docente.addDocente',
            'uses' => 'AdminController@addDocente'
        ]);

        Route::get('/getAddGrupo', [ //form
            'as' => 'grupo.getAddGrupo',
            'uses' => 'AdminController@getAddGrupo'
        ]);

        Route::post('/addGrupo', [ //registro
            'as' => 'grupo.addGrupo',
            'uses' => 'AdminController@addGrupo'
        ]);

        Route::get('/getAddSalon', [ //form
            'as' => 'salon.getAddSalon',
            'uses' => 'AdminController@getAddSalon'
        ]);

        Route::post('/addSalon', [ //registro
            'as' => 'salon.addSalon',
            'uses' => 'AdminController@addSalon'
        ]);

        Route::get('/getAddInscripcion', [ //form
            'as' => 'inscripcion.getAddInscripcion',
            'uses' => 'AdminController@getAddInscripcion'
        ]);

        Route::post('/addInscripcion', [ //registro
            'as' => 'inscripcion.addInscripcion',
            'uses' => 'AdminController@addInscripcion'
        ]);;


        Route::post('/updateGrupo', [
            'as' => 'grupo.updateGrupo',
            'uses' => 'AdminController@updateGrupo'
        ]);
        Route::post('/updateAsignaturaGrupo', [
            'as' => 'grupo.updateAsignaturaGrupo',
            'uses' => 'AdminController@updateAsignaturaGrupo'
        ]);



        Route::get('/getAddAlumno', [ //llama al formulario
            'as' => 'alumno.getAddAlumno',
            'uses' => 'AdminController@getAddAlumno'
        ]);

        Route::post('/addAlumno', [ //peticion para registro
            'as' => 'alumno.addAlumno',
            'uses' => 'AdminController@addAlumno'
        ]);
        Route::get('/getAlumnosCalificar', [
            'as' => 'alumnos.getAlumnosCalificar',
            'uses' => 'AdminController@getAlumnosCalificar'
        ]);
        Route::post('/calificar', [
            'as' => 'alumnos.calificar',
            'uses' => 'AdminController@calificar'
        ]);

        Route::get('/getGrupos', [
            'as' => 'grupos.getGrupos',
            'uses' => 'AdminController@getGrupos'
        ]);

        Route::delete('/deleteGrupo/{id}', [
            'as' => 'grupo.deleteGrupo',
            'uses' => 'AdminController@deleteGrupo'
        ]);

        Route::delete('/deleteAsignaturaGrupo/{id}', [
            'as' => 'grupo.deleteAsignaturaGrupo',
            'uses' => 'AdminController@deleteAsignaturaGrupo'
        ]);
        Route::delete('/deleteInscripcion/{id}', [
            'as' => 'alumno.deleteInscripcion',
            'uses' => 'AdminController@deleteInscripcion'
        ]);
        Route::get('/kardex/{id}', [
            'as' => 'admin.showKardex',
            'uses' => 'AdminController@showKardex'
        ]);


        Route::get('/getAddGruposPorPeriodo', [
            'as' => 'periodos.filtroPeriodo',
            'uses' => 'AdminController@filtroPeriodo'
        ]);

        Route::get('/getAddGrupoPorPeriodo', [
            'as' => 'grupos.gruposFiltroPeriodo',
            'uses' => 'AdminController@getGruposFiltro'
        ]);

        Route::get('/getAddGruposByPeriodo', [
            'as' => 'grupos.gruposByPeriodo',
            'uses' => 'AdminController@getGruposByPeriodo'
        ]);

        Route::get('/getInscritosFiltro', [
            'as' => 'inscritos.inscritosFiltroPeriodo',
            'uses' => 'AdminController@filtroInscritosPeriodo'
        ]);

        Route::get('/getInscritos', [    //checar filtro luis
            'as' => 'inscritos.getInscritos',
            'uses' => 'AdminController@getInscritos'
        ]);

        Route::get('/asignaturaGrupoPeriodo', [
            'as' => 'asignaturaGrupoPeriodo.periodos',
            'uses' => 'AdminController@asignaturaGrupoPeriodo'
        ]);

        Route::get('/editarDocente/{id}', [
            'as' => 'docentes.editarDocente',
            'uses' => 'AdminController@editDocente'
        ]);
        Route::post('/updateDocente', [
            'as' => 'docentes.updateDocente',
            'uses' => 'AdminController@updateDocente'
        ]);

        Route::get('/editarAlumno/{id}', [
            'as' => 'alumnos.editarAlumno',
            'uses' => 'AdminController@editAlumno'
        ]);
        Route::post('/updateAlumno', [
            'as' => 'alumnos.updateAlumno',
            'uses' => 'AdminController@updateAlumno'
        ]);

        Route::get('/getUpdateAdmin/{id}', [
            'as' => 'admin.getUpdateAdmin',
            'uses' => 'AdminController@getUpdateAdmin'
        ]);
        Route::post('/updateAdmin', [
            'as' => 'admin.updateAdmin',
            'uses' => 'AdminController@updateAdmin'
        ]);
    });

    Route::group(['middleware' => 'role:alumno'],function() {
        Route::get('logAlumno',"AlumnoController@index");

        Route::get('/calificacionesAlumno', [ //get calif
            'as' => 'alumno.getCalificaciones',
            'uses' => 'AlumnoController@getCalificaciones'
        ]);
        Route::get('/getHorarioAlumno', [ //get calif
            'as' => 'alumno.getHorarioAlumno',
            'uses' => 'AlumnoController@getHorarioAlumno'
        ]);

        Route::get('/kardex', [
            'as' => 'alumno.showKardex',
            'uses' => 'AlumnoController@showKardexPeriodo'
        ]);

        Route::get('/MiExpediente/{id}', [
            'as' => 'alumno.showExpediente',
            'uses' => 'AlumnoController@showExpediente'
        ]);


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

        Route::post('/cerrarActa', [
            'as' => 'calificaciones.cerrarActa',
            'uses' => 'ProfesorController@closeActa'
        ]);
        Route::get('/misAlumnos', [
            'as' => 'alumnos.showAlumnos',
            'uses' => 'ProfesorController@showAlumnos'
        ]);

        Route::post('/historyGroups', [
            'as' => 'alumnos.recordGroups',
            'uses' => 'ProfesorController@recordGroups'
        ]);
        Route::get('/alumnosEncontrados', [
            'as' => 'alumnos.findAlumnos',
            'uses' => 'ProfesorController@findAlumnos'
        ]);

        Route::get('/expediente/{id}', [
            'as' => 'alumnos.showExpediente',
            'uses' => 'ProfesorController@showExpediente'
        ]);

        Route::get('/horarioPDF', [
            'as' => 'horario.horarioPDF',
            'uses' => 'ProfesorController@horarioPDF'
        ]);
        Route::get('/asignaturaGrupoPeriodoDocente', [
            'as' => 'asignaturaGrupoPeriodoDocente.periodos',
            'uses' => 'ProfesorController@asignaturaGrupoPeriodoDocente'
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








