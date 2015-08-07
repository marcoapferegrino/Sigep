
@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading">Horarios</div>

                    <div class="panel-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalHorario">
                            Asignatura <i class="fa fa-plus fa-lg"></i>
                        </button>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miércoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                            </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<count($horarios); $i++ )
                                    <tr>
                                        <td>{{$horarios[$i]->id}}</td>
                                        <td>{{$horarios[$i]->nombre}}</td>
                                        <td>{{$dias[$i]->dias->Lunes}}</td>
                                        <td>{{$dias[$i]->dias->Martes}}</td>
                                        <td>{{$dias[$i]->dias->Miercoles}}</td>
                                        <td>{{$dias[$i]->dias->Jueves}}</td>
                                        <td>{{$dias[$i]->dias->Viernes}}</td>
                                    </tr>

                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('superAdmin.partials.addHorarioModal')
@endsection