


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading">Inscripciones</div>

                    <div class="panel-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            @include('admin.listAlumnos')
                            @include('admin.partials.formInscripcion')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection