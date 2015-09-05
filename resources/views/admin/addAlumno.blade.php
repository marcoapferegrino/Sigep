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
                    <div class="panel-heading"> <h3 class="panel-title">Registro Alumno</h3> </div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'alumno.addAlumno','method' => 'POST','class'=>'form-inline']) !!}

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cuenta</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
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
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos personales</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre del Alumno*',array('for'=>'name')) !!}
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
                                    {!! Form::text('rfc',null, array('class' => 'form-control text-uppercase','id'=>'rfc','placeholder'=>'RFC del alumno'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('curp', 'CURP*') !!}
                                    {!! Form::text('curp',null, array('class' => 'form-control text-uppercase','id'=>'curp','placeholder'=>'CURP del alumno','required'))!!}
                                </div>
                                <button class="btn btn-success" id="helpCurp" type="button">Ayuda Curp y RFC <i class="fa fa-cogs"></i></button>

                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('tipoIdOficial', 'Tipo de identificación oficial*') !!}
                                    {!! Form::select('tipoIdOficial', config('optionsIdentificaciones.identificaciones'),null,['class'=>'form-control','id'=>'tipoIdOficial','placeholder'=>'¿Qué identificación es?','required'])!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('noIdOficial', 'Número de  identificación oficial') !!}
                                    {!! Form::text('noIdOficial',null, array('class' => 'form-control','id'=>'noIdOficial','placeholder'=>'¿Cuál es el Id de la identificación?'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('direccion', 'Dirección del alumno') !!}
                                    {!! Form::text('direccion',null, array('class' => 'form-control text-capitalize','id'=>'direccion','placeholder'=>'Dirección'))!!}
                                </div>
                                <div class="form-group">

                                    {!! Form::text('colonia',null, array('class' => 'form-control text-capitalize','id'=>'colonia','placeholder'=>'Colonia '))!!}
                                </div>
                                <div class="form-group">

                                    {!! Form::text('ciudad',null, array('class' => 'form-control text-capitalize','id'=>'ciudad','placeholder'=>'Ciudad',))!!}
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
                                    {!! Form::text('telefono',null, array('class' => 'form-control','id'=>'telefono','placeholder'=>'Teléfono del alumno'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('telMovil', 'Celular') !!}
                                    {!! Form::text('telMovil',null, array('class' => 'form-control','id'=>'telMovil','placeholder'=>'Celular'))!!}
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
                                    {!! Form::label('viveCon', '¿Con quién vive?') !!}
                                    {!! Form::text('viveCon',null, array('class' => 'form-control text-capitalize','id'=>'viveCon','placeholder'=>'¿Vives con alguien?'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('dependEconomic', '¿De quién depende económicamente?') !!}
                                    {!! Form::text('dependEconomic',null, array('class' => 'form-control text-capitalize','id'=>'dependEconomic','placeholder'=>'¿De quien dependes económicamente?'))!!}
                                </div>



                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos acádemicos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('escuela', 'Escuela*') !!}
                                    {!! Form::text('escuela','Escuela Superior de Cómputo', array('class' => 'form-control','id'=>'escuela','placeholder'=>'¿En cuál escuela?','required'))!!}
                                </div>
                                <div class="form-group">º
                                    {!! Form::label('carrera', 'Carrera*') !!}
                                    {!! Form::text('carrera','Ing.Sistemas Computacionales', array('class' => 'form-control','id'=>'carrera','placeholder'=>'¿Cuál es tu carrera?','required'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('especialidadCarrera', 'Especialidad de carrera') !!}
                                    {!! Form::text('especialidadCarrera',null, array('class' => 'form-control text-capitalize','id'=>'especialidadCarrera','placeholder'=>'¿Qué especialidad?'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('localidadEstudios', 'Localidad de estudios*') !!}
                                    {!! Form::text('localidadEstudios',null, array('class' => 'form-control text-capitalize','id'=>'localidadEstudios','placeholder'=>'Puebla, Veracruz','required'))!!}
                                </div>
                                <br><br>

                                <div class="form-group">
                                    {!! Form::label('gradoDeEstudios', 'Grado de estudios*') !!}
                                    {!! Form::select('gradoDeEstudios', config('gradosEstudios.estudios'),null,['class'=>'form-control','id'=>'gradoDeEstudios','required'])!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('situacionEstudios', 'Situación de estudios*') !!}
                                    {!! Form::select('situacionEstudios', config('situacionesEstudios.situaciones'),null,['class'=>'form-control','id'=>'situacionEstudios','required'])!!}

                                </div>

                                <div class="form-group">
                                    {!! Form::label('califEstudios', 'Promedio general*') !!}
                                    {!! Form::number('califEstudios',null, array('class' => 'form-control','id'=>'califEstudios','placeholder'=>'¿Calificación?','required','min'=>6,'max'=>10, 'step'=>'any'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('boleta', 'Número de boleta*') !!}
                                    {!! Form::text('boleta',null, array('class' => 'form-control','id'=>'boleta','placeholder'=>'Número boleta','required'))!!}
                                </div>
                                <br><br>


                                <div class="form-group">
                                    {!! Form::label('aniosEstudios', 'Años de estudios*') !!}
                                    {!! Form::number('aniosEstudios',4, array('class' => 'form-control','id'=>'aniosEstudios','placeholder'=>'','required','min'=>1))!!}
                                </div>
                                <br><br>


                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('observacionEstudios', 'Observaciones de estudios') !!} <br><br>
                                    {!! Form::textarea('observacionEstudios',null, array('class' => 'form-control','id'=>'observacionEstudios','placeholder'=>'¿Obervaciones de los estudios del alumno?'))!!}
                                </div>
                                <br><br>

                            </div>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos Laborales</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('empresaUltimoEmpleo', 'Empresa del último empleo') !!}
                                    {!! Form::text('empresaUltimoEmpleo',null, array('class' => 'form-control text-capitalize','id'=>'empresaUltimoEmpleo','placeholder'=>'Empresa'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('puestoCategUltimoEmpleo', 'Puesto') !!}
                                    {!! Form::text('puestoCategUltimoEmpleo',null, array('class' => 'form-control text-capitalize','id'=>'puestoCategUltimoEmpleo','placeholder'=>'¿Qué puesto tenias?'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('jefeInmediatoUltimoEmpleo', 'Jefe inmediato') !!}
                                    {!! Form::text('jefeInmediatoUltimoEmpleo',null, array('class' => 'form-control text-capitalize','id'=>'jefeInmediatoUltimoEmpleo','placeholder'=>'Nombre del jefe'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('telefonoUltimoEmpleo', 'Teléfono') !!}
                                    {!! Form::text('telefonoUltimoEmpleo',null, array('class' => 'form-control','id'=>'telefonoUltimoEmpleo','placeholder'=>'Teléfono del empleo'))!!}
                                </div>
                                <br><br>
                                <div class="form-group">
                                    {!! Form::label('fechaIngresoUltimoEmpleo', 'Fecha ingreso al trabajo') !!}
                                    <input type="date" class="form-control" id="fechaIngresoUltimoEmpleo"  name="fechaIngresoUltimoEmpleo"  }}  >
                                </div>
                                <div class="form-group">
                                    {!! Form::label('fechaTerminoUltimoEmpleo', 'Fecha fin del trabajo') !!}
                                    <input type="date" class="form-control" id="fechaTerminoUltimoEmpleo"  name="fechaTerminoUltimoEmpleo">
                                </div>
                                <br><br>

                                    <div class="form-group">
                                        {!! Form::label('actividadesUltimoEmpleo', 'Actividades del último empleo') !!}
                                        <br>
                                        {!! Form::textarea('actividadesUltimoEmpleo',null, array('class' => 'form-control','id'=>'actividadesUltimoEmpleo','placeholder'=>'¿Qué hacias en tu último empleo?'))!!}
                                    </div>
                                <br><br>
                                    <div class="form-group">
                                        {!! Form::label('motivosSeparacionUltimoEmpleo', 'Motivos de separación de la empresa') !!}<br>
                                        {!! Form::textarea('motivosSeparacionUltimoEmpleo',null, array('class' => 'form-control','id'=>'motivosSeparacionUltimoEmpleo','placeholder'=>'¿Por qué te separaste de la empresa?'))!!}
                                    </div>

                                <br><br>

                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Conocimientos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('actividadesQueConoce', 'Actividades que sabe') !!} <br>
                                    {!! Form::textarea('actividadesQueConoce',null, array('class' => 'form-control','id'=>'actividadesQueConoce','placeholder'=>'FrontEnd,BackEnd, Criptografía, DBA'))!!}
                                </div>
                                <br><br>


                                <div class="form-group">
                                    {!! Form::label('conocimientoSoftware', 'Conocimientos de software') !!}<br>
                                    {!! Form::textarea('conocimientoSoftware',null, array('class' => 'form-control','id'=>'conocimientoSoftware','placeholder'=>'Software que conoce'))!!}
                                </div>
                                <br><br>

                                <div class="form-group">
                                    {!! Form::label('obsconocimientos', 'Otros conocimientos') !!}<br>
                                    {!! Form::textarea('obsconocimientos',null, array('class' => 'form-control','id'=>'obsconocimientos','placeholder'=>'Otros conocimientos'))!!}
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Referencias</h3>
                            </div>
                            <br><br>
                            {{--Referencia 1--}}
                            <div class="form-group">
                                {!! Form::label('ref1Nombre', 'Nombre 1  ') !!}
                                {!! Form::text('ref1Nombre',null, array('class' => 'form-control text-capitalize','id'=>'ref1Nombre','placeholder'=>'Nombre '))!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ref1Afinidad', 'Afinidad ') !!}
                                {!! Form::text('ref1Afinidad',null, array('class' => 'form-control text-capitalize','id'=>'ref1Afinidad','placeholder'=>'¿que parentezco tienes? '))!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('ref1Tiempoconocerlo', 'Tiempo de conocerlo') !!}
                                {!! Form::text('ref1Tiempoconocerlo',null, array('class' => 'form-control','id'=>'ref1Tiempoconocerlo','placeholder'=>'Tiempo de conocerlo'))!!}
                            </div>
                            <br><br>
                            <div class="form-group">
                                {!! Form::label('ref1Domicilio', 'Domicilio ') !!}
                                {!! Form::text('ref1Domicilio',null, array('class' => 'form-control text-capitalize','id'=>'ref1Domicilio','placeholder'=>'Domicilio de la referencia'))!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('ref1Telefono', 'Teléfono') !!}
                                {!! Form::text('ref1Telefono',null, array('class' => 'form-control','id'=>'ref1Telefono','placeholder'=>'Teléfono de la referencia'))!!}
                            </div>
                            <br><br><br><br>
                            {{--Referencia 2 --}}

                            <div class="form-group">
                                {!! Form::label('ref2Nombre', 'Nombre 2 ') !!}
                                {!! Form::text('ref2Nombre',null, array('class' => 'form-control text-capitalize','id'=>'ref2Nombre','placeholder'=>'Nombre '))!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ref2Afinidad', 'Afinidad ') !!}
                                {!! Form::text('ref2Afinidad',null, array('class' => 'form-control text-capitalize','id'=>'ref2Afinidad','placeholder'=>'¿que parentezco tienes? '))!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('ref2Tiempoconocerlo', 'Tiempo de conocerlo') !!}
                                {!! Form::text('ref2Tiempoconocerlo',null, array('class' => 'form-control','id'=>'ref2Tiempoconocerlo','placeholder'=>'Tiempo de conocerlo'))!!}
                            </div>
                            <br><br>
                            <div class="form-group">
                                {!! Form::label('ref2Domicilio', 'Domicilio ') !!}
                                {!! Form::text('ref2Domicilio',null, array('class' => 'form-control text-capitalize','id'=>'ref2Domicilio','placeholder'=>'Domicilio de la referencia'))!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('ref2Telefono', 'Teléfono') !!}
                                {!! Form::text('ref2Telefono',null, array('class' => 'form-control','id'=>'ref2Telefono','placeholder'=>'Teléfono de la referencia'))!!}
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