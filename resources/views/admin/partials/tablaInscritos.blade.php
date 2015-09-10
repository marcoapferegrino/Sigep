

<div class="panel-group"  >

    <div class="panel panel-default">

        <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->

        <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
    <div class="panel-heading" role="tab">
            <h2 class="panel-title">
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th>No#</th>
                        <th>Alumno</th>
                        <th>Boleta</th>
                        <th>Materia</th>
                        <th>Periodo</th>
                        <th>Grupo</th>
                        <th>Calificación</th>

                    </tr>
                    </thead>
                    <tbody>

                    <div class="panel panel-info">

                    @foreach($alumnos as $i=>$alumno)
                    @foreach($gruposAsignaturas as  $grupoAsignatura)
                            <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->
                            <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
                            @if($alumno->asignatura_grupo_id==$grupoAsignatura->id)
                                <tr>
                                    <th>{{$i+1}}</th>
                                    <th>{{$alumno->name}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</th>
                                    <th>{{$alumno->boleta}}</th>
                                    <th>{{$grupoAsignatura->nombre}}</th>
                                    <th>{{$grupoAsignatura->nombrePeriodo}}</th>
                                    <th>{{$grupoAsignatura->salon}}</th>
                                @if($grupoAsignatura->calificacion='S/C')
                                    <th >{{$grupoAsignatura->calificacion}}</th>
                                    @elseif($grupoAsignatura->calificacion<6)

                                    <th style="background-color: #ce8483">{{$grupoAsignatura->calificacion}}</th>
                                    @else
                                    <th style="background-color:#65C400">{{$grupoAsignatura->calificacion}}</th>

                                 @endif
                                    <th>    </th>
                                </tr>@endif
                        </div>
                    @endforeach
                    @endforeach
                    </tbody>
                </table>{!! $alumnos->render() !!}


            </h2>
    </div>
    </div>


</div>