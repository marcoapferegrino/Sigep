


@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @include('admin.partials.tablaInscritos')
                </div>

                </div>
        </div>
    </div>
@endsection