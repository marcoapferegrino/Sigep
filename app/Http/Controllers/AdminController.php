<?php namespace PosgradoService\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\Asignatura;
use PosgradoService\Entities\AsignaturaGrupo;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\Grupo;
use PosgradoService\Entities\Horario;
use PosgradoService\Entities\Inscripcion;
use PosgradoService\Entities\Periodo;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use Illuminate\Support\Facades\DB;
use PosgradoService\Http\Controllers\Controller;
use PosgradoService\Http\Requests\AddAlumnoRequest;
use PosgradoService\Http\Requests\AddAsignaturaGrupoRequest;
use PosgradoService\Http\Requests\AddGrupoRequest;
use PosgradoService\Http\Requests\CreateDocenteRequest;
use PosgradoService\Http\Requests\UpdateGrupoRequest;
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

    public function getAddDocente()   //formulario simple
    {
        return view('admin.addDocente');
    }

    

    public function addDocente(CreateDocenteRequest $request)
    {

        $password = bcrypt($request->password);        //obtencion de contraseña
        $docente = Docente::create($request->all());   //instancia de modelo docente con los datos recibidos
        $user = User::create($request->all());         //instancia de modelo user con datos recibidos
        User::where('id',$user->id)                    //asignacion de user -> docente
            ->update([
            'rol'=>'docente',
            'docente_id'=>$docente->id,
            'password'=>$password]);

        Session::flash('message', $user->getNombreCompleto().' fue agregado exitosamente');
        return redirect()->action('AdminController@getAddDocente');

    }

    public function getAddAlumno()   //formulario simple
    {
        return view('admin.addAlumno');
    }

    public function getAddSalon()   //formulario simple
    {
        $periodos= Periodo::all();
        return view('admin.addSalon',compact('periodos'));
    }

    public function addSalon(AddGrupoRequest $request)
    {

        $grupo = Grupo::create(array('nombre'=>$request->nombre,'salon'=>$request->salon, 'semestre'=>$request->semestre,'periodo_id'=>$request->periodo_id));
        Session::flash('message', $grupo->nombre.' fue agregado exitosamente');
        return redirect()->action('AdminController@getAddSalon');

    }

    public function addGrupo(AddAsignaturaGrupoRequest $request)
    {

        $asignaturaGrupo = AsignaturaGrupo::forceCreate(array('acta'=>$request->acta,'docente_id'=>$request->docente_id,'grupo_id'=>$request->grupo_id,'asignatura_id'=>$request->asignatura_id,'horaDias_id'=>$request->horaDias_id )   );

       // $grupo = Grupo::create(array('nombre'=>$request->nombre,'salon'=>$request->salon, 'semestre'=>$request->semestre,'periodo_id'=>$request->periodo_id));


        Session::flash('message','Su registro fue agregado exitosamente');

        return redirect()->action('AdminController@getAddGrupo');

    }



    public function getAddGrupo()   //formulario simple
    {
        $docentes = User::all()->where('rol','docente');

        $materias = Asignatura::all();


        $gruposAsignaturas = Grupo::all();
        $relaciones = AsignaturaGrupo::all();

        $dias=array();
        $horarios = Horario::all();

        foreach($horarios as $horario)
        {
            array_push($dias,json_decode($horario->dias));
        }
        //dd($dias,$horarios);

        $asignaturasGrupo = array();

        $grupos = Grupo::gruposActuales();

        //dd($grupos);
        foreach($grupos as $grupo)
        {
            array_push($asignaturasGrupo,Grupo::grupoBien($grupo->grupoId));
        }

        return view('admin.addGrupo',compact('grupos','asignaturasGrupo','gruposAsignaturas','materias','docentes','horarios','dias','relaciones'));
    }


    public function getAddInscripcion()   //formulario simple
    {
        $var=0;
        $alumnos = User::getAlumnosAllPagination();
        $alumnosDatos = Alumno::all();
        $gruposAsignaturas = AsignaturaGrupo::all();
        $docentes = User::all()->where('rol','docente');
        $materias = Asignatura::all();

        $asignaturasGrupo = array();
        $grupos = Grupo::gruposActuales();

        foreach($grupos as $grupo)
        {
            array_push($asignaturasGrupo,Grupo::grupoBien($grupo->grupoId));
        }

        return view('admin.addInscripcion',compact('asignaturasGrupo','grupos','alumnos','gruposAsignaturas','docentes','materias','alumnosDatos'));
    }


    public function findAlumnos(Request $request)
    {

        $alumnos = User::getAlumnosBoletaBusqueda($request->get('boleta'));


        $grupos = Grupo::gruposActuales();
        $alumnosDatos = Alumno::all();
        $gruposAsignaturas = AsignaturaGrupo::all();
        $docentes = User::all()->where('rol','docente');
        $materias = Asignatura::all();
        $asignaturasGrupo = array();
        $grupos = Grupo::gruposActuales();

        foreach($grupos as $grupo)
        {
            array_push($asignaturasGrupo,Grupo::grupoBien($grupo->grupoId));
        }
        return view('admin.addInscripcion',compact('asignaturasGrupo','grupos','alumnos','gruposAsignaturas','docentes','materias','alumnosDatos'));
    }

    public function addInscripcion(Request $request)  // inscripcion
    {

        $materias =($request->all());

        //$asignaturaG= AsignaturaGrupo::findOrFail(6);
       // dd($asignaturaG);

        $idAlumno= $request->id;
        $nom=0;
        //foreach($materias as $materia)
        //{
            for($i=0;$i<=count($materias)+8;$i++){

                if(array_key_exists('option'.$i,$materias)){

                    $id=$materias['option'.$i];
                    $asignaturaG= AsignaturaGrupo::findOrFail($id);


                    $materiaIns = Inscripcion::forceCreate(
                        array('alumno_id'=>$idAlumno,
                            'docente_id'=>$asignaturaG->docente_id,
                            'asignatura_id'=>$asignaturaG->asignatura_id,
                            'grupo_id'=>$asignaturaG->grupo_id,
                            'asignatura_grupo_id'=>$asignaturaG->id) );
                    $nom++;

                }
                else{
                }
               // dd($materias);

            }
        Session::flash('message', 'El alumno fue inscrito correctamente en '.$nom .' materias!');

        return redirect()->action('AdminController@getAddInscripcion');
    }


        public function getTestC()   //formulario simple
    {
        return view('testi');
    }


    public function addAlumno(AddAlumnoRequest $request)  //peticion post para addAlumno
    {
        //dd($request->all());
        $password = bcrypt($request->password);
        $alumno = Alumno::create($request->all());

        $user = User::create($request->all());

        User::where('id',$user->id)
            ->update(['rol'=>'alumno','alumno_id'=>$alumno->id,'password'=>$password]);

        Session::flash('message', 'El alumno '.$user->getNombreCompleto().' fue agregado que empiece el juego !');

        //dd($user->toArray(),$alumno->toArray());
        return redirect()->action('AdminController@getAddAlumno');

    }
    public function getAlumnosCalificar()
    {
        $periodos = Periodo::all('id','nombre');
        $asignaturas = Asignatura::all('id','nombre');

        $gruposAsignaturas = User::getAsignaturasGrupos();
        $alumnos = User::getAlumnosInscritos();

//       dd($asignaturas->toArray(),$periodos->toArray());

        return view('docente.calificaciones',compact('gruposAsignaturas','alumnos','periodos','asignaturas'));
    }

    public function asignaturaGrupoPeriodo(Request $request)
    {
        $idPeriodo=$request->periodo;
        $idAsignatura = $request->asignatura;
        //dd($idAsignatura,$idPeriodo);
        $periodos = Periodo::all('id','nombre');
        $asignaturas = Asignatura::all('id','nombre');


        $gruposAsignaturas = User::getAsignaturasGruposbyPeriodo($idPeriodo,$idAsignatura);
        $alumnos = User::getAlumnosInscritosbyPeriodo($idPeriodo,$idAsignatura);

       //dd($gruposAsignaturas,$alumnos);

        return view('docente.calificaciones',compact('gruposAsignaturas','alumnos','periodos','asignaturas'));
    }

    public function getInscritos()
    {

        $gruposAsignaturas = User::getAsignaturasGruposSin();
        $alumnos = User::getAlumnosInscritos();
        return view('admin.listInscritos',compact('gruposAsignaturas','alumnos'));
    }


    public function calificar(Request $request)
    {
        $user = auth()->user();
        $calificaciones = $request->calificaciones;
        $inscripcionesId = $request->inscripcion_ids;


        for($i=0 ; $i<count($calificaciones);$i++)
        {
            if ($calificaciones[$i]!="")
            {
                $user->setCalificacion($inscripcionesId[$i],$calificaciones[$i]);
            }

        }

        Session::flash('message', 'Ya se registraron las calificaciones :D');

        return redirect()->action('AdminController@getAlumnosCalificar');
    }

    public function getGrupos() // lista de grupos
    {

        $grupos = Grupo::all();



        $periodos = Periodo::all();
       // dd($periodos);

        return view('admin.gruposList',compact('grupos','periodos'));

    }

    public function deleteGrupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete();
        return redirect()->action('AdminController@getGrupos');

    }

    public function updateGrupo(UpdateGrupoRequest $request)
    {

        //dd($request->all());
        $grupo = Grupo::find($request->id);

        $grupo->nombre= $request->nombre;
        $grupo->salon= $request->salon;
        $grupo->semestre= $request->semestre;
        $grupo->periodo_id = $request->periodo_id;


        $grupo->save();

        Session::flash('message',$grupo->nombre.' fue Actualizado');
        return redirect()->action('AdminController@getGrupos');
    }





}
