<?php namespace PosgradoService\Http\Controllers;



use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\Asignatura;
use PosgradoService\Entities\AsignaturaGrupo;
use PosgradoService\Entities\Grupo;
use PosgradoService\Entities\Inscripcion;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PosgradoService\Http\Requests\AddCalificacionRequest;

class ProfesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dias = array();

		$horarios=User::getHorario();

		foreach($horarios as $horario)
		{
			array_push($dias,json_decode($horario->dias));
		}
		//dd($dias,$horarios);

		return view('homeProfesor',compact('horarios','dias'));
	}
	public function showCalificaciones(){

		$idDocente =auth()->user()->docente_id;

		$asignaturas 	= Asignatura::all('id','nombre');
		$periodos 		= Periodo::all('id','nombre');
		$grupos 		= Grupo::all('id','nombre');

		$gruposAsignaturas 	= User::getAsignaturasGruposDocenteActually($idDocente);
		$alumnos 			= User::getAlumnosdeDocenteActually($idDocente);

//		dd($alumnos,$gruposAsignaturas);
		return view('docente.calificaciones',compact('gruposAsignaturas','alumnos','asignaturas','periodos','grupos'));
	}
	public function asignaturaGrupoPeriodoDocente(Request $request)
	{
		$idDocente =auth()->user()->docente_id;
		$idAsignatura 	= $request->asignatura;
		$idPeriodo 		= $request->periodo;
		$idGrupo 		= $request->grupo;

		$asignaturas = Asignatura::all('id','nombre');
		$periodos = Periodo::all('id','nombre');
		$grupos = Grupo::all('id','nombre');

		$gruposAsignaturas 	= User::getAsignaturasGruposDocentePeriodo($idDocente,$idAsignatura,$idPeriodo,$idGrupo);
		$alumnos 			= User::getAlumnosdeDocentePeriodo($idDocente,$idAsignatura,$idPeriodo,$idGrupo);


		return view('docente.calificaciones',compact('gruposAsignaturas','alumnos','asignaturas','periodos','grupos'));
	}

	public function showAlumnos()
	{
		$idDocente 	= auth()->user()->docente_id;
		$asignaturas = Asignatura::all('id','nombre');
		$periodos = Periodo::all('id','nombre');
		$grupos = Grupo::all('id','nombre');

		$alumnos 	= User::getAlumnosdeDocentePagination($idDocente);

		return view('docente.showAlumnos',compact('alumnos','asignaturas','periodos','grupos'));
	}

	public function findAlumnos(Request $request)
	{
		$idDocente =auth()->user()->docente_id;
		$asignaturas = Asignatura::all('id','nombre');
		$periodos = Periodo::all('id','nombre');
		$grupos = Grupo::all('id','nombre');

		$nombre  = $request->get('name');
		$idGrupo = $request->get('grupo');
		$idAsignatura = $request->get('asignatura');
		$idPeriodo = $request->get('periodo');

		$alumnos = User::getAlumnosdeDocenteBusqueda($idDocente,$nombre,$idAsignatura,$idPeriodo,$idGrupo);

		if(count($alumnos)==0)
		{
			Session::flash('error', 'No se encontraron resultados con esta búsqueda');
		}
//		dd(count($alumnos));
		return view('docente.showAlumnos',compact('alumnos','asignaturas','periodos','grupos'));

	}

	public function showExpediente($id)
	{
		$user =auth()->user();
		$idDocente =$user->docente_id;
		$estado = false;


		//Obtenemos alumnos del docente
		$alumnos =  User::getAlumnosdeDocenteActually($idDocente);

		//buscamos entre los alumnos del docente el ID del alumno solicitado
		foreach ($alumnos as $alumno) {
			if($alumno->userId == $id)
			{
				$estado = true;
			}

		}
		//si si esta lo buscamos en la BD
		if($estado == true || $user->rol = 'superAdmin')
		{
			$user= User::find($id);
			$alumno = Alumno::find($user->alumno_id);
			//dd($user->toArray(),$alumno->toArray());
			return view('docente.expediente',compact('user','alumno'));
		}
		else abort(404); //si no esta dentro de los alumnos del docente not found

	}

	public function addCalificacion(AddCalificacionRequest $request)
	{

		$user = auth()->user();

		$idDocente 			= $idDocente =auth()->user()->docente_id;
		//array de calificaciones e id de inscripciones, del mismo tamaño
		$calificaciones 	= $request->calificaciones;
		$inscripcionesId 	= $request->inscripcion_ids;
		$inscripciones 		= Inscripcion::find($inscripcionesId);


		//iteramos ambos arrays y vamos seteando las calificaciones a las inscripciones correspondientes
		for($i=0 ; $i<count($calificaciones);$i++)
		{

			if ($calificaciones[$i]!="" && $inscripciones[$i]->docente_id == $idDocente)
			{
				$user->setCalificacion($inscripcionesId[$i],$calificaciones[$i]);
			}
		}

		Session::flash('message', 'Ya se registraron las calificaciones :D');

		return redirect()->action('ProfesorController@showCalificaciones');

	}

//	public function horarioPDF()
//	{
//		$user = auth()->user();
//		$horario = array();
//
//		$datos= User::getAsignaturasDeDocente($user->docente_id);
//
//		foreach($datos as $dato)
//		{
//			array_push($horario,User::getHorario($dato->grupo_id,$dato->asignatura_id));
//		}
//
//		/*
//            $pdf = \App::make('dompdf.wrapper');
//            $pdf->loadHTML(view('docente.partials.tablaHorario',compact('horario','datos')))->setOrientation('landscape');
//            return $pdf->stream();
//        */
//
//		/*$pdf = \PDF::loadView('docente.partials.tablaHorario', compact('horario','datos'));
//		return $pdf->stream();
//		*/
//
//		/*$view =view('docente.partials.tablaHorario',compact('horario','datos'));
//
//
//		$pdf = \App::make('dompdf.wrapper');
//		$pdf->loadHTML($view);
//
//		return $pdf->stream();*/
//
//		$pdf = \PDF::loadView('docente/partials/horarioPDF',array('horario'=>$horario,'datos'=>$datos))->setOrientation('landscape')->setWarnings(false);
//		return $pdf->stream();
//
//	}

	public function closeActa(Request $request){
		$user 				= auth()->user();
		$idDocente 			=$user->docente_id;
		$idGrupoAsignatura 	= $request->id;
		$grupoAsignatura 	= AsignaturaGrupo::find($idGrupoAsignatura);


		//validamos que el acta originalmente este en 1 para cerrar ,
		// se valida que el acta que se cierra pertenezca al docente en sesión
		if (($grupoAsignatura->acta == 1 && $grupoAsignatura->docente_id==$idDocente) || $user->rol == "superAdmin") {
			$grupoAsignatura->acta=0;
			$grupoAsignatura->save();

			Session::flash('message', 'El acta se cerro correctamente no podrás cambiar calificaciones :D');
		}
		else
		{
			Session::flash('error', 'Esta acta no te pertenece o ya se habia cerrado previamente');
		}

		return redirect()->action('AdminController@getAlumnosCalificar');

	}


}
