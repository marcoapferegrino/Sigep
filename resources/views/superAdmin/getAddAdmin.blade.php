@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Agregar Administrador</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.addAdmin','method' => 'POST']) !!}
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cuenta</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email*') !!}
                                            {!! Form::email('email',null, array('class' => 'form-control','id'=>'email','placeholder'=>'Email','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('password', 'Contraseña*') !!}
                                            {!! Form::text('password',null, array('class' => 'form-control','id'=>'password','placeholder'=>'Pon una contraseña','required'))!!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('rol', 'Rol Usuario*') !!}
                                                <select class="form-control" name="rol" id="rol" required>
                                                    <option value="">- - - -</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="superAdmin">SuperAdmin</option>
                                                </select>
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
                                {!! Form::label('name', 'Nombre del Administrador*',array('for'=>'name')) !!}
                                <div class="row">

                                    <div class="col-xs-6 col-md-4">

                                        <div class="form-group">

                                            {!! Form::text('name',null, array('class' => 'form-control text-capitalize','id'=>'name','placeholder'=>'Nombre(s)','required','autofocus'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {{--{!! Form::label('apellidoP', 'Apellido Paterno') !!}--}}
                                            {!! Form::text('apellidoP',null, array('class' => 'form-control text-capitalize','id'=>'apellidoP','placeholder'=>'Apellido paterno','required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">

                                        <div class="form-group">
                                            {{--{!! Form::label('apellidoM', 'Apellido Materno') !!}--}}
                                            {!! Form::text('apellidoM',null, array('class' => 'form-control text-capitalize','id'=>'apellidoM','placeholder'=>'Apellido materno','required'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('fechanac', 'Fecha de nacimiento*') !!}
                                            <input type="date" class="form-control" id="fechanac"  name="fechanac" placeholder="Fecha de nacimiento" required min={{\Carbon\Carbon::now()->subYears(100)}} max={{\Carbon\Carbon::now()->subYears(18)}} >
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('nacionalidad', 'Nacionalidad*') !!}
                                            {!! Form::text('nacionalidad',null, array('class' => 'form-control text-capitalize','id'=>'nacionalidad','placeholder'=>'Nacionalidad','required'))!!}
                                        </div>

                                    </div>
                                    <div class="col-xs-6 col-md-4">

                                        <div class="form-group">
                                            {!! Form::label('edoNacimiento', 'Estado/Lugar*') !!}
                                            {!! Form::text('edoNacimiento',null, array('class' => 'form-control text-capitalize','id'=>'edoNacimiento','placeholder'=>'Estado donde nació','required'))!!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="form-group">
                                            {!! Form::label('genero', 'Género*') !!}
                                            <select class="form-control" name="genero" id="genero" required>
                                                <option value="">- - - -</option>
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
                                            {!! Form::text('rfc',null, array('class' => 'form-control text-uppercase','id'=>'rfc','placeholder'=>'RFC del administrador'))!!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('curp', 'CURP*') !!}
                                            {!! Form::text('curp',null, array('class' => 'form-control text-uppercase','id'=>'curp','placeholder'=>'CURP del administrador','required'))!!}
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
                                            {!! Form::select('tipoIdOficial', config('optionsIdentificaciones.identificaciones'),null,['class'=>'form-control ','id'=>'tipoIdOficial','placeholder'=>'¿Qué identificación es?','required'])!!}
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('noIdOficial', '# de  identificación oficial') !!}
                                            {!! Form::text('noIdOficial',null, array('class' => 'form-control ','id'=>'noIdOficial','placeholder'=>'¿Cuál es el Id de la identificación?'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                {!! Form::label('direccion', 'Dirección del administrador') !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::text('direccion',null, array('class' => 'form-control text-capitalize','id'=>'direccion','placeholder'=>'Dirección'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('colonia',null, array('class' => 'form-control text-capitalize','id'=>'colonia','placeholder'=>'Colonia '))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('ciudad',null, array('class' => 'form-control text-capitalize','id'=>'ciudad','placeholder'=>'Ciudad',))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('estado',null, array('class' => 'form-control text-capitalize','id'=>'estado','placeholder'=>'Estado'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::text('cp',null, array('class' => 'form-control','id'=>'cp','placeholder'=>'C.P'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('telefono', 'Teléfono') !!}
                                            {!! Form::text('telefono',null, array('class' => 'form-control','id'=>'telefono','placeholder'=>'Teléfono del administrador'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('telMovil', 'Celular') !!}
                                            {!! Form::text('telMovil',null, array('class' => 'form-control','id'=>'telMovil','placeholder'=>'Celular'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('edocivil', 'Estado Civil') !!}
                                            {!! Form::select('edoCivil', config('edoCivil.estados'),null,['class'=>'form-control','id'=>'edoCivil'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('numHijos', 'Número de hijos') !!}
                                            {!! Form::number('numHijos',null, array('class' => 'form-control','id'=>'numHijos','placeholder'=>'¿Cuántos hijos tienes?','min'=>0))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

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