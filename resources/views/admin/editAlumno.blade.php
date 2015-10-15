@extends('app')

@section('content')
    <style>
        label{
            font: bold 14px 'Roboto';
        }
    </style>
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading"> <h3 class="panel-title">Edición Alumno: {{$user->getNombreCompleto()}}</h3> </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'alumnos.updateAlumno','method' => 'POST']) !!}
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cuenta</h3>
                            </div>
                            <div class="panel-body">
                                {!! Form::hidden('idUser',$user->id, array('class' => 'form-control','id'=>'idUser','required'))!!}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email*') !!}
                                            {!! Form::email('email',$user->email, array('class' => 'form-control','id'=>'email','placeholder'=>'Email','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('password', 'Contraseña*') !!}
                                            {!! Form::password('password', array('class' => 'form-control','id'=>'password','placeholder'=>'Pon una contraseña'))!!}
                                            <div class="alert alert-warning" role="alert"><strong>Si no editas la constraseña se mantendrá la actual.</strong></div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('boleta', 'Número de boleta*') !!}
                                            {!! Form::text('boleta',$alumno->boleta, array('class' => 'form-control','id'=>'boleta','placeholder'=>'Número boleta','required'))!!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-4">
                                            <div class="form-group" id="formGroup">
                                                {!! Form::label('passwordConfirm', 'Verifica Contraseña*',array('id'=>'labelPasswordConfirm')) !!}
                                                {!! Form::password('passwordConfirm', array('class' => 'form-control','id'=>'passwordConfirm','placeholder'=>'De nuevo tu contraseña'))!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" id="buttonCurp" type="button">Ayuda generar contraseña <i class="fa fa-cogs"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos personales</h3>
                            </div>
                            <div class="panel-body">
                                {!! Form::label('name', 'Nombre del Alumno*',array('for'=>'name')) !!}
                                <div class="row">

                                    <div class="col-xs-6 col-md-4">

                                        <div class="form-group">

                                            {!! Form::text('name',$user->name, array('class' => 'form-control text-capitalize','id'=>'name','placeholder'=>'Nombre(s)','required','autofocus'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {{--{!! Form::label('apellidoP', 'Apellido Paterno') !!}--}}
                                            {!! Form::text('apellidoP',$user->apellidoP, array('class' => 'form-control text-capitalize','id'=>'apellidoP','placeholder'=>'Apellido paterno','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">

                                        <div class="form-group">
                                            {{--{!! Form::label('apellidoM', 'Apellido Materno') !!}--}}
                                            {!! Form::text('apellidoM',$user->apellidoM, array('class' => 'form-control text-capitalize','id'=>'apellidoM','placeholder'=>'Apellido materno','required'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('fechanac', 'Fecha de nacimiento*') !!}
                                            <input type="date" class="form-control" id="fechanac" value="{{$user->fechanac}}" name="fechanac" placeholder="Fecha de nacimiento" required min={{\Carbon\Carbon::now()->subYears(100)}} max={{\Carbon\Carbon::now()->subYears(18)}} >
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('nacionalidad', 'Nacionalidad*') !!}
                                            {!! Form::text('nacionalidad',$user->nacionalidad, array('class' => 'form-control text-capitalize','id'=>'nacionalidad','placeholder'=>'Nacionalidad','required'))!!}
                                        </div>

                                    </div>
                                    <div class="col-xs-6 col-md-4">

                                        <div class="form-group">
                                            {!! Form::label('edoNacimiento', 'Estado/Lugar*') !!}
                                            {!! Form::text('edoNacimiento',$user->edoNacimiento, array('class' => 'form-control text-capitalize','id'=>'edoNacimiento','placeholder'=>'Estado donde nació','required'))!!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="form-group">
                                            {!! Form::label('genero', 'Género*') !!}
                                            <select class="form-control" name="genero" id="genero" required>
                                                <option value="{{$user->genero}}">{{$user->genero}}</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('rfc', 'RFC*') !!}
                                            {!! Form::text('rfc',$user->rfc, array('class' => 'form-control text-uppercase','id'=>'rfc','placeholder'=>'RFC del alumno'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('curp', 'CURP*') !!}
                                            {!! Form::text('curp',$user->curp, array('class' => 'form-control text-uppercase','id'=>'curp','placeholder'=>'CURP del alumno','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-success" id="helpCurp" type="button" data-toggle="tooltip" data-placement="top" title="Llena tus datos primero">Ayuda Curp y RFC <i class="fa fa-cogs"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('tipoIdOficial', 'Tipo de identificación oficial*') !!}
                                            {!! Form::select('tipoIdOficial', config('optionsIdentificaciones.identificaciones'),$user->tipoIdOficial,['class'=>'form-control ','id'=>'tipoIdOficial','placeholder'=>'¿Qué identificación es?','required'])!!}
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('noIdOficial', '# de  identificación oficial') !!}
                                            {!! Form::text('noIdOficial',$user->noIdOficial, array('class' => 'form-control ','id'=>'noIdOficial','placeholder'=>'¿Cuál es el Id de la identificación?'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                {!! Form::label('direccion', 'Dirección del alumno') !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::text('direccion',$user->direccion, array('class' => 'form-control text-capitalize','id'=>'direccion','placeholder'=>'Dirección'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('colonia',$user->colonia, array('class' => 'form-control text-capitalize','id'=>'colonia','placeholder'=>'Colonia '))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('ciudad',$user->ciudad, array('class' => 'form-control text-capitalize','id'=>'ciudad','placeholder'=>'Ciudad',))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('estado',$user->estado, array('class' => 'form-control text-capitalize','id'=>'estado','placeholder'=>'Estado'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('cp',$user->cp, array('class' => 'form-control','id'=>'cp','placeholder'=>'C.P'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('telefono', 'Teléfono') !!}
                                            {!! Form::text('telefono',$user->telefono, array('class' => 'form-control','id'=>'telefono','placeholder'=>'Teléfono del alumno'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('telMovil', 'Celular') !!}
                                            {!! Form::text('telMovil',$user->telMovil, array('class' => 'form-control','id'=>'telMovil','placeholder'=>'Celular'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('edocivil', 'Estado Civil') !!}
                                            {!! Form::select('edoCivil', config('edoCivil.estados'),$user->edoCivil,['class'=>'form-control','id'=>'edoCivil'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('numHijos', 'Número de hijos') !!}
                                            {!! Form::number('numHijos',$user->numHijos, array('class' => 'form-control','id'=>'numHijos','placeholder'=>'¿Cuántos hijos tienes?','min'=>0))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('viveCon', '¿Con quién vive?') !!}
                                            {!! Form::select('viveCon', config('optionsViveCon.options'),$alumno->viveCon,['class'=>'form-control','id'=>'viveCon'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            {!! Form::label('dependEconomic', '¿De quién depende económicamente?') !!}
                                            {!! Form::select('dependEconomic', config('optionsViveCon.options'),$alumno->dependEconomic,['class'=>'form-control','id'=>'dependEconomic'])!!}

                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Último grado académico</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('escuela', 'Escuela*') !!}
                                            {!! Form::text('escuela',$alumno->escuela, array('class' => 'form-control','id'=>'escuela','placeholder'=>'¿En cuál escuela?','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('carrera', 'Carrera*') !!}
                                            {!! Form::text('carrera',$alumno->carrera, array('class' => 'form-control','id'=>'carrera','placeholder'=>'¿Cuál es tu carrera?','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('especialidadCarrera', 'Especialidad de carrera') !!}
                                            {!! Form::text('especialidadCarrera',$alumno->especialidadCarrera, array('class' => 'form-control text-capitalize','id'=>'especialidadCarrera','placeholder'=>'¿Qué especialidad?'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('localidadEstudios', 'Localidad de estudios*') !!}
                                            {!! Form::text('localidadEstudios',$alumno->localidadEstudios, array('class' => 'form-control text-capitalize','id'=>'localidadEstudios','placeholder'=>'Puebla, Veracruz','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('gradoDeEstudios', 'Grado de estudios*') !!}
                                            {!! Form::select('gradoDeEstudios', config('gradosEstudios.estudios'),$alumno->gradoDeEstudios,['class'=>'form-control','id'=>'gradoDeEstudios','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('situacionEstudios', 'Situación de estudios*') !!}
                                            {!! Form::select('situacionEstudios', config('situacionesEstudios.situaciones'),$alumno->situacionEstudios,['class'=>'form-control','id'=>'situacionEstudios','required'])!!}

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('califEstudios', 'Promedio general*') !!}
                                            {!! Form::number('califEstudios',$alumno->califEstudios, array('class' => 'form-control','id'=>'califEstudios','placeholder'=>'¿Calificación?','required','min'=>6,'max'=>10, 'step'=>'any'))!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('aniosEstudios', 'Años de estudios*') !!}
                                            {!! Form::number('aniosEstudios',$alumno->aniosEstudios, array('class' => 'form-control','id'=>'aniosEstudios','placeholder'=>'','required','min'=>1))!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('observacionEstudios', 'Observaciones de estudios') !!} <br><br>
                                    {!! Form::textarea('observacionEstudios',$alumno->observacionEstudios, array('class' => 'form-control','id'=>'observacionEstudios','placeholder'=>'¿Obervaciones de los estudios del alumno?'))!!}
                                </div>

                            </div>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Conocimientos profesionales</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('empresaUltimoEmpleo', 'Empresa del último empleo') !!}
                                            {!! Form::text('empresaUltimoEmpleo',$alumno->empresaUltimoEmpleo, array('class' => 'form-control text-capitalize','id'=>'empresaUltimoEmpleo','placeholder'=>'Empresa'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('puestoCategUltimoEmpleo', 'Puesto') !!}
                                            {!! Form::text('puestoCategUltimoEmpleo',$alumno->puestoCategUltimoEmpleo, array('class' => 'form-control text-capitalize','id'=>'puestoCategUltimoEmpleo','placeholder'=>'¿Qué puesto tenias?'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('jefeInmediatoUltimoEmpleo', 'Jefe inmediato') !!}
                                            {!! Form::text('jefeInmediatoUltimoEmpleo',$alumno->jefeInmediatoUltimoEmpleo, array('class' => 'form-control text-capitalize','id'=>'jefeInmediatoUltimoEmpleo','placeholder'=>'Nombre del jefe'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('telefonoUltimoEmpleo', 'Teléfono') !!}
                                            {!! Form::text('telefonoUltimoEmpleo',$alumno->telefonoUltimoEmpleo, array('class' => 'form-control','id'=>'telefonoUltimoEmpleo','placeholder'=>'Teléfono del empleo'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('fechaIngresoUltimoEmpleo', 'Fecha ingreso al trabajo') !!}
                                            <input type="date" class="form-control" value="{{$alumno->fechaIngresoUltimoEmpleo}}" id="fechaIngresoUltimoEmpleo"  name="fechaIngresoUltimoEmpleo"  }}  >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('fechaTerminoUltimoEmpleo', 'Fecha fin del trabajo') !!}
                                            <input type="date" class="form-control" value="{{$alumno->fechaTerminoUltimoEmpleo}}" id="fechaTerminoUltimoEmpleo"  name="fechaTerminoUltimoEmpleo">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('actividadesUltimoEmpleo', 'Actividades del último empleo') !!}
                                    <br>
                                    {!! Form::textarea('actividadesUltimoEmpleo',$alumno->actividadesUltimoEmpleo, array('class' => 'form-control','id'=>'actividadesUltimoEmpleo','placeholder'=>'¿Qué hacias en tu último empleo?'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('motivosSeparacionUltimoEmpleo', 'Motivos de separación de la empresa') !!}<br>
                                    {!! Form::textarea('motivosSeparacionUltimoEmpleo',$alumno->motivosSeparacionUltimoEmpleo, array('class' => 'form-control','id'=>'motivosSeparacionUltimoEmpleo','placeholder'=>'¿Por qué te separaste de la empresa?'))!!}
                                </div>



                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Conocimientos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('actividadesQueConoce', 'Actividades que sabe') !!} <br>
                                    {!! Form::textarea('actividadesQueConoce',$alumno->actividadesQueConoce, array('class' => 'form-control','id'=>'actividadesQueConoce','placeholder'=>'FrontEnd,BackEnd, Criptografía, DBA'))!!}
                                </div>



                                <div class="form-group">
                                    {!! Form::label('conocimientoSoftware', 'Conocimientos de software') !!}<br>
                                    {!! Form::textarea('conocimientoSoftware',$alumno->conocimientoSoftware, array('class' => 'form-control','id'=>'conocimientoSoftware','placeholder'=>'Software que conoce'))!!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('obsconocimientos', 'Otros conocimientos') !!}<br>
                                    {!! Form::textarea('obsconocimientos',$alumno->obsconocimientos, array('class' => 'form-control','id'=>'obsconocimientos','placeholder'=>'Otros conocimientos'))!!}
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Referencias</h3>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref1Nombre', 'Nombre 1  ') !!}
                                                {!! Form::text('ref1Nombre',$alumno->ref1Nombre, array('class' => 'form-control text-capitalize','id'=>'ref1Nombre','placeholder'=>'Nombre '))!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref1Afinidad', 'Afinidad ') !!}
                                                {!! Form::select('ref1Afinidad', config('optionsAfinidad.parentezcos'),$alumno->ref1Afinidad,['class'=>'form-control text-capitalize','id'=>'ref1Afinidad','placeholder'=>'¿Que eres de él/ella?'])!!}

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref1Tiempoconocerlo', 'Tiempo de conocerlo') !!}
                                                {!! Form::select('ref1Tiempoconocerlo', config('tiempoConocerlo.anios'),$alumno->ref1Tiempoconocerlo,['class'=>'form-control','id'=>'ref1Tiempoconocerlo','placeholder'=>'¿Cuántos años?'])!!}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref1Domicilio', 'Domicilio ') !!}
                                                {!! Form::text('ref1Domicilio',$alumno->ref1Domicilio, array('class' => 'form-control text-capitalize','id'=>'ref1Domicilio','placeholder'=>'Domicilio de la referencia'))!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref1Telefono', 'Teléfono') !!}
                                                {!! Form::text('ref1Telefono',$alumno->ref1Telefono, array('class' => 'form-control','id'=>'ref1Telefono','placeholder'=>'Teléfono de la referencia'))!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref2Nombre', 'Nombre 2 ') !!}
                                                {!! Form::text('ref2Nombre',$alumno->ref2Nombre, array('class' => 'form-control text-capitalize','id'=>'ref2Nombre','placeholder'=>'Nombre '))!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref2Afinidad', 'Afinidad ') !!}
                                                {!! Form::select('ref2Afinidad', config('optionsAfinidad.parentezcos'),$alumno->ref2Afinidad,['class'=>'form-control text-capitalize','id'=>'ref2Afinidad','placeholder'=>'¿Que eres de él/ella?'])!!}                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref2Tiempoconocerlo', 'Tiempo de conocerlo') !!}
                                                {!! Form::select('ref2Tiempoconocerlo', config('tiempoConocerlo.anios'),$alumno->ref2Tiempoconocerlo,['class'=>'form-control','id'=>'ref2Tiempoconocerlo','placeholder'=>'¿Cuántos años?'])!!}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref2Domicilio', 'Domicilio ') !!}
                                                {!! Form::text('ref2Domicilio',$alumno->ref2Domicilio, array('class' => 'form-control text-capitalize','id'=>'ref2Domicilio','placeholder'=>'Domicilio de la referencia'))!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('ref2Telefono', 'Teléfono') !!}
                                                {!! Form::text('ref2Telefono',$alumno->ref2Telefono, array('class' => 'form-control','id'=>'ref2Telefono','placeholder'=>'Teléfono de la referencia'))!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Guardar',array('class'=>'btn btn-success btn-lg btn-block')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="/js/genPassword.js"></script>
@endsection