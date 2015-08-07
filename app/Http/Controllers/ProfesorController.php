<?php namespace PosgradoService\Http\Controllers;


use Illuminate\Support\Facades\DB;
use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\AsignaturaGrupo;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\Horario;
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
		$dias = array();
		$user = auth()->user();
		$horarios=User::getHorario($user->docente_id);

		foreach($horarios as $horario)
		{
			array_push($dias,json_decode($horario->dias));
		}
		//dd($dias,$horarios);

		return view('homeProfesor',compact('horarios','dias'));
	}


	public function showCalificaciones(){

		$user=User::find(auth()->user()->getAuthIdentifier());
		$idDocente =$user->docente_id;

		$gruposAsignaturas = User::getAsignaturasGruposDocente($idDocente);
		$alumnos = User::getAlumnosdeDocente($idDocente);

		//dd($gruposAsignaturas,$alumnos);



		return view('docente.calificaciones',compact('gruposAsignaturas','alumnos'));
	}

	public function addCalificacion(Request $request)
	{

		//dd($request->calificacion,$request->inscripcion_id);

		$user = auth()->user();
		$docente = Docente::find($user->docente_id);

		$calificacion=$request->calificacion;
		$inscripcionId =$request->inscripcion_id;

		$docente->setCalificacion($inscripcionId,$calificacion);

		Session::flash('message', 'La calificación '.'ahora es '.$calificacion);
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
