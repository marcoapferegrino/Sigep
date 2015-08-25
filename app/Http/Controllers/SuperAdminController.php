<?php namespace PosgradoService\Http\Controllers;

use Illuminate\Support\Facades\Session;
use PosgradoService\Entities\Asignatura;
use PosgradoService\Entities\Horario;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\Programa;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Requests\CreatePeriodoRequest;
use PosgradoService\Http\Requests\CreateProgramaRequest;
use PosgradoService\Http\Requests\CreateAsignaturaRequest;
use PosgradoService\Http\Requests\CreateHorarioRequest;
use PosgradoService\Http\Requests\UpdatePeriodoRequest;
use PosgradoService\Http\Requests\UpdateProgramaRequest;
use PosgradoService\Http\Requests\UpdateAsignaturaRequest;




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
		$usuarios = User::paginate();

		return view ('superAdmin.showUsuarios',compact('usuarios'));
	}
	public function findUsuario(Request $request)
	{
		//dd($request->all());

		$name = $request->get('name');
		$rol = $request->get('rol');

		$usuarios = User::name($name)->rol($rol)->orderBy('id','DESC')->paginate();



		return view ('superAdmin.showUsuarios',compact('usuarios'));
	}


	public function addPeriodo(CreatePeriodoRequest $request)
	{
		$periodo = Periodo::create($request->all());

		Session::flash('message', $periodo->nombre.' fue agregado :D');
		return redirect()->action('SuperAdminController@index');
	}
	public function addPrograma(CreateProgramaRequest $request)
	{

		$programa = Programa::create($request->all());
		Session::flash('message', $programa->nombre.' fue agregado :D');

		return redirect()->action('SuperAdminController@index');
	}
	public function deletePeriodo($id)
	{
		$periodo = Periodo::findOrFail($id);

		$programas = Programa::all();
		$mensajeError = "";
		$mensajeSuccess =$periodo->nombre.' fue eliminado :D';
		$estado = false;

		foreach($programas as $programa)
		{
			if($programa->periodo_id == $periodo->id)
			{
				$mensajeError = "No podemos borrar por qué hay un programa que tiene este periodo";
				$estado = true;
			}

		}
		if ($estado==false) {
			$periodo->delete();
			Session::flash('message',$mensajeSuccess );
		}
		else
		{
			Session::flash('error',$mensajeError );
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
	public function deletePrograma($id)
	{
		$programa = Programa::findOrFail($id);
		$programa->delete();

		Session::flash('message',$programa->nombre.' fue eliminado :D');
		return redirect()->action('SuperAdminController@index');

	}

	public function showAsignaturas()
	{
		$asignaturas = Asignatura::all();
		$periodos = Periodo::all();

		return view('superAdmin.asignaturas',compact('asignaturas','periodos'));
	}

	public function addAsignatura(CreateAsignaturaRequest $request)
	{
		$asignatura = Asignatura::create($request->all());

		Session::flash('message', $asignatura->nombre.' fue agregado :D');
		return redirect()->action('SuperAdminController@showAsignaturas');
	}
	public function deleteAsignatura($id)
	{
		$asignatura = Asignatura::findOrFail($id);
		$asignatura->delete();

		Session::flash('message',$asignatura->nombre.' fue eliminado :D');
		return redirect()->action('SuperAdminController@showAsignaturas');
	}

	public function updateAsignatura(UpdateAsignaturaRequest $request)
	{
		//dd($request->all());
		$asignatura = Asignatura::find($request->id);

		$asignatura->nombre = $request->nombre;
		$asignatura->creditos = $request->creditos;
		$asignatura->horasPract = $request->horasPract;
		$asignatura->horasTeoricas = $request->horasTeoricas;
		$asignatura->tipo = $request->tipo;
		$asignatura->fechaElabP = $request->fechaElabP;

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
			'lunesI'        => 'required_if:lunesF,any | differenceDate:'.$request->lunesF.'|biggerDate:'.$request->lunesF,
			'lunesF'        => 'required_if:lunesI,any | ',
			'martesI'       => 'required_if:martesF,any | differenceDate:'.$request->martesF.'|biggerDate:'.$request->martesF,
			'martesF'       => 'required_if:martesI,any | ',
			'miercolesI'    => 'required_if:miercolesF,any  | differenceDate:'.$request->miercolesF.'|biggerDate:'.$request->miercolesF,
			'miercolesF'    => 'required_if:miercolesI,any  |' ,
			'juevesI'       => 'required_if:juevesF,any | differenceDate:'.$request->juevesF.'|biggerDate:'.$request->juevesF,
			'juevesF'       => 'required_if:juevesI,any  |' ,
			'viernesI'      => 'required_if:viernesF,any | differenceDate:'.$request->viernesF.'|biggerDate:'.$request->viernesF,
			'viernesF'      => 'required_if:viernesI,any  |' ,
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
		$horario->delete();

		Session::flash('message', "El horario : ". $horario->nombre.' fue eliminado :D');

		return redirect()->action('SuperAdminController@showHorarios');
	}

	private function diasJson($dias)
	{
			//dd($dias['lunesI']);
		$json = '{"dias":{"Lunes":"'.$dias["lunesI"].' - '.$dias["lunesF"].'","Martes": "'.$dias["martesI"].' - '.$dias["martesF"].'","Miercoles":"'.$dias["miercolesI"].' - '.$dias["miercolesF"].'","Jueves": "'.$dias["juevesI"].' - '.$dias["juevesF"].'","Viernes": "'.$dias["viernesI"].' - '.$dias["viernesF"].'"}}';
		return $json;
	}



}
