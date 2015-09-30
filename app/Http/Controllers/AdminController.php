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
use PosgradoService\Http\Requests\UpdateAsignaturaGrupoRequest;
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
//        dd($request->all(),$password);
        $docente = Docente::create($request->all());   //instancia de modelo docente con los datos recibidos
        $user = User::create($request->all());         //instancia de modelo user con datos recibidos

        $state = User::where('id',$user->id)                    //asignacion de user -> docente
            ->update([
            'rol'=>'docente',
            'docente_id'=>$docente->id,
            'password'=>$password]);
//        dd($state);

        Session::flash('message', $user->getNombreCompleto().' fue agregado exitosamente');
        return redirect()->action('AdminController@getAddDocente');

    }

    public function addAlumno(AddAlumnoRequest $request)  //peticion post para addAlumno
    {
        //dd($request->all());
        $password   = bcrypt($request->password);
        $alumno     = Alumno::create($request->all());

        $user = User::create($request->all());

        User::where('id',$user->id)
            ->update([
                'rol'=>'alumno',
                'alumno_id'=>$alumno->id,
                'password'=>$password]);

        Session::flash('message', 'El alumno '.$user->getNombreCompleto().' fue agregado que empiece el juego !');

        //dd($user->toArray(),$alumno->toArray());
        return redirect()->action('AdminController@getAddAlumno');

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
        $actual='Todos';

        $gruposAsignaturas = Grupo::all();
        $relaciones = AsignaturaGrupo::asignaturaGrupoPorPeriodo();
        $periodos = Periodo::all();
        $dias=array();
        $horarios = Horario::all();

        foreach($horarios as $horario)
        {
            array_push($dias,json_decode($horario->dias));
        }
        //dd($relaciones);

        $asignaturasGrupo = array();

        $grupos = Grupo::gruposActuales();

        foreach($grupos as $grupo)
        {
            array_push($asignaturasGrupo,Grupo::grupoBien($grupo->grupoId));
        }
        //dd( AsignaturaGrupo::asignaturaGrupoPorPeriodo(2));
        return view('admin.addGrupo',compact('actual','periodos','grupos','asignaturasGrupo','gruposAsignaturas','materias','docentes','horarios','dias','relaciones'));
    }


