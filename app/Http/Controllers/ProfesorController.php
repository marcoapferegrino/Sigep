<?php namespace PosgradoService\Http\Controllers;


use Illuminate\Support\Facades\DB;
use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$user = auth()->user();
		$horario = array();

		$datos= User::getAsignaturasDeDocente($user->docente_id);

		foreach($datos as $dato)
		{
			array_push($horario,User::getHorario($dato->grupo_id,$dato->asignatura_id));
		}


		//dd($horario,$datos);


		return view('homeProfesor',compact('horario','datos'));
	}


	public function showCalificaciones(){


		$alumnosArray= array();

		$gruposMateriasDeProfesor = User::getAsignaturasDeDocente(auth()->user()->docente_id);

		foreach($gruposMateriasDeProfesor as $grupoMateria)
		{
			$alumnos = User::getAlumnosByMateriaAsignatura($grupoMateria->grupo_id,$grupoMateria->asignatura_id);
			array_push($alumnosArray,$alumnos);

		}

		//dd($gruposMateriasDeProfesor,$alumnosArray);

		return view('docente.calificaciones',compact('gruposMateriasDeProfesor','alumnosArray'));
	}

	public function addCalificacion(Request $request)
	{

		$idAlumno 		= $request->alumno_id;
		$idAsignatura 	= $request->asignatura_id;
		$idGrupo 		= $request->grupo_id;
		$calificacion 	= $request->calificacion;



		$user=User::find(auth()->user()->getAuthIdentifier());
		$docente=Docente::find($user->docente_id);

		$docente->setCalificacion($idAlumno,$idAsignatura,$idGrupo,$calificacion);

		Session::flash('message', 'La calificación '.'ahora es '.$calificacion);
		//dd($request->all());
		return redirect()->action('ProfesorController@showCalificaciones');

	}

	public function horarioPDF()
	{
		$user = auth()->user();
		$horario = array();

		$datos= User::getAsignaturasDeDocente($user->docente_id);

		foreach($datos as $dato)
		{
			array_push($horario,User::getHorario($dato->grupo_id,$dato->asignatura_id));
		}

	/*
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML(view('docente.partials.tablaHorario',compact('horario','datos')))->setOrientation('landscape');
		return $pdf->stream();
	*/

		/*$pdf = \PDF::loadView('docente.partials.tablaHorario', compact('horario','datos'));
		return $pdf->stream();
		*/

		/*$view =view('docente.partials.tablaHorario',compact('horario','datos'));


		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);

		return $pdf->stream();*/

		$pdf = \PDF::loadView('docente/partials/horarioPDF',array('horario'=>$horario,'datos'=>$datos))->setOrientation('landscape')->setWarnings(false);
		return $pdf->stream();

	}


}
