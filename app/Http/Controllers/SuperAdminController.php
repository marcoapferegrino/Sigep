<?php namespace PosgradoService\Http\Controllers;

use Illuminate\Support\Facades\Session;
use PosgradoService\Entities\Asignatura;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\Programa;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Controllers\Controller;
use PosgradoService\Http\Requests\CreatePeriodoRequest;
use PosgradoService\Http\Requests\CreateProgramaRequest;
use PosgradoService\Http\Requests\CreateAsignaturaRequest;

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



}
