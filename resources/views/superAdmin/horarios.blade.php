
@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <h2 class="panel-title">Horarios</h2>
                    </div>


                    <div class="panel-body">
                        <div class="alert alert-info" role="alert">Estos son los horarios que se podrán asignar a una materia.</div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalHorario">
                            Horario <i class="fa fa-plus fa-lg"></i>
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
                                <th>operaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<count($horarios); $i++ )
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$horarios[$i]->nombre}}</td>
                                        <td>{{$dias[$i]->dias->Lunes}}</td>
                                        <td>{{$dias[$i]->dias->Martes}}</td>
                                        <td>{{$dias[$i]->dias->Miercoles}}</td>
                                        <td>{{$dias[$i]->dias->Jueves}}</td>
                                        <td>{{$dias[$i]->dias->Viernes}}</td>
                                        <td>
                                            {!! Form::open(['route' => ['horarios.deleteHorario',$horarios[$i]->id],'method' => 'DELETE']) !!}
                                            <button type="submit" onclick="return confirm('Seguro que quieres eliminar?')" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
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