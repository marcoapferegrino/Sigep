

@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">

            @include('partials.messages')

            <div class="col-xs-12 col-md-12">
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
                                <th>Clave</th>
                                <th>Créditos</th>
                                <th>Tipo</th>
                                <th>Horas</th>
                                <th>Curso</th>
                                <th>Fecha de vigencia</th>
                                <th>Operaciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $index=0; ?>
                            @foreach($asignaturas as $asignatura)
                                <tr>
                                    <td> {{++$index}}  </td>
                                    <td> {{$asignatura->nombre}} </td>
                                    <td>{{$asignatura->claveAsignatura}}</td>
                                    <td> {{$asignatura->creditos}} </td>
                                    <td> {{$asignatura->tipo}} <br><ins>{{$asignatura->escuelaMovilidad}}</ins> </td>
                                    <td> {{$asignatura->horas}} </td>
                                    <td> {{$asignatura->curso}} </td>
                                    <td>{{$asignatura->fechaVigencia}}</td>

                                    <td>
                                        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditMateria{{$asignatura->id}}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </button>

                                        {!! Form::open(['route' => ['asignatura.deleteAsignatura',$asignatura->id],'method' => 'DELETE']) !!}
                                        <button type="submit" onclick="return confirm('Seguro que quieres eliminar?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    @include('superAdmin.partials.updateAsignatura')
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

@section('scripts')
    <script src="/js/inputMovilidad.js"></script>
@endsection