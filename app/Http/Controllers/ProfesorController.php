<?php namespace PosgradoService\Http\Controllers;



use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\AsignaturaGrupo;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\Inscripcion;
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
		//dd($gruposAsignaturas);
		return view('docente.calificaciones',compact('gruposAsignaturas','alumnos'));
	}

	public function showAlumnos()
	{


		$user=User::find(auth()->user()->getAuthIdentifier());
		$idDocente =$user->docente_id;

		$alumnos = User::getAlumnosdeDocentePagination($idDocente);

		//array_unique($alumnos);
		//dd($alumnos);
		return view('docente.showAlumnos',compact('alumnos'));
	}

	public function findAlumnos(Request $request)
	{
		//dd($request->get('name'));


		$user=User::find(auth()->user()->getAuthIdentifier());
		$idDocente =$user->docente_id;

		$alumnos = User::getAlumnosdeDocenteBusqueda($idDocente,$request->get('name'));


		return view('docente.showAlumnos',compact('alumnos'));
	}



	public function showExpediente($id)
	{

		$user=User::find(auth()->user()->getAuthIdentifier());
		$idDocente =$user->docente_id;
		$estado = false;

		//Obtenemos alumnos del docente
		$alumnos =  User::getAlumnosdeDocente($idDocente);

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
		$docente = Docente::find($user->docente_id);
		$idDocente = $docente->id;
		//array de calificaciones e id de inscripciones, del mismo tamaño
		$calificaciones = $request->calificaciones;
		$inscripcionesId = $request->inscripcion_ids;
		$inscripciones = Inscripcion::find($inscripcionesId);




		//iteramos ambos arrays y vamos seteando las calificaciones a las inscripciones correspondientes
		for($i=0 ; $i<count($calificaciones);$i++)
		{

			if ($calificaciones[$i]!="" && $inscripciones[$i]->docente_id == $idDocente)
			{
				$docente->setCalificacion($inscripcionesId[$i],$calificaciones[$i]);
			}
		}

		Session::flash('message', 'Ya se registraron las calificaciones :D');

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

	public function closeActa(Request $request){

		$user = auth()->user();
		$docente = Docente::find($user->docente_id);
		$idGrupoAsignatura = $request->id;
		$grupoAsignatura = AsignaturaGrupo::find($idGrupoAsignatura);


        //validamos que el acta originalmente este en 1 para cerrar ,
        // se valida que el acta que se cierra pertenezca al docente en sesión
		if ($grupoAsignatura->acta == 1 && $grupoAsignatura->docente_id==$docente->id) {
			$grupoAsignatura->acta=0;
			$grupoAsignatura->save();

			Session::flash('message', 'El acta se cerro correctamente no podrás cambiar calificaciones :D');
		}
		else
		{
			Session::flash('error', 'Esta acta no te pertenece o ya se habia cerrado previamente');
		}

		return redirect()->action('ProfesorController@showCalificaciones');

	}


}
