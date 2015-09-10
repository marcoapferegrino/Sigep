@extends('app')


@section('content')
<div class="panel-group"  >


    <div class="col-lg-10" >
    <div class="panel panel-info">

        <div class="panel-heading"> <h3 class="panel-title">Listado de grupos</h3> </div>


                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Salón</th>
                        <th>Semestre</th>
                        <th>Periodo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="panel panel-info">
                        @foreach($grupos as $grupo)
                            <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->
                            <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
                            <tr>
                                <th>{{$grupo["nombre"]}}</th>
                                <th>{{$grupo["salon"]}}</th>
                                <th>{{$grupo["semestre"]}}</th>
                                @foreach($periodos as $periodo )
                                @if($grupo["periodo_id"] == $periodo["id"])

                                 <th>{{$periodo["nombre"]}}</th>
                                @endif
                                @endforeach

                                <th>
                                    <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditGrupo{{$grupo["id"]}}">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>


                                    {!! Form::open(['route' => ['grupo.deleteGrupo',$grupo["id"]],'method' => 'DELETE']) !!}
                                    <button type="submit" onclick="return confirm('Seguro que quieres eliminar el grupo?')" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    {!! Form::close() !!}

                                </th>
                                @include('admin.partials.updateGrupo')
                            </tr>
                    </div>

                    @endforeach
                    </tbody>
                </table>




    </div>



</div>
</div>

@endsection