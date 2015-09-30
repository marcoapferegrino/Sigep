
<div class="col-md-11 ">
<div class="panel-group"  >


<div class="panel-heading" role="tab">
    <div class="panel panel-info">

        <div class="panel-heading"> <h3 class="panel-title">Registro a grupo


                <b class="pull-right">Período: <b style="color: #101010;font-size: 120%" >{{ $actual }}</b></b>
            </h3>


        </div>

        <div class="form-inline navbar-left pull-right">
            {!! Form::open(['route' => 'periodos.filtroPeriodo','method' => 'GET','class'=>'form-inline navbar-form navbar-left pull-right','role'=>'search']) !!}
            <div class="form-group">
                Registrar en período:
                <select class="form-control" name="periodo_id" id="periodo_id" required>
                    <option value="">- - - -</option>
                    @foreach($periodos as $periodo )
                        <option value="{{$periodo['id']}}"> {{$periodo['nombre']}}  </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> </button>


            <a class="btn btn-success " href="{{url('getAddGrupo')}}" role="button" ><i class="fa fa-refresh"></i></a>

            {!! Form::close() !!}


        </div>

        {!! Form::open(['route' => 'grupo.addGrupo','method' => 'POST','class'=>'form-inline']) !!}

        <br><br><br><br>
        <div class="panel-body">


            <input type="hidden" name="acta" value="1">
            <div class="form-group">

                {!! Form::label('asignatura', 'Asignatura*') !!}


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
                        <option value="{{$grupoAsignatura->id}}"> {{$grupoAsignatura->nombre}}  </option>
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
    <br><br> <br>

    <h4> Grupos del período en curso</h4>
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
                                <th>Asignatura</th>
                                <th>Docente</th>
                                <th>Acciones</th>

                            </tr>
                            </thead>

                            <tbody>


                            @foreach ($asignaturasGrupo as $asignaturaG)
                                    @for($i=0;$i<count($asignaturaG);$i++)
                                    @if($asignaturaG[$i]->grupo_id==$grupo->grupoId )
                                        <tr>
                                             <td>{{$asignaturaG[$i]->asignaturaNombre}}</td>
                                            <td>{{$asignaturaG[$i]->apellidoP}} {{ $asignaturaG[$i]->apellidoM}}, {{$asignaturaG[$i]->docenteNombre}}</td>
                                            <td>
                                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modalGrupo{{$asignaturaG[$i]->id}}">
                                                   Modificar registro
                                                </button>


                                            </td>
                                        </tr>
                                        @include('admin.partials.updateAsignaturaGrupo')
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





</div>
</div>