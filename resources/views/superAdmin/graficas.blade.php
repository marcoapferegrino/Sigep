@extends('app')

@section('content')
    <div class="container">

        @include('partials.messages')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="pull-right">
                        <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
                            Ayuda
                        </button>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">Gráficas</h3>

                    </div>
                    <div class="panel-body">
                        <div class="pull-right">

                            {!! Form::open(['route' => ['graficas.getCustomGrafica'],'method' => 'get','class'=>'form-inline']) !!}

                            <select class="form-control" id ="periodo" name="periodo" placeholder="Periodo">
                                <option  value="">Selecciona periodo</option>

                                @foreach($periodos as $periodo)
                                    <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                                @endforeach
                            </select>
                            <select class="form-control" id ="asignatura" name="asignatura" placeholder ="Asignatura">
                                <option value="">Selecciona asignatura</option>
                                @foreach($asignaturas as $asignatura)
                                    <option value="{{$asignatura->id}}">{{$asignatura->nombre}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-filter"></i> Graficar
                            </button>


                            {!! Form::close() !!}


                        </div>
                        @if(isset($datos)&& isset($title))
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="datosChart" data-datos="{{$datos}}" data-title="{{$title}}">
                                    <div id="graph" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>¡Bienvenido!</strong> Empieza seleccionando un periodo o asignatura.
                                    </div>

                                </div>
                            </div>

                        @endif

                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ayuda para graficar</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Hola bienvenido</h4>
                                <li>
                                    Si seleccionas un <strong>periodo</strong> y das click en <button type="button" class="btn btn-info btn-sm">
                                        <i class="fa fa-filter"></i> Graficar
                                    </button> te dira cuántos y el porcentaje de alumnos reprobados en ese periodo.
                                </li>
                                <br><br>
                                <li>
                                    Si seleccionas una <strong>asignatura</strong> y das click en <button type="button" class="btn btn-info btn-sm">
                                        <i class="fa fa-filter"></i> Graficar
                                    </button> te dira cuántos y el porcentaje de alumnos reprobados en esa materia considerando todos los periodos.
                                </li>
                                <br><br>
                                <li>
                                    Si seleccionas un <strong>periodo y una asignatura</strong> y das click en <button type="button" class="btn btn-info btn-sm">
                                        <i class="fa fa-filter"></i> Graficar
                                    </button> te dira cuántos y el porcentaje de alumnos reprobados en ese periodo con esa asignatura.
                                </li>
                                <br><br><br>
                                <div class="alert alert-info" role="alert">Esperamos que haya sido de ayuda para cualquier aclaración comunicate con el administrador.</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="/jsCharts/highcharts.js"></script>
<script src="/jsCharts/modules/exporting.js"></script>
<script>
    $(function () {
        var datos = $('#datosChart').data('datos');
        var title = $('#datosChart').data('title');
        console.log(datos);
        $('#graph').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: title
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: "Alumnos",
                colorByPoint: true,
                data: datos
            }]
        });
    });
</script>
@endsection
