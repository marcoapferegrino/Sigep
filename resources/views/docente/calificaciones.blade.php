


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading"><strong>Calificar</strong></div>
                    <div class="panel-body">
                        <div class="pull-left">
                            @if(Request::url() == 'http://posgrado.service/calificaciones')
                                <h2>Grupos actuales</h2>
                            @endif
                                @if(Request::url() == 'http://posgrado.service/historyGroups')
                                    <h2>Grupos anteriores</h2>
                                @endif
                        </div>
                        @if(Request::url() != 'http://posgrado.service/historyGroups')

                            <div class="pull-right">
                                {!! Form::open(['route' => ['alumnos.recordGroups'],'method' => 'post']) !!}
                                <div class="col-md-12">
                                    <button type="submit"  class="btn btn-info btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="grupos anteriores">
                                        Historial
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        @endif


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