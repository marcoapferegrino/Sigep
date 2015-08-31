<?php namespace PosgradoService\Http\Controllers;


use Illuminate\Support\Facades\Session;
use PosgradoService\Entities\Alumno;
use PosgradoService\Entities\Docente;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Controllers\Controller;
use PosgradoService\Http\Requests\AddAlumnoRequest;
use PosgradoService\Http\Requests\CreateDocenteRequest;
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

        //dd($request->all());
        $password = bcrypt($request->password);        //obtencion de contraseña
        $docente = Docente::create($request->all());   //instancia de modelo docente con los datos recibidos
        $user = User::create($request->all());         //instancia de modelo user con datos recibidos
        User::where('id',$user->id)                    //asignacion de user -> docente
            ->update(['rol'=>'docente','docente_id'=>$docente->id,'password'=>$password]);

        Session::flash('message', $docente->nombre.' fue agregado exitosamente');
        return redirect()->action('AdminController@getAddDocente');

    }

    public function getAddAlumno()   //formulario simple
    {
        return view('admin.addAlumno');
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

        Session::flash('message', 'El alumno '.$user->name.' '.$user->apellidoP.' '.$user->apellidoM.' fue agregado que empiece el juego !');

        //dd($user->toArray(),$alumno->toArray());
        return redirect()->action('AdminController@getAddAlumno');

    }






}