/*
    public function filtroPeriodo(Request $request)   //formulario simple
    {
        $docentes = User::all()->where('rol','docente');

        $id = $request->periodo_id;
        //dd($id);

        $materias = Asignatura::all();
        $periodos = Periodo::all();
        $gruposAsignaturas =array();

        $interGrupos= Grupo::grupoPorPeriodo($id);

        foreach($interGrupos as $inter)
        {
            array_push($gruposAsignaturas,$inter);
        }

       // $gruposAsignaturas =  Grupo::grupoPorPeriodo($id);

        //dd($gruposAsignaturas);
        $relaciones = AsignaturaGrupo::all();

        $dias=array();
        $actual = Periodo::find($id)->nombre;

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

        return view('admin.addGrupo',compact('actual','periodos','grupos','asignaturasGrupo','gruposAsignaturas','materias','docentes','horarios','dias','relaciones'));
    }

*/

    public function filtroPeriodo(Request $request)   //formulario simple
    {
        $docentes = User::all()->where('rol','docente');

        $id = $request->periodo_id;
        //dd($id);

        $materias = Asignatura::all();
        $periodos = Periodo::all();
        $gruposAsignaturas =array();

        $interGrupos= Grupo::grupoPorPeriodo($id);

        foreach($interGrupos as $inter)
        {
            array_push($gruposAsignaturas,$inter);
        }

       // $gruposAsignaturas =  Grupo::grupoPorPeriodo($id);

        //dd($gruposAsignaturas);
        $relaciones = AsignaturaGrupo::all();

        $dias=array();
        $actual = Periodo::find($id)->nombre;

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

        return view('admin.addGrupo',compact('actual','periodos','grupos','asignaturasGrupo','gruposAsignaturas','materias','docentes','horarios','dias','relaciones'));
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
        if($nom!=0)
        Session::flash('message', 'El alumno fue inscrito correctamente en '.$nom .' asignaturas!');
        else
        Session::flash('error', 'No se inscribieron asigaturas');
        return redirect()->action('AdminController@getAddInscripcion');
    }


        public function getTestC()   //formulario simple
    {
        return view('testi');
    }


    public function getAlumnosCalificar()
    {
        $periodos       = Periodo::all('id','nombre');
        $asignaturas    = Asignatura::all('id','nombre');
        $grupos         = Grupo::all('id','nombre');

        $gruposAsignaturas  = User::getAsignaturasGrupos();
        $alumnos            = User::getAlumnosInscritos();

//       dd($asignaturas->toArray(),$periodos->toArray());

        return view('docente.calificaciones',compact('gruposAsignaturas','alumnos','periodos','asignaturas','grupos'));
    }

    public function asignaturaGrupoPeriodo(Request $request)
    {
        $idPeriodo = $request->periodo;
        $idAsignatura = $request->asignatura;
        $idGrupo = $request->grupo;
//        dd($idAsignatura,$idPeriodo,$idGrupo);
        $periodos = Periodo::all('id', 'nombre');
        $asignaturas = Asignatura::all('id', 'nombre');
        $grupos = Grupo::all('id', 'nombre');

        $gruposAsignaturas = User::getAsignaturasGruposbyPeriodo($idPeriodo, $idAsignatura, $idGrupo);
        $alumnos = User::getAlumnosInscritosbyPeriodo($idPeriodo, $idAsignatura, $idGrupo);

        if (count($gruposAsignaturas) == 0 || count($alumnos) == 0) {
            Session::flash('error', 'No se encontraron resultados con esta búsqueda');
        }
        //dd($gruposAsignaturas,$alumnos);

        return view('docente.calificaciones', compact('gruposAsignaturas', 'alumnos', 'periodos', 'asignaturas', 'grupos'));
    }
        /*
    public function getInscritos(Request $request)
    {


        $id = $request->periodo_id;
        if ($id != null) {
            $gruposAsignaturas = User::getAsignaturasGruposSin();
            $alumnos = Alumno::getAlumnosInscritosPorPeriodo($id);
            $periodos = Periodo::all();

            $actual = Periodo::find($request->periodo_id); // Periodo::find($id)->nombre;
            $actual = $actual['nombre'];
            //var_dump($alumnos);

            return view('admin.listInscritos', compact('actual', 'periodos', 'gruposAsignaturas', 'alumnos'));
        }
    }
        */


        public function getInscritos(Request $request)
    {
        $ids = $request->pe_id;

        $id = $request->periodo_id;
        $periodos = Periodo::all();
        $gruposAsignaturas = User::getAsignaturasGruposSin();
     //   var_dump($ids);
        if ($id != null) {
            $alumnos = Alumno::getAlumnosInscritosPorPeriodo($id);
            $actual = Periodo::find($request->periodo_id); // Periodo::find($id)->nombre;
            $actual = $actual['nombre'];
            // var_dump($alumnos);
        } else {

            $gruposAsignaturas  = User::getAsignaturasGruposSin();
            $alumnos            = User::getAlumnosInscritos();
            $periodos           = Periodo::all();
            $actual = 'Todos';
        }

        return view('admin.listInscritos',compact('actual','periodos','gruposAsignaturas','alumnos'));

    }

/*

    public function getInscritos(Request $request)
    {
        $ids = $request->pe_id;

        $id = $request->periodo_id;
        $periodos = Periodo::all();
        $gruposAsignaturas = User::getAsignaturasGruposSin();
            var_dump($ids);
        if ($id != null) {
            $alumnos = Alumno::getAlumnosInscritosPorPeriodo($id);
            $actual = Periodo::find($request->periodo_id); // Periodo::find($id)->nombre;
            $actual = $actual['nombre'];
           // var_dump($alumnos);
        } else {

        $alumnos = User::getAlumnosInscritos();
        $actual = 'Todos';
    }
=======



        $gruposAsignaturas  = User::getAsignaturasGruposSin();
        $alumnos            = User::getAlumnosInscritos();
        $periodos           = Periodo::all();
        $actual = 'Todos';
>>>>>>> 21e4f74fb6f98228d566209145089f38f2556dad
<<<<<<< HEAD
*/



