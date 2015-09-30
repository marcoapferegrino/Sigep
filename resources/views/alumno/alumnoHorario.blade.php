
@extends('app')



@section('content')

    @include('partials.messages')
    <div class="col-md-11 ">
    <div class="panel panel-primary"  >
        <div class="panel-heading">Tu horario</div>

        <div class="panel-body">
    <table class="table table-hover">
    <thead>
    <tr>
        <th>Grupo</th>
        <th>Materia</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($horarios);$i++)
        <tr>
            <td>
                {{$horarios[$i]->nombre}}
            </td>
            <td>
                {{$horarios[$i]->salon}}
            </td>
            <td>
                {{$dias[$i]->dias->Lunes}}
            </td>
            <td>
                {{$dias[$i]->dias->Martes}}
            </td>
            <td>
                {{$dias[$i]->dias->Miercoles}}
            </td>
            <td>
                {{$dias[$i]->dias->Jueves}}
            </td>
            <td>
                {{$dias[$i]->dias->Viernes}}
            </td>

        </tr>
    @endfor
    </tbody>
</table>
            </div>
    </div></div>
@endsection