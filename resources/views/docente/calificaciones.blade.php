


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading">Calificar</div>

                    <div class="panel-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @include('docente.partials.tablaCalificaciones')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection