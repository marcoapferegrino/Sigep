

@extends('app')



@section('content')
    <div class="container">
        <div class="row">
            @include('partials.messages')
            <div class="col-md-12 ">

                <div class="panel panel-info">
                    <div class="panel-heading">Horario</div>

                    <div class="panel-body">
                        @include('docente.partials.tablaHorario')


                        {{--{!! Form::open(['route' => ['horario.horarioPDF'],'method' => 'GET']) !!}--}}
                        {{--<button type="submit"  class="btn btn-primary btn-lg">--}}
                            {{--Horario PDF <i class="fa fa-file-pdf-o"></i>--}}
                        {{--</button>--}}
                        {{--{!! Form::close() !!}--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection