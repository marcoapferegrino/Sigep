<?php namespace PosgradoService\Http\Controllers;

use PosgradoService\Http\Requests;
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
        $Asignatura1 = array(
            "id"     => "1",
            "nombre" => "AAA",
            "grupo" =>"5CV5",
            "calif"  => "10",

    );
        $Asignatura2 = array(
            "id"    => "3",
            "nombre" => "BBB",
            "grupo" =>"1CV1",
            "calif"  => "9",

    );
        $Asignatura3 = array(
            "id"     => "4",
            "nombre" => "CCC",
            "grupo" =>"7CM5",
            "calif"  => "5",

    );
        $Asignatura4 = array(
            "id"     => "5",
            "nombre" => "DDD",
            "grupo" =>"1CM5",
            "calif"  => "9",

        );

        $gruposAsignaturas = array($Asignatura1,$Asignatura2,$Asignatura3,$Asignatura4);
        return view('alumno.calificacionesAlumno', compact('gruposAsignaturas') );


        //
    }



}

