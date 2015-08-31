@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading"> <h3 class="panel-title">Registro Docente</h3> </div>
                    <div class="panel-body">
                        <div class="form-body">

                            {!! Form::open(['route' => 'docente.addDocente','method' => 'post', 'class'=>'form-inline']) !!}
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos personales</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group">
                                            {!! Form::label('name', 'Nombre completo del Docente*',array('for'=>'name')) !!}
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
                                            {!! Form::label('rfc', 'RFC') !!}
                                            {!! Form::text('rfc',null, array('class' => 'form-control','id'=>'rfc','placeholder'=>'RFC del Docente'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('curp', 'CURP*') !!}
                                            {!! Form::text('curp',null, array('class' => 'form-control','id'=>'curp','placeholder'=>'CURP del Docente','required'))!!}
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            {!! Form::label('tipoIdOficial', 'Tipo de identificación oficial*') !!}
                                            {!! Form::text('tipoIdOficial',null, array('class' => 'form-control','id'=>'tipoIdOficial','placeholder'=>'¿Qué identificación es?','required'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('noIdOficial', 'Número de  identificación oficial*') !!}
                                            {!! Form::text('noIdOficial',null, array('class' => 'form-control','id'=>'noIdOficial','placeholder'=>'¿Cuál es el Id de la identificación?','required'))!!}
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            {!! Form::label('direccion', 'Dirección del Docente*') !!}
                                            {!! Form::text('direccion',null, array('class' => 'form-control text-capitalize','id'=>'direccion','placeholder'=>'Dirección','required'))!!}
                                        </div>
                                        <div class="form-group">

                                            {!! Form::text('colonia',null, array('class' => 'form-control text-capitalize','id'=>'colonia','placeholder'=>'Colonia ','required'))!!}
                                        </div>
                                        <div class="form-group">

                                            {!! Form::text('ciudad',null, array('class' => 'form-control text-capitalize','id'=>'ciudad','placeholder'=>'Ciudad','required'))!!}
                                        </div>
                                        <div class="form-group">

                                            {!! Form::text('estado',null, array('class' => 'form-control text-capitalize','id'=>'estado','placeholder'=>'Estado','required'))!!}
                                        </div>

                                        <div class="form-group">

                                            {!! Form::text('cp',null, array('class' => 'form-control','id'=>'cp','placeholder'=>'Código postal','required'))!!}
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            {!! Form::label('telefono', 'Teléfono*') !!}
                                            {!! Form::text('telefono',null, array('class' => 'form-control','id'=>'telefono','placeholder'=>'Teléfono del docente','required'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('telMovil', 'Celular*') !!}
                                            {!! Form::text('telMovil',null, array('class' => 'form-control','id'=>'telMovil','placeholder'=>'Celular','required'))!!}
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email1*') !!}
                                            {!! Form::email('email',null, array('class' => 'form-control','id'=>'email','placeholder'=>'Email de docente','required'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email2', 'Email2') !!}
                                            {!! Form::email('email2',null, array('class' => 'form-control','id'=>'email2','placeholder'=>'Email adicional'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('web', 'Página web') !!}
                                            {!! Form::text('web',null, array('class' => 'form-control','id'=>'web','placeholder'=>'Dirección web'))!!}
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            {!! Form::label('edoCivil', 'Estado Civil*') !!}
                                            {!! Form::text('edoCivil',null, array('class' => 'form-control text-capitalize','id'=>'edoCivil','placeholder'=>'¿Casado, soltero...?','required'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('numHijos', 'Número de hijos*') !!}
                                            {!! Form::number('numHijos',null, array('class' => 'form-control','id'=>'numHijos','placeholder'=>'¿Cuántos hijos tienes?','required','min'=>0))!!}
                                        </div>
                                        <br><br>
                                        {{--<div class="form-group">--}}
                                            {{--{!! Form::label('viveCon', '¿Con quién vive?*') !!}--}}
                                            {{--{!! Form::text('viveCon',null, array('class' => 'form-control text-capitalize','id'=>'viveCon','placeholder'=>'¿Vive con alguien?','required'))!!}--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            {!! Form::label('status', 'Estado del docente*') !!}
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="">- - - -</option>
                                                <option value="Activo">Activo</option>
                                                <option value="Sabatico">En año sabático</option>
                                                <option value="De baja">Dado de baja</option>
                                            </select>
                                        </div>


                                    </div>



                        </div>
                    </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos acádemicos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuelaLugarIpn', 'Unidad académica*') !!}
                                    {!! Form::text('escuelaLugarIpn',null, array('class' => 'form-control text-capitalize','id'=>'escuelaLugarIpn','placeholder'=>'¿Donde trabaja el docente?', 'required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('extensionIpn', 'Número extensión') !!}
                                    {!! Form::text('extensionIpn',null, array('class' => 'form-control','id'=>'extensionIpn','placeholder'=>'Extensión telefónica'))!!}
                                </div>
                                <br><br>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos nivel licenciatura</h3>
                                    </div>
                                    <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuelaLicenciatura', 'Escuela licenciatura*') !!}
                                    {!! Form::text('escuelaLicenciatura',null, array('class' => 'form-control text-capitalize','id'=>'escuelaLicenciatura','placeholder'=>'Nombre escuela licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('localidadLicenciatura', 'Localidad escuela licenciatura*') !!}
                                    {!! Form::text('localidadLicenciatura',null, array('class' => 'form-control text-capitalize','id'=>'localidadLicenciatura','placeholder'=>'Localidad escuela licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('carreraLicenciatura', 'Carrera licenciatura*') !!}
                                    {!! Form::text('carreraLicenciatura',null, array('class' => 'form-control ','id'=>'carreraLicenciatura','placeholder'=>'Carrera cursada en escuela licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('especialidadLicenciatura', 'Especialidad licenciatura*') !!}
                                    {!! Form::text('especialidadLicenciatura',null, array('class' => 'form-control ','id'=>'carreraLicenciatura','placeholder'=>'Especialidad cursada en escuela licenciatura','required'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('situacionLicenciatura', 'Situacion licenciatura*') !!}
                                    <select class="form-control" name="situacionLicenciatura" id="situacionLicenciatura" required>
                                        <option value="">- - - -</option>
                                        <option value="Terminada">Terminada</option>
                                        <option value="Trunca">Trunca</option>
                                        <option value="En progreso">En progreso</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('anioinicialLicenciatura', 'Año inicio licenciatura*') !!}
                                    {!! Form::text('anioinicialLicenciatura',null, array('class' => 'form-control ','id'=>'anioinicialLicenciatura','placeholder'=>'Año en que inició la licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('ultimoAnioLicenciatura', 'Año fin licenciatura*') !!}
                                    {!! Form::text('ultimoAnioLicenciatura',null, array('class' => 'form-control ','id'=>'ultimoAnioLicenciatura','placeholder'=>'Año en que terminó la licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('tesisLicenciatura', 'Tesis licenciatura*') !!}
                                    {!! Form::text('tesisLicenciatura',null, array('class' => 'form-control ','id'=>'tesisLicenciatura','placeholder'=>'Nombre de la tesis de licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('examenLicenciatura', 'Fecha examen licenciatura*') !!}

                                    <input type="date" class="form-control" id="examenLicenciatura"  name="examenLicenciatura">
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cedulaLicenciatura', 'Cédula licenciatura*') !!}
                                    {!! Form::text('cedulaLicenciatura',null, array('class' => 'form-control ','id'=>'cedulaLicenciatura','placeholder'=>'Cédula licenciatura','required'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('observacionesLicenciatura', 'Observaciones licenciatura*') !!}
                                    {!! Form::textarea('observacionesLicenciatura',null, array('class' => 'form-control','id'=>'observacionesLicenciatura','placeholder'=>'Observaciones sobre la licenciatura','required'))!!}
                                </div>
                                </div>
                                </div><!-- Fin licenciatura -->


                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos nivel maestría</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            {!! Form::label('escuelaMaestria', 'Escuela maestría') !!}
                                            {!! Form::text('escuelaMaestria',null, array('class' => 'form-control text-capitalize','id'=>'escuelaMaestria','placeholder'=>'Nombre escuela maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('localidadMaestria', 'Localidad escuela maestría') !!}
                                            {!! Form::text('localidadMaestria',null, array('class' => 'form-control text-capitalize','id'=>'localidadMaestria','placeholder'=>'Localidad escuela maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('carreraMaestria', 'Carrera maestria') !!}
                                            {!! Form::text('carreraMaestria',null, array('class' => 'form-control ','id'=>'carreraMaestria','placeholder'=>'Carrera cursada en maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('especialidadMaestria', 'Especialidad licenciatura') !!}
                                            {!! Form::text('especialidadMaestria',null, array('class' => 'form-control ','id'=>'especialidadMaestria','placeholder'=>'Especialidad cursada en maestría'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('situacionEstudiosMaestria', 'Situacion maestria') !!}
                                            <select class="form-control" name="situacionEstudiosMaestria" id="situacionEstudiosMaestria" >
                                                <option value="">- - - -</option>
                                                <option value="Terminada">Terminada</option>
                                                <option value="Trunca">Trunca</option>
                                                <option value="En progreso">En progreso</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            {!! Form::label('anioIniciaEstudiosMaestria', 'Año inicio maestría') !!}
                                            {!! Form::text('anioIniciaEstudiosMaestria',null, array('class' => 'form-control ','id'=>'anioIniciaEstudiosMaestria','placeholder'=>'Año en que inició la maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('ultimoAnioEstudiosMaestria', 'Año fin maestría') !!}
                                            {!! Form::text('ultimoAnioEstudiosMaestria',null, array('class' => 'form-control ','id'=>'ultimoAnioEstudiosMaestria','placeholder'=>'Año en que terminó la maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('tesisMaestria', 'Tesis maestría') !!}
                                            {!! Form::text('tesisMaestria',null, array('class' => 'form-control ','id'=>'tesisMaestria','placeholder'=>'Nombre de la tesis de maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('examenMaestria', 'Fecha examen maestría') !!}

                                            <input type="date" class="form-control" id="examenMaestria"  name="examenMaestria">
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('cedulaMaestria', 'Cédula maestría') !!}
                                            {!! Form::text('cedulaMaestria',null, array('class' => 'form-control ','id'=>'cedulaMaestria','placeholder'=>'Cédula maestría'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('observacionesMaestria', 'Observaciones maestría') !!}
                                            {!! Form::textarea('observacionesMaestria',null, array('class' => 'form-control','id'=>'observacionesMaestria','placeholder'=>'Observaciones sobre la maestria',))!!}
                                        </div>
                                    </div>
                                </div><!-- Fin maestria -->


                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos nivel Doctorado</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            {!! Form::label('escuelaDoctorado', 'Escuela Doctorado') !!}
                                            {!! Form::text('escuelaDoctorado',null, array('class' => 'form-control text-capitalize','id'=>'escuelaDoctorado','placeholder'=>'Nombre escuela doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('localidadDoctorado', 'Localidad escuela Doctorado') !!}
                                            {!! Form::text('localidadDoctorado',null, array('class' => 'form-control text-capitalize','id'=>'localidadDoctorado','placeholder'=>'Localidad escuela doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('carreraDoctorado', 'Carrera Doctorado') !!}
                                            {!! Form::text('carreraDoctorado',null, array('class' => 'form-control ','id'=>'carreraDoctorado','placeholder'=>'Carrera o equivalente cursado en doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('especialidadDoctorado', 'Especialidad licenciatura') !!}
                                            {!! Form::text('especialidadDoctorado',null, array('class' => 'form-control ','id'=>'especialidadDoctorado','placeholder'=>'Especialidad cursada en doctorado'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('situacionEstudiosDoctorado', 'Situacion Doctorado') !!}
                                            <select class="form-control" name="situacionEstudiosDoctorado" id="situacionEstudiosDoctorado" >
                                                <option value="">- - - -</option>
                                                <option value="Terminada">Terminada</option>
                                                <option value="Trunca">Trunca</option>
                                                <option value="En progreso">En progreso</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            {!! Form::label('anioIniciaEstudiosDoctorado', 'Año inicio Doctorado') !!}
                                            {!! Form::text('anioIniciaEstudiosDoctorado',null, array('class' => 'form-control ','id'=>'anioIniciaEstudiosDoctorado','placeholder'=>'Año en que inició doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('ultimoAnioEstudiosDoctorado', 'Año fin doctorado') !!}
                                            {!! Form::text('ultimoAnioEstudiosDoctorado',null, array('class' => 'form-control ','id'=>'ultimoAnioEstudiosDoctorado','placeholder'=>'Año en que terminó doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('tesisDoctorado', 'Tesis doctorado') !!}
                                            {!! Form::text('tesisDoctorado',null, array('class' => 'form-control ','id'=>'tesisDoctorado','placeholder'=>'Nombre de la tesis de Doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('examenDoctorado', 'Fecha examen Doctorado') !!}

                                            <input type="date" class="form-control" id="examenDoctorado"  name="examenDoctorado">
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('cedulaDoctorado', 'Cédula doctorado') !!}
                                            {!! Form::text('cedulaDoctorado',null, array('class' => 'form-control ','id'=>'cedulaDoctorado','placeholder'=>'Cédula doctorado'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('observacionesDoctorado', 'Observaciones Doctorado') !!}
                                            {!! Form::textarea('observacionesDoctorado',null, array('class' => 'form-control','id'=>'observacionesDoctorado','placeholder'=>'Observaciones sobre doctorado',))!!}
                                        </div>
                                    </div>
                                </div><!-- Fin Doctorado -->


                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos de empleado</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            {!! Form::label('categoria', 'Categoría') !!}
                                            {!! Form::text('categoria',null, array('class' => 'form-control ','id'=>'categoria','placeholder'=>'Categoría del docente'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('nivel', 'Nivel') !!}
                                            {!! Form::text('nivel',null, array('class' => 'form-control ','id'=>'nivel','placeholder'=>'Nivel del docente'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('clavePresupuestal', 'Clave presupuestal*') !!}
                                            {!! Form::text('clavePresupuestal',null, array('class' => 'form-control ','id'=>'clavePresupuestal','placeholder'=>'Clave presupuestal del docente','required'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('numEmpleado', 'Número de empleado*') !!}
                                            {!! Form::text('numEmpleado',null, array('class' => 'form-control ','id'=>'numEmpleado','placeholder'=>'Número de empleado del docente','required'))!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('numTarjetaEscom', 'Número de tarjeta ESCOM') !!}
                                            {!! Form::text('numTarjetaEscom',null, array('class' => 'form-control ','id'=>'numTarjetaEscom','placeholder'=>'Número de tarjeta ESCOM del docente'))!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('ingresoIpn', 'Fecha ingreso al IPN*') !!}

                                            <input type="date" class="form-control" id="ingresoIpn"  name="ingresoIpn" required="">
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('sip', 'SIP') !!}
                                            {!! Form::text('sip',null, array('class' => 'form-control text-capitalize','id'=>'sip','placeholder'=>'SIP del docente'))!!}
                                        </div>


                                    </div>
                                </div><!-- Fin datos empleado -->
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::text('password',null, array('class' => 'form-control ','id'=>'password','placeholder'=>'Password del docente'))!!}
                                </div>

                                {!! Form::submit('Guardar',array('class'=>'btn btn-success btn-block')) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                </div>
            </div>
        </div>
        </div>
    </div>
@endsection