


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"> <b>Grupos</b>
                        <b class="pull-right">Período: <b style="color: aquamarine;font-size: 120%" >{{ $actual }}</b></b>
                    </div>

                    <div class="panel-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @include('admin.partials.formGrupo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection