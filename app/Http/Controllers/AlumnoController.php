<?php namespace PosgradoService\Http\Controllers;

use PosgradoService\Http\Requests;

use Illuminate\Support\Facades\DB;

use PosgradoService\Entities\User;
use PosgradoService\Entities\Alumno;
use PosgradoService\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AlumnoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('homeAlumno');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        //
    }
    public function getCalificaciones()
    {


        $gruposAsignaturas = Alumno::getCalificaciones();
      //  dd($gruposAsignaturas);
        return view('alumno.calificacionesAlumno', compact('gruposAsignaturas') );


        //
    }

    public function getHorarioAlumno()
    {

        $dias = array();

        $horarios=Alumno::getHorarioDeAlumno();

        foreach($horarios as $horario)
        {
            array_push($dias,json_decode($horario->dias));
        }
        //dd($dias,$horarios);

        return view('alumno.alumnoHorario', compact('horarios','dias') );


        //
    }



}

