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
                    <div class="panel-heading"> <h3 class="panel-title">Edición Docente: {{$user->getNombreCompleto()}}</h3> </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'docentes.updateDocente','method' => 'post']) !!}
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cuenta</h3>
                            </div>
                            {!! Form::hidden('idUser',$user->id, array('class' => 'form-control','id'=>'idUser','required'))!!}

                            <div class="panel-body">

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
                                            {!! Form::text('password',null, array('class' => 'form-control','id'=>'password','placeholder'=>'Pon una contraseña'))!!}
                                            <div class="alert alert-warning" role="alert"><strong>Si no editas la constraseña se mantendrá la actual.</strong></div>
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
                                {!! Form::label('name', 'Nombre del docente*',array('for'=>'name')) !!}
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
                                            <input type="date" class="form-control" id="fechanac"  name="fechanac" placeholder="Fecha de nacimiento"  value = {{$user->fechanac}} required min={{\Carbon\Carbon::now()->subYears(100)}} max={{\Carbon\Carbon::now()->subYears(18)}} >
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
                                            {!! Form::text('rfc',$user->rfc, array('class' => 'form-control text-uppercase','id'=>'rfc','placeholder'=>'RFC del docente'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('curp', 'CURP*') !!}
                                            {!! Form::text('curp',$user->curp, array('class' => 'form-control text-uppercase','id'=>'curp','placeholder'=>'CURP del docente','required'))!!}
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
                                {!! Form::label('direccion', 'Dirección del docente') !!}
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
                                            {!! Form::text('telefono',$user->telefono, array('class' => 'form-control','id'=>'telefono','placeholder'=>'Teléfono del docente'))!!}
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
                                            {!! Form::label('edoCivil', 'Estado Civil') !!}
                                            {!! Form::select('edoCivil', config('edoCivil.estados'),$user->edoCivil,['class'=>'form-control','id'=>'edoCivil'])!!}                                        </div>
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

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('email2', 'Email2') !!}
                                            {!! Form::email('email2',$docente->email2, array('class' => 'form-control','id'=>'email2','placeholder'=>'Email adicional'))!!}
                                            <a href="#cuenta"><p class="help-block">El email principal va en la seccion de cuenta</p></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('web', 'Página web') !!}
                                            {!! Form::text('web',$docente->web, array('class' => 'form-control','id'=>'web','placeholder'=>'Dirección web'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('status', 'Estado del docente*') !!}
                                            {!! Form::select('status', config('optionsStatusDocente.status'),$docente->status,['class'=>'form-control','id'=>'status','placeholder'=>'¿Qué status tiene?','required'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos laborales</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('escuelaLugarIpn', 'Unidad académica del IPN*') !!}
                                            {!! Form::text('escuelaLugarIpn',$docente->escuelaLugarIpn, array('class' => 'form-control text-capitalize','id'=>'escuelaLugarIpn','placeholder'=>'¿Donde trabaja el docente?', 'required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('extensionIpn', 'Número extensión del IPN ') !!}
                                            {!! Form::text('extensionIpn',$docente->extensionIpn, array('class' => 'form-control','id'=>'extensionIpn','placeholder'=>'Extensión telefónica'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('categoria', 'Categoría del empleado*') !!}
                                            {!! Form::select('categoria', config('categoriasDocente.categorias'),$docente->categoria,['class'=>'form-control','id'=>'categoria','placeholder'=>'¿Qué categoria tiene?','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('nivel', 'Nivel*') !!}
                                            {!! Form::select('nivel', config('nivelDocente.niveles'),$docente->nivel,['class'=>'form-control','id'=>'nivel','placeholder'=>'¿Qué nivel tiene?','required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('numEmpleado', 'Número de empleado*') !!}
                                            {!! Form::text('numEmpleado',$docente->numEmpleado, array('class' => 'form-control ','id'=>'numEmpleado','placeholder'=>'Número de empleado del docente','required'))!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('sip', 'Clave SIP*') !!}
                                            {!! Form::text('sip',$docente->sip, array('class' => 'form-control text-capitalize','id'=>'sip','required','placeholder'=>'SIP del docente'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('clavePresupuestal', 'Clave presupuestal*') !!}
                                            {!! Form::text('clavePresupuestal',$docente->clavePresupuestal, array('class' => 'form-control ','id'=>'clavePresupuestal','placeholder'=>'Clave presupuestal del docente','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('numTarjetaEscom', 'Número de tarjeta*') !!}
                                            {!! Form::text('numTarjetaEscom',$docente->numTarjetaEscom, array('class' => 'form-control ','required','id'=>'numTarjetaEscom','placeholder'=>'Número de tarjeta ESCOM del docente'))!!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="form-group">
                                            {!! Form::label('ingresoIpn', 'Fecha ingreso al IPN*') !!}
                                            <input type="date" class="form-control" id="ingresoIpn"  name="ingresoIpn" value="{{$docente->ingresoIpn}}" required max="{{Carbon\Carbon::now()}}">
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('observacionesDocente', 'Observaciones del Docente') !!}
                                    {!! Form::textarea('observacionesDocente',$docente->observacionesDocente, array('class' => 'form-control','id'=>'observacionesDocente','placeholder'=>'Observaciones sobre del docente'))!!}
                                </div>

                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Licenciatura</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('escuelaLicenciatura', 'Escuela') !!}
                                            {!! Form::text('escuelaLicenciatura',$docente->escuelaLicenciatura, array('class' => 'form-control text-capitalize','id'=>'escuelaLicenciatura','placeholder'=>'Nombre escuela licenciatura'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('localidadLicenciatura', 'Localidad escuela') !!}
                                            {!! Form::text('localidadLicenciatura',$docente->localidadLicenciatura, array('class' => 'form-control text-capitalize','id'=>'localidadLicenciatura','placeholder'=>'Localidad escuela licenciatura'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('carreraLicenciatura', 'Carrera') !!}
                                            {!! Form::text('carreraLicenciatura',$docente->carreraLicenciatura, array('class' => 'form-control ','id'=>'carreraLicenciatura','placeholder'=>'Carrera cursada en escuela licenciatura'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('especialidadLicenciatura', 'Especialidad') !!}
                                            {!! Form::text('especialidadLicenciatura',$docente->especialidadLicenciatura, array('class' => 'form-control ','id'=>'carreraLicenciatura','placeholder'=>'Especialidad cursada en escuela licenciatura'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::label('situacionLicenciatura', 'Situacion') !!}
                                            {!! Form::select('situacionLicenciatura', config('situacionesEstudios.situaciones'),$docente->situacionLicenciatura,['class'=>'form-control','id'=>'situacionLicenciatura'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                {!! Form::label('anioinicialLicenciatura', 'Duración Licenciatura') !!}
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::number('anioinicialLicenciatura',$docente->anioinicialLicenciatura, array('class' => 'form-control ','id'=>'anioinicialLicenciatura','placeholder'=>'Año de inicio','min'=>1940 , 'max'=>\Carbon\Carbon::now()->year))!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::number('ultimoAnioLicenciatura',$docente->ultimoAnioLicenciatura, array('class' => 'form-control ','id'=>'ultimoAnioLicenciatura','placeholder'=>'Año de fin','min'=>1940 , 'max'=>\Carbon\Carbon::now()->year))!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('tesisLicenciatura', 'Tesis') !!}
                                            {!! Form::text('tesisLicenciatura',$docente->tesisLicenciatura, array('class' => 'form-control ','id'=>'tesisLicenciatura','placeholder'=>'Nombre de la tesis de licenciatura'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('examenLicenciatura', 'Fecha exámen') !!}

                                            <input type="date" class="form-control" id="examenLicenciatura" value="{{$docente->examenLicenciatura}}" name="examenLicenciatura">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('cedulaLicenciatura', 'Cédula licenciatura') !!}
                                            {!! Form::text('cedulaLicenciatura',$docente->cedulaLicenciatura, array('class' => 'form-control ','id'=>'cedulaLicenciatura','placeholder'=>'Cédula licenciatura'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('observacionesLicenciatura', 'Observaciones licenciatura') !!}
                                    {!! Form::textarea('observacionesLicenciatura',$docente->observacionesLicenciatura, array('class' => 'form-control','id'=>'observacionesLicenciatura','placeholder'=>'Observaciones sobre la licenciatura'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Maestría</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('escuelaMaestria', 'Escuela ') !!}
                                            {!! Form::text('escuelaMaestria',$docente->escuelaMaestria, array('class' => 'form-control text-capitalize','id'=>'escuelaMaestria','placeholder'=>'Nombre escuela maestría'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('localidadMaestria', 'Localidad escuela ') !!}
                                            {!! Form::text('localidadMaestria',$docente->localidadMaestria, array('class' => 'form-control text-capitalize','id'=>'localidadMaestria','placeholder'=>'Localidad escuela maestría'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('carreraMaestria', 'Carrera ') !!}
                                            {!! Form::text('carreraMaestria',$docente->carreraMaestria, array('class' => 'form-control ','id'=>'carreraMaestria','placeholder'=>'Carrera cursada en maestría'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('especialidadMaestria', 'Especialidad') !!}
                                            {!! Form::text('especialidadMaestria',$docente->especialidadMaestria, array('class' => 'form-control ','id'=>'especialidadMaestria','placeholder'=>'Especialidad cursada en maestría'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('situacionEstudiosMaestria', 'Situacion ') !!}
                                            {!! Form::select('situacionEstudiosMaestria', config('situacionesEstudios.situaciones'),$docente->situacionEstudiosMaestria,['class'=>'form-control','id'=>'situacionEstudiosMaestria'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                {!! Form::label('anioIniciaEstudiosMaestria', 'Duración maestría') !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            {!! Form::number('anioIniciaEstudiosMaestria',$docente->anioIniciaEstudiosMaestria, array('class' => 'form-control ','id'=>'anioIniciaEstudiosMaestria','placeholder'=>'Año de inicio','min'=>1940 , 'max'=>\Carbon\Carbon::now()->year))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4"><div class="form-group">
                                            {!! Form::number('ultimoAnioEstudiosMaestria',$docente->ultimoAnioEstudiosMaestria, array('class' => 'form-control ','id'=>'ultimoAnioEstudiosMaestria','placeholder'=>'Año de fin','min'=>1940 , 'max'=>\Carbon\Carbon::now()->year))!!}
                                        </div></div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('tesisMaestria', 'Tesis') !!}
                                            {!! Form::text('tesisMaestria',$docente->tesisMaestria, array('class' => 'form-control ','id'=>'tesisMaestria','placeholder'=>'Nombre de la tesis de maestría'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3"><div class="form-group">
                                            {!! Form::label('examenMaestria', 'Fecha examen') !!}
                                            <input type="date" class="form-control" id="examenMaestria" value="{{$docente->examenMaestria}}" name="examenMaestria">
                                        </div></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('cedulaMaestria', 'Cédula maestría') !!}
                                            {!! Form::text('cedulaMaestria',$docente->cedulaMaestria, array('class' => 'form-control ','id'=>'cedulaMaestria','placeholder'=>'Cédula maestría'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('observacionesMaestria', 'Observaciones maestría') !!}
                                    {!! Form::textarea('observacionesMaestria',$docente->observacionesMaestria, array('class' => 'form-control','id'=>'observacionesMaestria','placeholder'=>'Observaciones sobre la maestria',))!!}
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Doctorado</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('escuelaDoctorado', 'Escuela') !!}
                                            {!! Form::text('escuelaDoctorado',$docente->escuelaDoctorado, array('class' => 'form-control text-capitalize','id'=>'escuelaDoctorado','placeholder'=>'Nombre escuela doctorado'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('localidadDoctorado', 'Localidad escuela') !!}
                                            {!! Form::text('localidadDoctorado',$docente->localidadDoctorado, array('class' => 'form-control text-capitalize','id'=>'localidadDoctorado','placeholder'=>'Localidad escuela doctorado'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('carreraDoctorado', 'Carrera') !!}
                                            {!! Form::text('carreraDoctorado',$docente->carreraDoctorado, array('class' => 'form-control ','id'=>'carreraDoctorado','placeholder'=>'Carrera o equivalente cursado en doctorado'))!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('especialidadDoctorado', 'Especialidad') !!}
                                            {!! Form::text('especialidadDoctorado',$docente->especialidadDoctorado, array('class' => 'form-control ','id'=>'especialidadDoctorado','placeholder'=>'Especialidad cursada en doctorado'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('situacionEstudiosDoctorado', 'Situacion') !!}
                                            {!! Form::select('situacionEstudiosDoctorado', config('situacionesEstudios.situaciones'),$docente->situacionEstudiosDoctorado,['class'=>'form-control','id'=>'situacionEstudiosDoctorado'])!!}

                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                {!! Form::label('anioiniciaestudiosDoctorado', 'Duración Doctorado') !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            {!! Form::number('anioiniciaestudiosDoctorado',$docente->anioiniciaestudiosDoctorado, array('class' => 'form-control ','id'=>'anioiniciaestudiosDoctorado','placeholder'=>'Año inicio','min'=>1940 , 'max'=>\Carbon\Carbon::now()->year))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::number('ultimoAnioEstudiosDoctorado',$docente->ultimoAnioEstudiosDoctorado, array('class' => 'form-control ','id'=>'ultimoAnioEstudiosDoctorado','placeholder'=>'Año fin','min'=>1940 , 'max'=>\Carbon\Carbon::now()->year))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('tesisDoctorado', 'Tesis') !!}
                                            {!! Form::text('tesisDoctorado',$docente->tesisDoctorado, array('class' => 'form-control ','id'=>'tesisDoctorado','placeholder'=>'Nombre de la tesis de Doctorado'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('examenDoctorado', 'Fecha examen') !!}

                                            <input type="date" class="form-control" id="examenDoctorado" value="{{$docente->examenDoctorado}}" name="examenDoctorado">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('cedulaDoctorado', 'Cédula doctorado') !!}
                                            {!! Form::text('cedulaDoctorado',$docente->cedulaDoctorado, array('class' => 'form-control ','id'=>'cedulaDoctorado','placeholder'=>'Cédula doctorado'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('observacionesDoctorado', 'Observaciones doctorado') !!}
                                    {!! Form::textarea('observacionesDoctorado',$docente->observacionesDoctorado, array('class' => 'form-control','id'=>'observacionesDoctorado','placeholder'=>'Observaciones sobre doctorado'))!!}
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
