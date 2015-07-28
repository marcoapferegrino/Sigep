

@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Exitoso! : </strong> {{Session::get('message')}} <i class="fa fa-check fa-lg"></i>
                        </div>
                    @endif

                </div>
            </div>
            @include('superAdmin.partials.messages')

            <div class="col-xs-12 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Asignaturas <i class="fa fa-book fa-lg"></i> </h3>
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddAsignatura">
                            Periodo <i class="fa fa-plus fa-lg"></i>
                        </button>
                        <table class="table table-responsive table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Tipo</th>
                                <th>Hrs Práctica</th>
                                <th>Hrs Teoría</th>
                                <th>#Periodo</th>
                                <th>Operaciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asignaturas as $asignatura)
                                <tr>
                                    <td> {{$asignatura->id}}  </td>
                                    <td> {{$asignatura->nombre}} </td>
                                    <td class="text-center"> {{$asignatura->creditos}} </td>
                                    <td> {{$asignatura->tipo}} </td>
                                    <td class="text-center"> {{$asignatura->horasPract}} </td>
                                    <td class="text-center"> {{$asignatura->horasTeoricas}} </td>
                                    <td class="text-center"> {{$asignatura->periodo_id}} </td>
                                    <td>
                                        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditMateria">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>

                                        {!! Form::open(['route' => ['periodo.deleteAsignatura',$asignatura->id],'method' => 'DELETE']) !!}
                                        <button type="submit" onclick="return confirm('Seguro que quieres eliminar?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
            <div class="col-xs-6 col-md-4">


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Periodos</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periodos as $periodo)
                                <tr>
                                    <td>{{$periodo->id}}</td>
                                    <td>{{$periodo->nombre}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    @include('superAdmin.partials.addAsignaturaModal')

@endsection