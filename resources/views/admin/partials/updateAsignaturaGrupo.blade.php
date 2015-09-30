

<!-- Modal -->
<div class="modal fade" id="modalGrupo{{$asignaturaG[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="modalGrupo{{$asignaturaG[$i]->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar registro </h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'grupo.updateAsignaturaGrupo','method' => 'POST']) !!}


             <div class="form-group">
                 {!! Form::hidden('asignatura_grupo_id',$asignaturaG[$i]->id) !!}

                 {!! Form::label('periodo', 'Docente*') !!}

                 <select class="form-control" name="docente_id" id="docente_id" required>
                     <option value="">- - - -</option>
                     @foreach($docentes as $docente )

                         <option value="{{$docente['docente_id']}}"> {{$docente['apellidoP']}} {{$docente['apellidoM']}} {{$docente['name']}}  </option>

                             @endforeach

                 </select>
                 <br>
                 {!! Form::label('asignatura', 'Asignatura*') !!}


                 <select class="form-control" name="asignatura_id" id="asignatura_id" required>
                     <option value="">- - - -</option>
                     @foreach($materias as $materia )
                         <option value="{{$materia['id']}}"> {{$materia['nombre']}}  </option>
                     @endforeach

                 </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Actualizar',array('class'=>'btn btn-success')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>