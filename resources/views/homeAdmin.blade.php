
@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Auth::getRol()=='admin')
                    <div class="page-header">
                        <h1>Bienvenido <small>Administrador</small></h1>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection


