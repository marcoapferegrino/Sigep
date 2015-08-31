<?php namespace PosgradoService\Http\Controllers;

use Illuminate\Support\Facades\Session;
use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Controllers\Controller;
use PosgradoService\Http\Requests\AddAlumnoRequest;
use Illuminate\Http\Request;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


		return view('homeAdmin');
	}


	public function getAddAlumno()
	{
		return view('admin.addAlumno');
	}

	public function addAlumno(AddAlumnoRequest $request)
	{
		//dd($request->all());
		$password = bcrypt($request->password);
		$alumno = Alumno::create($request->all());

		$user = User::create($request->all());

		User::where('id',$user->id)
			->update(['rol'=>'alumno','alumno_id'=>$alumno->id,'password'=>$password]);

		Session::flash('message', 'El alumno '.$user->name.' '.$user->apellidoP.' '.$user->apellidoM.' fue agregado que empiece el juego !');

		//dd($user->toArray(),$alumno->toArray());
		return redirect()->action('AdminController@getAddAlumno');

	}




}
