<?php namespace PosgradoService\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\Asignatura;
use PosgradoService\Entities\AsignaturaGrupo;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\Horario;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\Programa;
use PosgradoService\Entities\User;
use PosgradoService\Exceptions\Handler;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Requests\CreatePeriodoRequest;
use PosgradoService\Http\Requests\CreateAsignaturaRequest;
use PosgradoService\Http\Requests\UpdatePeriodoRequest;
use PosgradoService\Http\Requests\UpdateProgramaRequest;
use PosgradoService\Http\Requests\UpdateAsignaturaRequest;
use PosgradoService\Http\Requests\UpdateDocenteRequest;
use PosgradoService\Http\Requests\UpdateAlumnoRequest;




use Illuminate\Http\Request;

class SuperAdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$periodos = Periodo::all();
		$programas = Programa::all();


		return view('homeSuperAdmin',compact('periodos','programas'));
	}

	public function showUsers()
	{
		$usuarios = User::orderBy('name','ASC')->paginate();

		$numUsers = count(User::all());

		return view ('superAdmin.showUsuarios',compact('usuarios','numUsers'));
	}
	public function findUsuario(Request $request)
	{
		//dd($request->all());

		$name = $request->get('name');
		$rol = $request->get('rol');
		$numUsers = count(User::all());
		$usuarios = User::name($name)->rol($rol)->orderBy('name','ASC')->paginate();

		if(count($usuarios)==0)
		{
			Session::flash('error', 'No se encontraron resultados con esta búsqueda');

		}
		return view ('superAdmin.showUsuarios',compact('usuarios','numUsers'));
	}

	public function addPeriodo(CreatePeriodoRequest $request)
	{
		$periodo = Periodo::create($request->all());

		Session::flash('message', $periodo->nombre.' fue agregado :D');
		return redirect()->action('SuperAdminController@index');
	}
