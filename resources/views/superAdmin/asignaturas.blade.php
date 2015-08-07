

@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">

            @include('partials.messages')

            <div class="col-xs-12 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">Asignaturas <i class="fa fa-book fa-lg"></i> </h2>
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalAddAsignatura">
                            Asignatura <i class="fa fa-plus fa-lg"></i>
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

                                    <td>
                                        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditMateria">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>

                                        {!! Form::open(['route' => ['asignatura.deleteAsignatura',$asignatura->id],'method' => 'DELETE']) !!}
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