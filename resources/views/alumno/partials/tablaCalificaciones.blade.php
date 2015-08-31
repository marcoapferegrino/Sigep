

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
                            <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->
                            <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
                            <tr>
                                    <th>-{{$grupoAsignatura["nombre"]}}-</th>
                                    <th>-{{$grupoAsignatura["grupo"]}}-</th>
                                    <th>-{{$grupoAsignatura["calif"]}}-</th>
                                </tr>
                        </div>

                    @endforeach
                    </tbody>
                </table>

            </h2>
    </div>
    </div>


</div>