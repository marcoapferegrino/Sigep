@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">

                <div class="page-header">
                    <h1>
                        <i class="fa fa-user"></i>
                        Alumno: {{$alumno[0]->alumnoNombre  }} {{$alumno[0]->apellidoP  }} {{$alumno[0]->apellidoM  }}
                        <small>
                            <br>Boleta:{{$alumno[0]->boleta}}
                        </small>
                        <small class="pull-right">
                          <b> Promedio: {{$promedio}}  </b>
                        </small>
                        <br>
                    </h1>

                </div>
                 @for($i=1;$i<=$maxi;$i++)
                     @if($alumno )
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title text-primary "> <b>Semestre: {{($i)}} </b></h2>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-primary">

                                    <th>Materia</th>
                                    <th>Periodo</th>
                                    <th>Grupo</th>
                                    <th>Fecha</th>
                                    <th>Calificación</th>

                                </tr>
                                </thead>
                                <tbody>

                         @foreach($alumno as $t=>$materia)
                         @if(($i)==$materia->semestre)
                             <tr>

                                            <th>  {{$materia->nombre}}  </th>
                                            <th>  {{$materia->nombrePeriodo}} </th>
                                            <th>  {{$materia->grupoNombre}} </th>
                                            <th>  {{$materia->finPeriodo}} </th>
                                            <th>  {{$materia->calificacion}} </th>

                             </tr>

                        @endif
                            @endforeach  </tbody> </table> </div>
                    </div> @endif
                @endfor
            </div>
        </div>
    </div>
@endsection