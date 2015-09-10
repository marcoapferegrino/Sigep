


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-10 ">
                <div class="panel panel-primary">
                    <div class="panel-heading">Grupos</div>

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