//	public function addPrograma(CreateProgramaRequest $request)
//	{
//
//		$programa = Programa::create($request->all());
//		Session::flash('message', $programa->nombre.' fue agregado :D');
//
//		return redirect()->action('SuperAdminController@index');
//	}
	public function deletePeriodo($id)
	{
		$periodo = Periodo::findOrFail($id);
		$mensajeSuccess =$periodo->nombre.' fue eliminado :D';
		try
		{
			$periodo->delete();
			Session::flash('message',$mensajeSuccess );
		}
		catch(QueryException $e)
		{
			Handler::checkQueryError($e);
		}

		return redirect()->action('SuperAdminController@index');

	}

	public function updatePeriodo(UpdatePeriodoRequest $request)
	{
		$periodo = Periodo::find($request->id);

		$periodo->nombre= $request->nombre;
		$periodo->inicioPeriodo= $request->inicioPeriodo;
		$periodo->finPeriodo = $request->finPeriodo;
		$periodo->inicioCalificaciones= $request->inicioCalificaciones;
		$periodo->finCalificaciones= $request->finCalificaciones;

		$periodo->save();

		Session::flash('message',$periodo->nombre.' fue Actualizado :D');
		return redirect()->action('SuperAdminController@index');
	}

	public function updatePrograma(UpdateProgramaRequest $request)
	{

		//dd($request->all());
		$programa = Programa::find($request->id);

		$programa->nombre= $request->nombre;
		$programa->escuela= $request->escuela;
		$programa->periodo_id = $request->periodo_id;


		$programa->save();

		Session::flash('message',$programa->nombre.' fue Actualizado :D');
		return redirect()->action('SuperAdminController@index');
	}


	public function showAsignaturas()
	{
		$asignaturas = Asignatura::all();
		return view('superAdmin.asignaturas',compact('asignaturas'));
	}

	public function addAsignatura(CreateAsignaturaRequest $request)
	{
		//dd($request->all());

		$asignatura = Asignatura::create($request->all());

		Session::flash('message', $asignatura->nombre.' fue agregado :D');
		return redirect()->action('SuperAdminController@showAsignaturas');
	}
	public function deleteAsignatura($id)
	{
		$asignatura = Asignatura::findOrFail($id);
		try
		{
			$asignatura->delete();
			Session::flash('message',$asignatura->nombre.' fue eliminado :D');
		}
		catch(QueryException $e)
		{
			Handler::checkQueryError($e);

		}

		return redirect()->action('SuperAdminController@showAsignaturas');
	}

	public function updateAsignatura(UpdateAsignaturaRequest $request)
	{
		//dd($request->all());
		$asignatura = Asignatura::find($request->id);

		$asignatura->nombre = $request->nombre;
		$asignatura->creditos = $request->creditos;
		$asignatura->claveAsignatura = $request->claveAsignatura;
		$asignatura->horas = $request->horas;
		$asignatura->curso = $request->curso;
		$asignatura->tipo = $request->tipo;
		$asignatura->fechaVigencia = $request->fechaVigencia;

		$asignatura->save();


		Session::flash('message',$asignatura->nombre.' fue Actualizada :D');

		return redirect()->action('SuperAdminController@showAsignaturas');


	}
	public function showHorarios()
	{

		$dias=array();
		$horarios = Horario::all();

		foreach($horarios as $horario)
		{
			array_push($dias,json_decode($horario->dias));
		}
		//dd($dias,$horarios);

		return view('superAdmin.horarios',compact('horarios','dias'));
	}

	public function addHorario(Request $request)
	{

		$rules = array(
			'lunesI'        => 'required_with:lunesF |biggerDate:'.$request->lunesF,
			'lunesF'        => 'required_with:lunesI ',
			'martesI'       => 'required_with:martesF |biggerDate:'.$request->martesF,
			'martesF'       => 'required_with:martesI | ',
			'miercolesI'    => 'required_with:miercolesF |biggerDate:'.$request->miercolesF,
			'miercolesF'    => 'required_with:miercolesI |' ,
			'juevesI'       => 'required_with:juevesF | biggerDate:'.$request->juevesF,
			'juevesF'       => 'required_with:juevesI ' ,
			'viernesI'      => 'required_with:viernesF biggerDate:'.$request->viernesF,
			'viernesF'      => 'required_with:viernesI |' ,
			'nombre'  		=> 'required'
		);

		$this->validate($request,$rules);

		//dd($request->all());

		$dias = self::diasJson($request->all());

		$horario = new Horario();

		$horario->nombre = $request->nombre;
		$horario->dias = $dias;

		$horario->save();

		Session::flash('message',$horario->nombre.' fue agregado :D');
		return redirect()->action('SuperAdminController@showHorarios');

	}

	public function deleteHorario($id)
	{
		$horario = Horario::findOrFail($id);

		try
		{
			$horario->delete();
			Session::flash('message', "El horario : ". $horario->nombre.' fue eliminado :D');
		}
		catch(QueryException $e)
		{
			Handler::checkQueryError($e);

		}
		return redirect()->action('SuperAdminController@showHorarios');
	}
	public function abrirActa(Request $request)
	{

		$grupoAsignatura = AsignaturaGrupo::find($request->id);
		//dd($request->all(),$grupoAsignatura->toArray());
		if($grupoAsignatura->acta==0)
		{
			$grupoAsignatura->acta=1;
			$grupoAsignatura->save();
			Session::flash('message', 'El acta se abrio correctamente ahora pueden calificar');
		}
		else
		{
			Session::flash('error', 'Hubo un error en el acta lo sentimos');
		}

		return redirect()->action('AdminController@getAlumnosCalificar');

	}


	public function showExpedienteDocente($id)
	{
		$user = User::find($id);
		$docente = Docente::find($user->docente_id);

		return view('superAdmin.expedienteDocente',compact('user','docente'));

	}
	public function editDocente($id)
	{
		$user = User::find($id);
		$docente = Docente::find($user->docente_id);

//		dd($user->toArray(),$docente->toArray());
		return view('superAdmin.editDocente',compact('user','docente'));

	}
	public function editAlumno($id)
	{
//		dd($id);

		$user = User::find($id);
		$alumno = Alumno::find($user->alumno_id);

//		dd($user->toArray(),$alumno->toArray());
		return view('superAdmin.editAlumno',compact('user','alumno'));
	}

	public function updateDocente(UpdateDocenteRequest $request)
	{
		$editerUser = auth()->user();
		$user = User::find($request->idUser);
		ucwords($request->name); //primera letra de nombresz en mayuscula

		try{
			User::find($request->idUser)->update($request->all());
			Docente::find($user->docente_id)->update($request->all());
			Docente::where('id',$user->docente_id)
				->update([
					'idUsuarioQueActualiza'=>$editerUser->id
				]);
			if($request->password!="")
			{
				$password = bcrypt($request->password);
				User::where('id',$user->docente_id)
					->update([
						'password'=>$password
					]);
			}
			Session::flash('message', $user->getNombreCompleto().'se actualizó exitosamente');
		}
		catch(QueryException $e)
		{
			Handler::checkQueryError($e);
		}

		return redirect('/editarDocente/'.$user->id);
	}

	public function updateAlumno(UpdateAlumnoRequest $request)
	{
		$editerUser = auth()->user();
		$user = User::find($request->idUser);
		ucwords($request->name); //primera letra de nombresz en mayuscula

		try{
			User::find($request->idUser)->update($request->all());
			Alumno::find($user->alumno_id)->update($request->all());
			Alumno::where('id',$user->alumno_id)
				->update([
					'idUsuarioQueActualiza'=>$editerUser->id
				]);

			if($request->password != "")
			{
				$password = bcrypt($request->password);
				User::where('id',$user->alumno_id)
					->update([
						'password'=>$password
					]);
			}

			Session::flash('message', $user->getNombreCompleto().'se actualizó exitosamente');
		}
		catch(QueryException $e)
		{
			Handler::checkQueryError($e);
		}

		return redirect('/editarAlumno/'.$user->id);
	}

	private function diasJson($dias)
	{
		//dd($dias['lunesI']);
		$json = '{"dias":{"Lunes":"'.$dias["lunesI"].' - '.$dias["lunesF"].'","Martes": "'.$dias["martesI"].' - '.$dias["martesF"].'","Miercoles":"'.$dias["miercolesI"].' - '.$dias["miercolesF"].'","Jueves": "'.$dias["juevesI"].' - '.$dias["juevesF"].'","Viernes": "'.$dias["viernesI"].' - '.$dias["viernesF"].'"}}';
		return $json;
	}




}
