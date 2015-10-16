<?php namespace Sigep\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Sigep\Entities\Asignatura;
use Sigep\Entities\AsignaturaGrupo;
use Sigep\Entities\Docente;
use Sigep\Entities\Horario;
use Sigep\Entities\Periodo;
use Sigep\Entities\User;
use Sigep\Exceptions\Handler;
use Sigep\Http\Requests;
use Sigep\Http\Requests\CreatePeriodoRequest;
use Sigep\Http\Requests\CreateAsignaturaRequest;
use Sigep\Http\Requests\UpdatePeriodoRequest;
use Sigep\Http\Requests\AddAdminRequest;
use Sigep\Http\Requests\UpdateAsignaturaRequest;






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

		if(count($periodos)==0)
		{
			Session::flash('error', 'Actualmente no hay registros');
		}

		return view('homeSuperAdmin',compact('periodos'));
	}

	public function getAddAdmin()
	{
		return view('superAdmin.getAddAdmin');
	}
	public function addAdmin(AddAdminRequest $request)
	{
		$password = bcrypt($request->password);        //obtencion de contraseña
//        dd($request->all());
		$user = User::create($request->all());         //instancia de modelo user con datos recibidos
		$rol = $request->rol;

		$state = User::where('id',$user->id)                    //asignacion de user -> docente
		->update([
			'rol'=>$rol,
			'password'=>$password]);


		Session::flash('message', $user->getNombreCompleto().' fue agregado exitosamente');
		return redirect()->action('AdminController@getAddDocente');
	}



	public function addPeriodo(CreatePeriodoRequest $request)
	{
		$periodo = Periodo::create($request->all());

		Session::flash('message', $periodo->nombre.' fue agregado :D');
		return redirect()->action('SuperAdminController@index');
	}

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




	public function showAsignaturas()
	{
		$asignaturas = Asignatura::all();
		if(count($asignaturas)==0)
		{
			Session::flash('error', 'Actualmente no hay registros');
		}
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
		if(count($horarios)==0)
		{
			Session::flash('error', 'Actualmente no hay registros');
		}
		else
		{
			foreach($horarios as $horario)
			{
				array_push($dias,json_decode($horario->dias));
			}
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


	private function diasJson($dias)
	{
		//dd($dias['lunesI']);
		$json = '{"dias":{"Lunes":"'.$dias["lunesI"].' - '.$dias["lunesF"].'","Martes": "'.$dias["martesI"].' - '.$dias["martesF"].'","Miercoles":"'.$dias["miercolesI"].' - '.$dias["miercolesF"].'","Jueves": "'.$dias["juevesI"].' - '.$dias["juevesF"].'","Viernes": "'.$dias["viernesI"].' - '.$dias["viernesF"].'"}}';
		return $json;
	}

	public function getGraficas()
	{

//		$idPeriodo = $request->get('periodo');
//
		$periodos       = Periodo::all('id','nombre');
		$asignaturas    = Asignatura::all('id','nombre');
//
//
//		$periodo = Periodo::find(1);
//		$idPeriodo = $periodo->id;
//
//		$alumnos 			= Periodo::getAlumnosPorPeriodo($idPeriodo,"");
//		$totAlumnos 		= count($alumnos);
//		$alumnosReprobados 	= Periodo::getAlumnosReprobadosPorPeriodo($idPeriodo,"");
//		$alumnosAprobados 	= $totAlumnos-$alumnosReprobados;
//
////		dd("Alumnos periodo=".count($alumnos),"Aprobados".$alumnosAprobados,"Reprobados".$alumnosReprobados);
//
//		$porcientoAprobados = ($alumnosAprobados/$totAlumnos)*100;
//		$porcientoReprobados = ($alumnosReprobados/$totAlumnos)*100;
//
////		dd($porcientoAprobados,$porcientoReprobados);
//
////		$datos='[{name:"aprobados",y:$porcientoAprobados},{name:"reprobados",y:$porcientoReprobados}]';
//
//		$datos=array(array('name'=>$alumnosAprobados.' alumnos aprobados','y'=>$porcientoAprobados),array('name'=>$alumnosReprobados.' alumnos reprobados','y'=>$porcientoReprobados));
//		$datos = json_encode($datos);
//		$title = "Alumnos reprobados en el Periodo:".$periodo->nombre.".A la fecha actual.";
		return view('superAdmin.graficas',compact('periodos','asignaturas'));
	}

	public function getCustomGrafica(Request $request)
	{
		$periodos       = Periodo::all('id','nombre');
		$asignaturas    = Asignatura::all('id','nombre');

		$title ="Alumnos aprobados/reprobados";
		$idPeriodo 		= $request->get('periodo');
		$idAsignatura 	= $request->get('asignatura');

		if ($idPeriodo==""&&$idAsignatura=="") {

			Session::flash('error','No ingresaste un parametro.');
			return redirect()->action('SuperAdminController@getGraficas');
		}

		$periodo = Periodo::find($idPeriodo);
		$asignatura = Asignatura::find($idAsignatura);


		$alumnos 			= Periodo::getAlumnosPorPeriodo($idPeriodo,$idAsignatura);
		$totAlumnos 		= count($alumnos);
		$alumnosReprobados 	= Periodo::getAlumnosReprobadosPorPeriodo($idPeriodo,$idAsignatura);
		$alumnosAprobados 	= $totAlumnos-$alumnosReprobados;

//		dd("Alumnos periodo=".count($alumnos),"Aprobados".$alumnosAprobados,"Reprobados".$alumnosReprobados);

		$porcientoAprobados = ($alumnosAprobados/$totAlumnos)*100;
		$porcientoReprobados = ($alumnosReprobados/$totAlumnos)*100;

//		dd($porcientoAprobados,$porcientoReprobados);

//		$datos='[{name:"aprobados",y:$porcientoAprobados},{name:"reprobados",y:$porcientoReprobados}]';

		$datos=array(array('name'=>$alumnosAprobados.' alumnos aprobados','y'=>$porcientoAprobados),array('name'=>$alumnosReprobados.' alumnos reprobados','y'=>$porcientoReprobados));
		$datos = json_encode($datos);

		if($idPeriodo!="")
		{
			$title .= " en Periodo:".$periodo->nombre;
		}
		if($idAsignatura!="")
		{
			$title .= " en Asignatura:".$asignatura->nombre;
		}

		$title .= " a la fecha actual.";


		return view('superAdmin.graficas',compact('periodos','asignaturas','datos','title'));
	}




}
