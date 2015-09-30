@extends('app')


@section('content')
<div class="panel-group"  >
    @include('partials.messages')

    <div class="col-lg-8" style="margin-left: 20%;margin-right: auto" >
    <div class="panel panel-info">

        <div class="panel-heading"> <h3 class="panel-title">Listado de grupos  <b class="pull-right">Período: <b style="color: #262626 ;font-size: 120%" >{{ $actual }}</b></b> </h3> </div>


        {!! Form::open(['route' => 'grupos.gruposByPeriodo','method' => 'GET','class'=>'form-inline navbar-form navbar-left pull-right','role'=>'search']) !!}
        <div class="form-group">
            Registrar en período:
            <select class="form-control" name="periodo_id" id="periodo_id" required>
                <option value="">- - - -</option>
                @foreach($periodos as $periodo )
                    <option value="{{$periodo->id}}"> {{$periodo->nombre}}  </option>
                @endforeach

            </select>
         </div>

        <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> </button>
        <a class="btn btn-success " href="{{url('getGrupos')}}" role="button" ><i class="fa fa-refresh"></i></a>

        {!! Form::close() !!}


        <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Salón</th>
                        <th>Semestre</th>
                        <th>Período</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="panel panel-info">
                        @foreach($grupos as $grupo)
                           <tr>
                                <th>{{$grupo->nombre}}</th>
                                <th>{{$grupo->salon}}</th>
                                <th>{{$grupo->semestre}}</th>
                                @foreach($periodos as $periodo )
                                @if($grupo->periodo_id == $periodo->id)

                                 <th>{{$periodo->nombre}}</th>
                                @endif
                                @endforeach

                                <th>
                                    <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalEditGrupo{{$grupo->id}}">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>


                                    {!! Form::open(['route' => ['grupo.deleteGrupo',$grupo->id],'method' => 'DELETE']) !!}
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