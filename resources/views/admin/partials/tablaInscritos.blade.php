
<div class="panel panel-info">
    <!-- Default panel contents -->
    <div class="panel-heading">Alumnos inscritos</div>

    <!-- Table -->
    <table class="table table-hover">
        <thead>
        <tr>

            <th>Alumno</th>
            <th>Boleta</th>
            <th>Materia</th>
            <th>Periodo</th>
            <th>Grupo</th>
            <th>Calificación</th>
            <th>Operaciones</th>

        </tr>
        </thead>
        <tbody>


        @foreach($alumnos as $i=>$alumno)
        @foreach($gruposAsignaturas as  $grupoAsignatura)
                <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->
        <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
        @if($alumno->asignatura_grupo_id==$grupoAsignatura->id)
            <tr>

                <td>{{$alumno->name}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</td>
                <td>{{$alumno->boleta}}</td>
                <td>{{$grupoAsignatura->nombre}}</td>
                <td>{{$grupoAsignatura->nombrePeriodo}}</td>
                <td>{{$grupoAsignatura->salon}}</td>
                @if($grupoAsignatura->calificacion='S/C')
                    <td >{{$grupoAsignatura->calificacion}}</td>
                @elseif($grupoAsignatura->calificacion<6)

                    <td style="background-color: #ce8483">{{$grupoAsignatura->calificacion}}</td>
                @else
                    <td style="background-color:#65C400">{{$grupoAsignatura->calificacion}}</td>

                @endif
                <td>

                </td>
            </tr>
        @endif

        @endforeach
        @endforeach
        </tbody>
    </table>{!! $alumnos->render() !!}
</div>



