
@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Auth::getRol()=='admin')
                    <div class="page-header">
                        <h1>Bienvenido !! <small>Admin</small></h1>
                    </div>
                @endif
                <div class="panel panel-info">

                    <div class="panel-heading"><i class="fa fa-list-ol"></i> Listas</div>

                    <div class="panel-body">

                        <div class="list-group">
                            <a href="{{url('getGrupos')}}" class="list-group-item">Lista de grupos</a>
                            <a href="{{url('getInscritos')}}" class="list-group-item">Lista de alumnos inscritos</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


