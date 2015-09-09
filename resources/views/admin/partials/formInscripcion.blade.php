

<div class="panel-group"  >



    <div class="panel panel-info">

        <div class="panel-heading"> <h3 class="panel-title">Registro de grupo</h3> </div>


        {!! Form::open(['route' => 'grupo.addGrupo','method' => 'POST','class'=>'form-inline']) !!}

        <br>
        <input type="hidden" name="acta" value="0">
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
                    <option value="{{$grupoAsignatura['id']}}"> {{$grupoAsignatura['acta']}}  </option>
                @endforeach

            </select>


            {!! Form::label('docente', 'Docente*') !!}
            <select class="form-control" name="docente_id" id="docente_id" required>
                <option value="">- - - -</option>
                @foreach($docentes as $docente )
                    <option value="{{$docente['docente_id']}}"> {{$docente['name']}}  </option>
                @endforeach

            </select>
            <br><br>


            <br>
            <div class="form-group navbar-right ">
            {!! Form::submit('Registrar',array('class'=>'btn btn-success btn-block')) !!}
            {!! Form::close() !!}
                </div>
        </div>


    </div>



</div>