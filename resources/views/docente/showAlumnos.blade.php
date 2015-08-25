


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading">Alumnos</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'alumnos.findAlumnos','method' => 'GET','class'=>'form-inline navbar-form navbar-left pull-right','role'=>'search']) !!}
                                <div class="form-group">
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del alumno...','required']) !!}
                                </div>
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