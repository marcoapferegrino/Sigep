<?php namespace PosgradoService\Http\Controllers;

use PosgradoService\Http\Requests;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use PosgradoService\Entities\User;
use PosgradoService\Entities\Alumno;
use PosgradoService\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AlumnoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('homeAlumno');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        //
    }


    public function showKardex()
    {
        //$id=10;
        $id =auth()->user()->alumno_id;
        $alumno= Alumno::getKardex($id);
        if($alumno!=null){
            $promedio=Alumno::getPromedio($alumno);
            $maxi= $alumno[count($alumno)-1]->semestre;

            return view('alumno.kardex',compact('promedio','alumno','maxi'));
        }
        else{

            Session::flash('error', 'No hay datos disponibles del kárdex');
            return view('homeAlumno');
            //dd("NO hay");
        }

    }



    public function showKardexPeriodo()
    {
        //$id=10;
        $id =auth()->user()->alumno_id;
        $misPeriodos=array();

        $alumno= Alumno::getKardexPeriodo($id);



        if($alumno!=null){
            $promedio=Alumno::getPromedio($alumno);
            //$maxi= $alumno[count($alumno)-1]->semestre;


            array_push($misPeriodos,$alumno[0]->nombrePeriodo);

            foreach($alumno as $k=>$materia)
            {
                if(($materia->nombrePeriodo)!=($misPeriodos[count($misPeriodos)-1])){
                    array_push($misPeriodos,$materia->nombrePeriodo);
                }
            }
            //ya tenemos todos los periodos sin repetir
            $promediosPeriodos=Alumno::getPromedioPeriodo($alumno,$misPeriodos);
            //calculamos promedio por periodo


            return view('alumno.kardexPeriodo',compact('promediosPeriodos','promedio','alumno','misPeriodos'));
        }
        else{

            Session::flash('error', 'No hay datos disponibles del kárdex');
            return view('homeAlumno');
        }

    }




    public function getCalificaciones()
    {


        $gruposAsignaturas = Alumno::getCalificaciones();

        if($gruposAsignaturas ==null){


            Session::flash('error', 'No hay asignaturas disponibles ');
            return view('alumno.calificacionesAlumno', compact('gruposAsignaturas') );

        }
        return view('alumno.calificacionesAlumno', compact('gruposAsignaturas') );


        //
    }

    public function getHorarioAlumno()
    {

        $dias = array();

        $horarios=Alumno::getHorarioDeAlumno();

        foreach($horarios as $horario)
        {
            array_push($dias,json_decode($horario->dias));
        }
        //dd($dias,$horarios);

        if($horarios==null){


            Session::flash('error', 'No hay horario actual');

            return view('alumno.alumnoHorario', compact('horarios','dias') );
        }

        return view('alumno.alumnoHorario', compact('horarios','dias') );


        //
    }

    public function showExpediente($id)
    {
        //dd((auth()->user()->alumno_id));
        if((auth()->user()->alumno_id!=null)){

            $idAlumno= auth()->user()->alumno_id;
            $user =  User::where('alumno_id',$idAlumno)
                ->get();
            if($user==null){
                Session::flash('error', 'No existe alumno');
                return view('homeAlumno');
            }
            else{
                //dd($user[0]->alumno_id);

                $alumno = Alumno::find($user[0]->alumno_id);

                //dd($user,$alumno);

                return view('docente.expediente', compact('user', 'alumno'));
            }



        }else {
            $user = auth()->user();
            $idDocente = $user->docente_id;
            $estado = false;


            //Obtenemos alumnos del docente
            $alumnos = User::getAlumnosdeDocenteActually($idDocente);

            //buscamos entre los alumnos del docente el ID del alumno solicitado
            foreach ($alumnos as $alumno) {
                if ($alumno->userId == $id) {
                    $estado = true;
                }

            }
            //si si esta lo buscamos en la BD
            if ($estado == true || $user->rol = 'superAdmin') {
                $user = User::find($id);
                $alumno = Alumno::find($user->alumno_id);
                //dd($user->toArray(),$alumno->toArray());
                return view('docente.expediente', compact('user', 'alumno'));
            } else abort(404); //si no esta dentro de los alumnos del docente not found
        }

    }



}

