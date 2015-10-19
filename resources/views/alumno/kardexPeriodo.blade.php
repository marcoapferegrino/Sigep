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
                            <br>Boleta: {{$alumno[0]->boleta}}

                        </small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <small>
                            Créditos totales: {{$totalCreditos}}

                        </small>
                        <small class="pull-right">
                            <b style="font-size: 140%"> Promedio general: {{$promedio}}   </b>
                        </small>

                        <br>
                    </h1>

                </div>

                @foreach($misPeriodos as $k=> $periodo)
                    <div class="panel panel-primary">
                        <div class="panel-heading ">
                            <h3 class="panel-title text-primary  "> <b class="col-lg-7">Período: {{$periodo}} </b>
                                <b style="color: #ebcccc">Créditos obtenidos: {{$creditos[$k]}} </b><b class="pull-right">Promedio: {{$promediosPeriodos[$k]}} </b></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-primary">

                                    <th>Materia</th>
                                    <th>Grupo</th>
                                    <th>Fecha</th>
                                    <th>Calificación</th>
                                    <th>Créditos de asignatura</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($alumno as $t=>$materia)
                                    @if($periodo==$materia->nombrePeriodo)
                                        <tr>

                                            <th>  {{$materia->nombre}}  </th>
                                            <th>  {{$materia->grupoNombre}} </th>
                                            <th>  {{$materia->finPeriodo}} </th>
                                            <th>  {{$materia->calificacion}} </th>
                                            <th>  {{$materia->creditos}} </th>
                                        </tr>

                                    @endif
                                @endforeach
                                </tbody> </table> </div></div>


                @endforeach



            </div>
        </div>
    </div>
@endsection