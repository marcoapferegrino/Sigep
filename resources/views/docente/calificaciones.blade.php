


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>
                            <strong>Calificar</strong>
                            <div class="pull-right">
                                @if(Auth::getRol() == "superAdmin" || Auth::getRol() == "admin")
                                    <a class="btn btn-success" href="{{url('getAlumnosCalificar')}}" role="button"><i class="fa fa-refresh"></i></a>
                                @elseif(Auth::getRol() == "docente")
                                    <a class="btn btn-success" href="{{url('calificaciones')}}" role="button"><i class="fa fa-refresh"></i></a>
                                @endif
                            </div>
                        </h3>

                    </div>
                    <div class="panel-body">

                            <div class="pull-right">
                                @if(Auth::getRol() == "superAdmin" || Auth::getRol() == "admin")
                                    {!! Form::open(['route' => ['asignaturaGrupoPeriodo.periodos'],'method' => 'get','class'=>'form-inline']) !!}
                                @elseif(Auth::getRol() == "docente")
                                    {!! Form::open(['route' => ['asignaturaGrupoPeriodoDocente.periodos'],'method' => 'get','class'=>'form-inline']) !!}
                                @endif
                                    <select class="form-control" id ="grupo" name="grupo" placeholder="Grupo">
                                        <option  value="">Selecciona grupo</option>

                                        @foreach($grupos as $grupo)
                                            <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" id ="periodo" name="periodo" placeholder="Periodo">
                                        <option  value="">Selecciona periodo</option>

                                        @foreach($periodos as $periodo)
                                            <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" id ="asignatura" name="asignatura" placeholder ="Asignatura">
                                        <option value="">Selecciona asignatura</option>
                                        @foreach($asignaturas as $asignatura)
                                            <option value="{{$asignatura->id}}">{{$asignatura->nombre}}</option>
                                        @endforeach
                                    </select>

                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-filter"></i> Filtrar
                                </button>


                                {!! Form::close() !!}
                            </div>



                        <br><br>
                        <br><br>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @include('docente.partials.tablaCalificaciones')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection