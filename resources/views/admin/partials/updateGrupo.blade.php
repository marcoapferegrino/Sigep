

<!-- Modal -->
<div class="modal fade" id="modalEditGrupo{{$grupo->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditGrupo{{$grupo->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Grupo:{{$grupo->nombre}}</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'grupo.updateGrupo','method' => 'POST']) !!}

                {!! Form::hidden('id',$grupo->id) !!}
             <div class="form-group">

                 <div class="form-group">
                     {!! Form::label('nombre', 'Nombre del grupo*') !!}
                     {!! Form::text('nombre',$grupo->nombre, array('class' => 'form-control ','id'=>'nombre','placeholder'=>'Nombre grupo','required','autofocus'))!!}
                 </div>

                 <div class="form-group">
                     {!! Form::label('salon', 'Salón*') !!}
                     {!! Form::text('salon',$grupo->salon, array('class' => 'form-control ','id'=>'salon','placeholder'=>'Salón del grupo','required'))!!}
                 </div>

                 <div class="form-group">
                     {!! Form::label('semestre', 'Semestre*') !!}
                     {!! Form::text('semestre',$grupo->semestre, array('class' => 'form-control ','id'=>'semestre','placeholder'=>'Semestre del grupo ','required'))!!}
                 </div>

                 <br>
                 {!! Form::label('periodo', 'Periodo al que pertenece*') !!}

                 <select class="form-control" name="periodo_id" id="periodo_id" required>
                     <option value="">- - - -</option>
                     @foreach($periodos as $periodo)
                         <option value="{{$periodo['id']}}"> {{$periodo['nombre']}}  </option>
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