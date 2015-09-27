


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>Alumnos
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{url('misAlumnos')}}" role="button"><i class="fa fa-refresh"></i></a>
                            </div>
                        </h3>

                    </div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'alumnos.findAlumnos','method' => 'GET','class'=>'form-inline navbar-form navbar-left pull-right','role'=>'search']) !!}
                                <div class="form-group">
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del alumno']) !!}
                                </div>

                                <select class="form-control" id ="grupo" name="grupo" placeholder="Grupo">
                                    <option  value="">Selecciona grupo</option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" id ="periodo" name="periodo" placeholder="Periodo">
                                    <option  value="">Selecciona periodo</option>

                                    @foreach($periodos as $periodo)
                                        <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" id ="asignatura" name="asignatura" placeholder ="Asignatura">
                                    <option value="">Selecciona asignatura</option>
                                    @foreach($asignaturas as $asignatura)
                                        <option value="{{$asignatura->id}}">{{$asignatura->nombre}}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> </button>
                        {!! Form::close() !!}

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Asignatura</th>
                                            <th>Grupo</th>
                                            <th>Status</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($alumnos as $alumno)
                                            <tr>
                                                <td>{{$alumno->name." ".$alumno->apellidoP." ".$alumno->apellidoM}}</td>
                                                <td>{{$alumno->email}}</td>
                                                <td>{{$alumno->telefono}}</td>
                                                <td>{{$alumno->nombreAsignatura}}</td>
                                                <td>{{$alumno->nombreGrupo}}</td>
                                                @if($alumno->finPeriodo >= \Carbon\Carbon::now())
                                                    <td class="success">Alumno actual</td>
                                                @else
                                                    <td class="danger">Alumno anterior</td>
                                                @endif

                                                <td><a href="{{route('alumnos.showExpediente',$alumno->id)}}">Ver</a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            {!! $alumnos->render() !!}

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection