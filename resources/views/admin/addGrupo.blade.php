


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"> <b>Grupos</b>
                    </div>

                    <div class="panel-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <h4 class="text-danger text-center" > Recuerda verificar en que período estas registrando  <i class="fa fa-exclamation-triangle"></i>
                            </h4>

                            @include('admin.partials.formGrupo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection