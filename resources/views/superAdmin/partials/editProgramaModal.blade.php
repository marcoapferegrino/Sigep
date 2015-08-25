<!-- Modal -->
<div class="modal fade" id="modalEditPrograma{{$programa->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditPrograma{{$programa->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Programa: {{$programa->nombre}}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'programa.updatePrograma','method' => 'POST']) !!}

                {!! Form::hidden('id',$programa->id)!!}

                <div class="form-group">
                    {!! Form::label('escuela', 'Escuela') !!}
                    {!! Form::text('escuela',$programa->escuela, array('class' => 'form-control','id'=>'escuela','placeholder'=>'Nombre de la Escuela', ' required'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',$programa->nombre, array('class' => 'form-control','id'=>'periodo','placeholder'=>'Nombre del Periodo', 'required'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('periodo', 'Periodo') !!}
                    <select class="form-control" name="periodo_id" id="periodo_id" required>
                        <option value="">- - - -</option>
                        @foreach($periodos as $periodos)
                                <option value="{{$periodos->id}}">{{$periodos->nombre}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Guardar',array('class'=>'btn btn-success')) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>