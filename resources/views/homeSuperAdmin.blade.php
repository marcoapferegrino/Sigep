

@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Periodo</h3>
                        </div>
                        <div class="panel-body">


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPeriodo">
                                Periodo <i class="fa fa-plus fa-lg"></i>
                            </button>


                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Inicio p/ calificar</th>
                                    <th>Fin p/ calificar</th>

                                    <th>Operaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($periodos as $periodo)
                                    <tr>
                                        <td>{{$periodo->id}} </td>
                                        <td>{{$periodo->nombre}}</td>
                                        <td>{{$periodo->inicioPeriodo}}</td>
                                        <td>{{$periodo->finPeriodo}}</td>
                                        <td>{{$periodo->inicioCalificaciones}}</td>
                                        <td>{{$periodo->finCalificaciones}}</td>
                                        <td>
                                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditPeriodo{{$periodo->id}}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                            {!! Form::open(['route' => ['periodo.deletePeriodo',$periodo->id],'method' => 'DELETE']) !!}
                                            <button type="submit" onclick="return confirm('Seguro que quieres eliminar?')" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        @include('superAdmin.partials.editPeriodoModal')
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

    @include('superAdmin.partials.addPeriodoModal')




@endsection




