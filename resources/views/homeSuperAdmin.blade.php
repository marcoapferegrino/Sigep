

@extends('app')

@section('content')
    <div class="container">
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

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">

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
                                    <th>#Programa</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($periodos as $periodo)
                                    <tr>
                                        <td>{{$periodo->id}} </td>
                                        <td>{{$periodo->nombre}}</td>
                                        <td>{{$periodo->inicio}}</td>
                                        <td>{{$periodo->fin}}</td>
                                        <td class="text-center">{{$periodo->programa_id}} </td>
                                        <td>

                                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditPeriodo">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>

                                            {!! Form::open(['route' => ['periodo.deletePeriodo',$periodo->id],'method' => 'DELETE']) !!}
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
                <div class="col-xs-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Programas</h3>
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPrograma">
                                Programa <i class="fa fa-plus fa-lg"></i>
                            </button>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Escuela</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($programas as $programa)
                                    <tr>
                                        <td>{{$programa->id}}</td>
                                        <td>{{$programa->nombre}}</td>
                                        <td>{{$programa->escuela}}</td>
                                        <td>

                                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditPrograma">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>

                                            {!! Form::open(['route' => ['periodo.deletePrograma',$programa->id],'method' => 'DELETE']) !!}
                                            <button type="submit" onclick="return confirm('Al eliminar el programa el periodo también se eliminará. Seguro?')" class="btn btn-danger">
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
            </div>




        </div>
    </div>

    @include('superAdmin.partials.addPeriodoModal')
    @include('superAdmin.partials.addProgramaModal')
    @include('superAdmin.partials.editPeriodoModal')
    @include('superAdmin.partials.editProgramaModal')

@endsection



