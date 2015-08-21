<?php namespace PosgradoService\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PosgradoService\Entities\Asignatura;
use PosgradoService\Entities\Horario;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\Programa;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Requests\CreatePeriodoRequest;
use PosgradoService\Http\Requests\CreateProgramaRequest;
use PosgradoService\Http\Requests\CreateAsignaturaRequest;
use PosgradoService\Http\Requests\CreateHorarioRequest;

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
		$periodo->delete();

		Session::flash('message', $periodo->nombre.' fue eliminado :D');
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
