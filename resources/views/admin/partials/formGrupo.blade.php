

<div class="panel-group"  >


<div class="panel-heading" role="tab">

    @foreach($grupos as $grupo)
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default">


                <div class="panel-heading" role="tab" id="heading{{$grupo->grupoId}}">
                    <h3 class="panel-title" align="center">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$grupo->grupoId}}"  aria-expanded="true" aria-controls="collapse{{$grupo->grupoId}}">
                            <b class="text-danger"> {{$grupo->grupoNombre}} <i class="fa fa-angle-double-down"></i> </b>
                        </a>

                    </h3>
                </div>



                <div id="collapse{{$grupo->grupoId}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{$grupo->grupoId}}">
                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Profesor</th>

                            </tr>
                            </thead>

                            <tbody>


                            @foreach ($asignaturasGrupo as $asignaturaG)
                                    @for($i=0;$i<count($asignaturaG);$i++)
                                    @if($asignaturaG[$i]->grupo_id==$grupo->grupoId )

                                        <tr>
                                    <th>{{$asignaturaG[$i]->asignaturaNombre}}</th>
                                    <th>{{$asignaturaG[$i]->apellidoP}} {{ $asignaturaG[$i]->apellidoM}}, {{$asignaturaG[$i]->docenteNombre}}</th>
                                        </tr>
                                    @endif
                                    @endfor


                             @endforeach


                            </tbody>
                        </table>
                    </div>


                </div>
        </div>
        </div>@endforeach


    </div>

    <div class="panel panel-info">

        <div class="panel-heading"> <h3 class="panel-title">Registro de grupo</h3> </div>


        {!! Form::open(['route' => 'grupo.addGrupo','method' => 'POST','class'=>'form-inline']) !!}

        <br>
        <div class="panel-body">
        <input type="hidden" name="acta" value="1">
        <div class="form-group">

        {!! Form::label('materia', 'Materia*') !!}


        <select class="form-control" name="asignatura_id" id="asignatura_id" required>
            <option value="">- - - -</option>
            @foreach($materias as $materia )
                <option value="{{$materia['id']}}"> {{$materia['nombre']}}  </option>
                @endforeach

        </select>

            {!! Form::label('grupo', 'Grupo*') !!}


            <select class="form-control" name="grupo_id" id="grupo_id" required>
                <option value="">- - - -</option>
                @foreach($gruposAsignaturas as $grupoAsignatura )
                    <option value="{{$grupoAsignatura['id']}}"> {{$grupoAsignatura['nombre']}}  </option>
                @endforeach

            </select>


            {!! Form::label('docente', 'Docente*') !!}
            <select class="form-control" name="docente_id" id="docente_id" required>
                <option value="">- - - -</option>
                @foreach($docentes as $docente )

                    <option value="{{$docente['docente_id']}}"> {{$docente['apellidoP']}} {{$docente['apellidoM']}} {{$docente['name']}}  </option>
                @endforeach

            </select>
            <br><br>
            {!! Form::label('horario', 'Horario*') !!}
            <select class="form-control" name="horaDias_id" id="horaDias_id" required>
                <option value="">- - - -</option>
                @foreach($horarios as $horario )
                    <option value="{{$horario['id']}}">  {{$horario['nombre']}} ||{{$horario['dias']}}  </option>
                @endforeach

            </select>
            <br>

            <br>

            <div class="form-group navbar-default nav-justified col-lg-5  " >
            {!! Form::submit('Registrar',array('class'=>'btn btn-success btn-block')) !!}
            {!! Form::close() !!}
                </div>
        </div>
        </div>


    </div>



</div>