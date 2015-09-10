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
                    <div class="panel-heading"> <h3 class="panel-title">Registro Docente</h3> </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'docente.addDocente','method' => 'post', 'class'=>'form-inline']) !!}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cuenta</h3>
                            </div>

                                <div class="panel-body" >
                                    <div class="form-group">
                                        <a name="cuenta"></a>
                                        {!! Form::label('email', 'Email*') !!}
                                        {!! Form::email('email',null, array('class' => 'form-control','id'=>'email','placeholder'=>'Email','required'))!!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('password', 'Contraseña*') !!}
                                        {!! Form::text('password',null, array('class' => 'form-control','id'=>'password','placeholder'=>'Pon una contraseña','required'))!!}
                                    </div>
                                    <button class="btn btn-primary" id="buttonCurp" type="button">Ayuda generar contraseña <i class="fa fa-cogs"></i></button>
                                </div>

                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading"> <h3 class="panel-title">Datos Personales</h3> </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        {!! Form::label('name', 'Nombre completo*',array('for'=>'name')) !!}
                                        {!! Form::text('name',null, array('class' => 'form-control text-capitalize','id'=>'name','placeholder'=>'Nombre(s)','required','autofocus'))!!}
                                    </div>

                                    <div class="form-group">
                                        {{--{!! Form::label('apellidoP', 'Apellido Paterno') !!}--}}
                                        {!! Form::text('apellidoP',null, array('class' => 'form-control text-capitalize','id'=>'apellidoP','placeholder'=>'Apellido paterno','required'))!!}
                                    </div>

                                    <div class="form-group">
                                        {{--{!! Form::label('apellidoM', 'Apellido Materno') !!}--}}
                                        {!! Form::text('apellidoM',null, array('class' => 'form-control text-capitalize','id'=>'apellidoM','placeholder'=>'Apellido materno','required'))!!}
                                    </div>
                                    <br> <br>

                                    <div class="form-group">
                                        {!! Form::label('fechanac', 'Fecha de nacimiento*') !!}
                                        <input type="date" class="form-control" id="fechanac"  name="fechanac" placeholder="Fecha de nacimiento" required min={{\Carbon\Carbon::now()->subYears(100)}} max={{\Carbon\Carbon::now()->subYears(18)}} >
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('nacionalidad', 'Nacionalidad*') !!}
                                        {!! Form::text('nacionalidad',null, array('class' => 'form-control text-capitalize','id'=>'nacionalidad','placeholder'=>'Nacionalidad','required'))!!}
                                    </div>


                                    <div class="form-group">
                                        {!! Form::label('edoNacimiento', 'Estado*') !!}
                                        {!! Form::text('edoNacimiento',null, array('class' => 'form-control text-capitalize','id'=>'edoNacimiento','placeholder'=>'Estado donde nació','required'))!!}
                                    </div>


                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('genero', 'Género*') !!}
                                        <select class="form-control" name="genero" id="genero" required>
                                            <option value="">- - - -</option>
                                            <option value="Hombre">Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                        </select>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('rfc', 'RFC*') !!}
                                        {!! Form::text('rfc',null, array('class' => 'form-control text-uppercase','id'=>'rfc','placeholder'=>'RFC','required'))!!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('curp', 'CURP*') !!}
                                        {!! Form::text('curp',null, array('class' => 'form-control text-uppercase','id'=>'curp','placeholder'=>'CURP','required'))!!}
                                    </div>
                                    <button class="btn btn-success" id="helpCurp" type="button">Ayuda Curp y RFC <i class="fa fa-cogs"></i></button>
                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('tipoIdOficial', 'Tipo de identificación oficial') !!}
                                        {!! Form::select('tipoIdOficial', config('optionsIdentificaciones.identificaciones'),null,['class'=>'form-control','id'=>'tipoIdOficial','placeholder'=>'¿Qué identificación es?','required'])!!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('noIdOficial', 'Número de  identificación oficial') !!}
                                        {!! Form::text('noIdOficial',null, array('class' => 'form-control','id'=>'noIdOficial','placeholder'=>'¿Cuál es el Id de la identificación?'))!!}
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('direccion', 'Dirección') !!}
                                        {!! Form::text('direccion',null, array('class' => 'form-control text-capitalize','id'=>'direccion','placeholder'=>'Dirección'))!!}
                                    </div>
                                    <div class="form-group">

                                        {!! Form::text('colonia',null, array('class' => 'form-control text-capitalize','id'=>'colonia','placeholder'=>'Colonia '))!!}
                                    </div>
                                    <div class="form-group">

                                        {!! Form::text('ciudad',null, array('class' => 'form-control text-capitalize','id'=>'ciudad','placeholder'=>'Ciudad'))!!}
                                    </div>
                                    <div class="form-group">

                                        {!! Form::text('estado',null, array('class' => 'form-control text-capitalize','id'=>'estado','placeholder'=>'Estado'))!!}
                                    </div>

                                    <div class="form-group">

                                        {!! Form::text('cp',null, array('class' => 'form-control','id'=>'cp','placeholder'=>'Código postal'))!!}
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('telefono', 'Teléfono') !!}
                                        {!! Form::text('telefono',null, array('class' => 'form-control','id'=>'telefono','placeholder'=>'Teléfono del docente'))!!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('telMovil', 'Celular') !!}
                                        {!! Form::text('telMovil',null, array('class' => 'form-control','id'=>'telMovil','placeholder'=>'Celular'))!!}
                                    </div>
                                    <br><br>

                                    <div class="form-group">
                                        {!! Form::label('email2', 'Email2') !!}
                                        {!! Form::email('email2',null, array('class' => 'form-control','id'=>'email2','placeholder'=>'Email adicional'))!!}
                                        <a href="#cuenta"><p class="help-block">El email principal va en la seccion de cuenta</p></a>
                                    </div>
                                    <br><br>

                                    <div class="form-group">
                                        {!! Form::label('web', 'Página web') !!}
                                        {!! Form::text('web',null, array('class' => 'form-control','id'=>'web','placeholder'=>'Dirección web'))!!}
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        {!! Form::label('edoCivil', 'Estado Civil') !!}
                                        {!! Form::text('edoCivil',null, array('class' => 'form-control text-capitalize','id'=>'edoCivil','placeholder'=>'¿Casado, soltero...?'))!!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('numHijos', 'Número de hijos') !!}
                                        {!! Form::number('numHijos',null, array('class' => 'form-control','id'=>'numHijos','placeholder'=>'¿Cuántos hijos tienes?','min'=>0))!!}
                                    </div>
                                    <br><br>

                                    <div class="form-group">
                                        {!! Form::label('status', 'Estado del docente*') !!}
                                        {!! Form::select('status', config('optionsStatusDocente.status'),null,['class'=>'form-control','id'=>'status','placeholder'=>'¿Qué status tiene?','required'])!!}
                                    </div>

                                </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos laborales</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuelaLugarIpn', 'Unidad académica del IPN*') !!}
                                    {!! Form::text('escuelaLugarIpn','Escuela superior de cómputo', array('class' => 'form-control text-capitalize','id'=>'escuelaLugarIpn','placeholder'=>'¿Donde trabaja el docente?', 'required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('extensionIpn', 'Número extensión del IPN ') !!}
                                    {!! Form::text('extensionIpn',null, array('class' => 'form-control','id'=>'extensionIpn','placeholder'=>'Extensión telefónica'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('categoria', 'Categoría del empleado*') !!}
                                    {!! Form::select('categoria', config('categoriasDocente.categorias'),null,['class'=>'form-control','id'=>'categoria','placeholder'=>'¿Qué categoria tiene?','required'])!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('nivel', 'Nivel*') !!}
                                    {!! Form::select('nivel', config('nivelDocente.niveles'),null,['class'=>'form-control','id'=>'nivel','placeholder'=>'¿Qué nivel tiene?','required'])!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('clavePresupuestal', 'Clave presupuestal*') !!}
                                    {!! Form::text('clavePresupuestal',null, array('class' => 'form-control ','id'=>'clavePresupuestal','placeholder'=>'Clave presupuestal del docente','required'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('sip', 'Clave SIP*') !!}
                                    {!! Form::text('sip',null, array('class' => 'form-control text-capitalize','id'=>'sip','required','placeholder'=>'SIP del docente'))!!}
                                </div>
                                <div class="form-group">

                                    {!! Form::label('numEmpleado', 'Número de empleado*') !!}
                                    {!! Form::text('numEmpleado',null, array('class' => 'form-control ','id'=>'numEmpleado','placeholder'=>'Número de empleado del docente','required'))!!}

                                </div>
                                <br><br>
                                <div class="form-group">

                                    {!! Form::label('numTarjetaEscom', 'Número de tarjeta*') !!}
                                    {!! Form::text('numTarjetaEscom',null, array('class' => 'form-control ','required','id'=>'numTarjetaEscom','placeholder'=>'Número de tarjeta ESCOM del docente'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">

                                    {!! Form::label('ingresoIpn', 'Fecha ingreso al IPN*') !!}
                                    <input type="date" class="form-control" id="ingresoIpn"  name="ingresoIpn" required max="{{Carbon\Carbon::now()}}">


                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('observacionesDocente', 'Observaciones del Docente') !!}
                                    {!! Form::textarea('observacionesDocente',null, array('class' => 'form-control','id'=>'observacionesDocente','placeholder'=>'Observaciones sobre del docente'))!!}
                                </div>

                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Licenciatura</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuelaLicenciatura', 'Escuela') !!}
                                    {!! Form::text('escuelaLicenciatura',null, array('class' => 'form-control text-capitalize','id'=>'escuelaLicenciatura','placeholder'=>'Nombre escuela licenciatura'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('localidadLicenciatura', 'Localidad escuela') !!}
                                    {!! Form::text('localidadLicenciatura',null, array('class' => 'form-control text-capitalize','id'=>'localidadLicenciatura','placeholder'=>'Localidad escuela licenciatura'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('carreraLicenciatura', 'Carrera') !!}
                                    {!! Form::text('carreraLicenciatura',null, array('class' => 'form-control ','id'=>'carreraLicenciatura','placeholder'=>'Carrera cursada en escuela licenciatura'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('especialidadLicenciatura', 'Especialidad') !!}
                                    {!! Form::text('especialidadLicenciatura',null, array('class' => 'form-control ','id'=>'carreraLicenciatura','placeholder'=>'Especialidad cursada en escuela licenciatura'))!!}
                                </div>

                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('situacionLicenciatura', 'Situacion') !!}
                                    {!! Form::select('situacionLicenciatura', config('situacionesEstudios.situaciones'),null,['class'=>'form-control','id'=>'situacionLicenciatura'])!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('anioinicialLicenciatura', 'Duración Licenciatura') !!}
                                    {!! Form::number('anioinicialLicenciatura',null, array('class' => 'form-control ','id'=>'anioinicialLicenciatura','placeholder'=>'Año de inicio'))!!}
                                </div>-
                                <div class="form-group">

                                    {!! Form::number('ultimoAnioLicenciatura',null, array('class' => 'form-control ','id'=>'ultimoAnioLicenciatura','placeholder'=>'Año de fin'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('tesisLicenciatura', 'Tesis') !!}
                                    {!! Form::text('tesisLicenciatura',null, array('class' => 'form-control ','id'=>'tesisLicenciatura','placeholder'=>'Nombre de la tesis de licenciatura'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('examenLicenciatura', 'Fecha exámen') !!}

                                    <input type="date" class="form-control" id="examenLicenciatura"  name="examenLicenciatura">
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('cedulaLicenciatura', 'Cédula licenciatura') !!}
                                    {!! Form::text('cedulaLicenciatura',null, array('class' => 'form-control ','id'=>'cedulaLicenciatura','placeholder'=>'Cédula licenciatura'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('observacionesLicenciatura', 'Observaciones licenciatura') !!}
                                    {!! Form::textarea('observacionesLicenciatura',null, array('class' => 'form-control','id'=>'observacionesLicenciatura','placeholder'=>'Observaciones sobre la licenciatura'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Maestría</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuelaMaestria', 'Escuela ') !!}
                                    {!! Form::text('escuelaMaestria',null, array('class' => 'form-control text-capitalize','id'=>'escuelaMaestria','placeholder'=>'Nombre escuela maestría'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('localidadMaestria', 'Localidad escuela ') !!}
                                    {!! Form::text('localidadMaestria',null, array('class' => 'form-control text-capitalize','id'=>'localidadMaestria','placeholder'=>'Localidad escuela maestría'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('carreraMaestria', 'Carrera ') !!}
                                    {!! Form::text('carreraMaestria',null, array('class' => 'form-control ','id'=>'carreraMaestria','placeholder'=>'Carrera cursada en maestría'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('especialidadMaestria', 'Especialidad') !!}
                                    {!! Form::text('especialidadMaestria',null, array('class' => 'form-control ','id'=>'especialidadMaestria','placeholder'=>'Especialidad cursada en maestría'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('situacionEstudiosMaestria', 'Situacion ') !!}
                                    {!! Form::select('situacionEstudiosMaestria', config('situacionesEstudios.situaciones'),null,['class'=>'form-control','id'=>'situacionEstudiosMaestria'])!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('anioIniciaEstudiosMaestria', 'Duración maestría') !!}
                                    {!! Form::number('anioIniciaEstudiosMaestria',null, array('class' => 'form-control ','id'=>'anioIniciaEstudiosMaestria','placeholder'=>'Año de inicio'))!!}
                                </div>-
                                <div class="form-group">
                                    {!! Form::number('ultimoAnioEstudiosMaestria',null, array('class' => 'form-control ','id'=>'ultimoAnioEstudiosMaestria','placeholder'=>'Año de fin'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('tesisMaestria', 'Tesis') !!}
                                    {!! Form::text('tesisMaestria',null, array('class' => 'form-control ','id'=>'tesisMaestria','placeholder'=>'Nombre de la tesis de maestría'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('examenMaestria', 'Fecha examen') !!}
                                    <input type="date" class="form-control" id="examenMaestria"  name="examenMaestria">
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('cedulaMaestria', 'Cédula maestría') !!}
                                    {!! Form::text('cedulaMaestria',null, array('class' => 'form-control ','id'=>'cedulaMaestria','placeholder'=>'Cédula maestría'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('observacionesMaestria', 'Observaciones maestría') !!}
                                    {!! Form::textarea('observacionesMaestria',null, array('class' => 'form-control','id'=>'observacionesMaestria','placeholder'=>'Observaciones sobre la maestria',))!!}
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Doctorado</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuelaDoctorado', 'Escuela') !!}
                                    {!! Form::text('escuelaDoctorado',null, array('class' => 'form-control text-capitalize','id'=>'escuelaDoctorado','placeholder'=>'Nombre escuela doctorado'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('localidadDoctorado', 'Localidad escuela') !!}
                                    {!! Form::text('localidadDoctorado',null, array('class' => 'form-control text-capitalize','id'=>'localidadDoctorado','placeholder'=>'Localidad escuela doctorado'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('carreraDoctorado', 'Carrera') !!}
                                    {!! Form::text('carreraDoctorado',null, array('class' => 'form-control ','id'=>'carreraDoctorado','placeholder'=>'Carrera o equivalente cursado en doctorado'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('especialidadDoctorado', 'Especialidad') !!}
                                    {!! Form::text('especialidadDoctorado',null, array('class' => 'form-control ','id'=>'especialidadDoctorado','placeholder'=>'Especialidad cursada en doctorado'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('situacionEstudiosDoctorado', 'Situacion') !!}
                                    {!! Form::select('situacionEstudiosDoctorado', config('situacionesEstudios.situaciones'),null,['class'=>'form-control','id'=>'situacionEstudiosDoctorado'])!!}

                                </div>
                                <br><br>

                                <div class="form-group">
                                    {!! Form::label('anioiniciaestudiosDoctorado', 'Duración Doctorado') !!}
                                    {!! Form::number('anioiniciaestudiosDoctorado',null, array('class' => 'form-control ','id'=>'anioiniciaestudiosDoctorado','placeholder'=>'Año inicio'))!!}
                                </div>-
                                <div class="form-group">

                                    {!! Form::number('ultimoAnioEstudiosDoctorado',null, array('class' => 'form-control ','id'=>'ultimoAnioEstudiosDoctorado','placeholder'=>'Año fin'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('tesisDoctorado', 'Tesis') !!}
                                    {!! Form::text('tesisDoctorado',null, array('class' => 'form-control ','id'=>'tesisDoctorado','placeholder'=>'Nombre de la tesis de Doctorado'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('examenDoctorado', 'Fecha examen') !!}

                                    <input type="date" class="form-control" id="examenDoctorado"  name="examenDoctorado">
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('cedulaDoctorado', 'Cédula doctorado') !!}
                                    {!! Form::text('cedulaDoctorado',null, array('class' => 'form-control ','id'=>'cedulaDoctorado','placeholder'=>'Cédula doctorado'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('observacionesDoctorado', 'Observaciones doctorado') !!}
                                    {!! Form::textarea('observacionesDoctorado',null, array('class' => 'form-control','id'=>'observacionesDoctorado','placeholder'=>'Observaciones sobre doctorado'))!!}
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
