

<div class="panel-group"  >

    <div class="panel panel-info">

        <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->

        <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
    <div class="panel-heading" role="tab">
            <h2 class="panel-title">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Grupo</th>
                        <th>Calificación</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="panel panel-info">
                    @foreach($gruposAsignaturas as $grupoAsignatura)
                            <tr>
                                    <th>{{$grupoAsignatura->nombre}}</th>
                                    <th>{{$grupoAsignatura->grupoNombre}}</th>


                                    @if($grupoAsignatura->calificacion<8)

                                    <th style="background-color: #ce8483">{{$grupoAsignatura->calificacion}}</th>
                                    @elseif($grupoAsignatura->calificacion>=8)
                                    <th style="background-color:#65C400">{{$grupoAsignatura->calificacion}}</th>
                                    @else
                                    <th >{{$grupoAsignatura->calificacion}}</th>
                                 @endif
                                </tr>
                        </div>

                    @endforeach
                    </tbody>
                </table>

            </h2>
    </div>
    </div>


</div>