/*
>>>>>>> 21e4f74fb6f98228d566209145089f38f2556dad
    public function getInscritos()
    {

        $gruposAsignaturas  = User::getAsignaturasGruposSin();
        $alumnos            = User::getAlumnosInscritos();
        $periodos           = Periodo::all();
        $actual = 'Todos';
<<<<<<< HEAD
        $actual_id = 'Todos';
        //dd($alumnos);

        return view('admin.listInscritos',compact('actual_id','actual','periodos','gruposAsignaturas','alumnos'));
    }

=======
        //dd($alumnos);

        return view('admin.listInscritos',compact('actual','periodos','gruposAsignaturas','alumnos'));
    }
    */
    public function filtroInscritosPeriodo(Request $request)
    {

        $id                 = $request->periodo_id;
        $gruposAsignaturas  = User::getAsignaturasGruposSin();
        $alumnos            = Alumno::getAlumnosInscritosPorPeriodo($id);
        $periodos           = Periodo::all();
        $actual             = Periodo::find($request->periodo_id); // Periodo::find($id)->nombre;
        $actual             = $actual['nombre'];
        $actual_id=$id;
        //var_dump($alumnos);


        return view('admin.listInscritos',compact('actual','periodos','gruposAsignaturas','alumnos'));
    }

    public function showKardex($id)
    {
        //$id=10;
        $alumno= Alumno::getKardex($id);
        $maxi= $alumno[count($alumno)-1]->semestre;

        $promedio=Alumno::getPromedio($alumno);


     //dd($alumno);

        return view('alumno.kardex',compact('promedio','alumno','maxi'));

     //dd($alumno);

    }


    public function calificar(Request $request)
    {
        $user = auth()->user();
        $calificaciones     = $request->calificaciones;
        $inscripcionesId    = $request->inscripcion_ids;


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
        $actual = 'Todos';
        $periodos = Periodo::all();
       // dd($periodos);

        return view('admin.gruposList',compact('actual','grupos','periodos'));
    }

    public function getGruposFiltro(Request $request) // lista de grupos
    {
        $id=$request->periodo_id;
        $grupos = Grupo::grupoPorPeriodo($id);
        $periodos = Periodo::all(); //Periodo::all();
        $actual =Periodo::find($id)->nombre;

        //dd($grupos,$actual,$periodos);


        return view('admin.gruposList',compact('actual','grupos','periodos'));
    }
    public function getGruposByPeriodo(Request $request) // lista de grupos
    {
        $id=$request->periodo_id;
        $grupos = Grupo::grupoPorPeriodo($id);
        $periodos = Periodo::all(); //Periodo::all();
        $actual =Periodo::find($id)->nombre;

        //dd($grupos,$actual,$periodos);


        return view('admin.gruposList',compact('actual','grupos','periodos'));
    }

    public function deleteGrupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete();

        Session::flash('message', 'Se ha eliminado el grupo');
        return redirect()->action('AdminController@getGrupos');
    }
    public function deleteInscripcion($id)
    {
        $inscripcion= Inscripcion::findOrFail($id);
        $inscripcion->delete();
        Session::flash('message', 'Se ha eliminado la inscripcion');

        return redirect()->action('AdminController@getInscritos');
    }

    public function updateGrupo(UpdateGrupoRequest $request)
    {

        //dd($request->all());
        $grupo = Grupo::find($request->id);

        $grupo->nombre      = $request->nombre;
        $grupo->salon       = $request->salon;
        $grupo->semestre    = $request->semestre;
        $grupo->periodo_id  = $request->periodo_id;


        $grupo->save();

        Session::flash('message',$grupo->nombre.' fue Actualizado');
        return redirect()->action('AdminController@getGrupos');
    }

    public function updateAsignaturaGrupo(UpdateAsignaturaGrupoRequest $request)
    {
        ///////////////

        //$inscrip = Inscripcion::all();
       // $inscripciones = Inscripcion::where('asignatura_grupo_id',$request->asignatura_grupo_id)->get();

       // $updates = DB:table('inscripciones')
          //      ->(DB::raw('update inscripciones set docente_id='.''.$request->docente_id.''.'where asignatura_grupo_id='.$request->asignatura_grupo_id));

        //$y=0;
       // $inscrip = $inscrip ->where('asignatura_grupo_id',$request->asignatura_grupo_id);
       // dd($inscrip, $request->asignatura_grupo_id, Inscripcion::all());

        //dd($request->asignatura_grupo_id,$inscripciones);
        //dd("UPDATE asignatura_grupo SET docente_id=".$request->docente_id.",asignatura_id=".$request->asignatura_id." WHERE asignatura_grupo_id=".$request->asignatura_grupo_id  );

        DB::statement("SET foreign_key_checks=0");

        DB::statement("UPDATE inscripciones SET docente_id=".$request->docente_id." WHERE asignatura_grupo_id=".$request->asignatura_grupo_id );

        DB::statement("UPDATE asignatura_grupo SET docente_id=".$request->docente_id.",asignatura_id=".$request->asignatura_id." WHERE id=".$request->asignatura_grupo_id );

        DB::statement("SET foreign_key_checks=1");
        /* foreach ( $inscripciones  as $materia) {
                 $materia->docente_id= $request->docente_id;
                 $materia->save();

             }


         $grupo = AsignaturaGrupo::find($request->asignatura_grupo_id);
        // dd($grupo);
         $grupo->docente_id       = $request->docente_id;
         //$grupo->grupo_id       = $request->grupo_id ;
         $grupo->asignatura_id    = $request->asignatura_id;

         // dd($grupo);
         $grupo->save();

         /*
         foreach($inscrip as $materia)
         {
             if($materia->asignatura_grupo_id== $request->asignatura_grupo_id&& $materia->docente_id== $request->docente_id_old ){

                 $y++;
             }

         }
         */



        Session::flash('message','Actualizacion correcta');
        return redirect()->action('AdminController@getAddGrupo');
    }





}
