

<!-- Modal -->
<div class="modal fade" id="modalEditMateria{{$asignatura->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditMateria{{$asignatura->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Asignatura:{{$asignatura->nombre}}</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'asignatura.updateAsignatura','method' => 'POST']) !!}

                {!! Form::hidden('id',$asignatura->id) !!}

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',$asignatura->nombre, array('class' => 'form-control','id'=>'periodo','placeholder'=>'Nombre de la asignatura','required'))!!}
                </div>

                <div class="form-group">
                    {!! Form::label('creditos', 'Créditos') !!}
                    {!! Form::number('creditos',$asignatura->creditos, array('class' => 'form-control','id'=>'creditos','placeholder'=>'Créditos equivalentes','required'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('horasPract', 'Horas de práctica') !!}
                    {!! Form::number('horasPract',$asignatura->horasPract, array('class' => 'form-control','id'=>'horasPract','placeholder'=>'Horas de Práctica','required'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('horasTeoricas', 'Horas de teoría') !!}
                    {!! Form::number('horasTeoricas',$asignatura->horasTeoricas, array('class' => 'form-control','id'=>'horasTeoricas','placeholder'=>'Horas de Teoría','required'))!!}
                </div>

                <div class="form-group">
                     {!! Form::label('tipo', 'Tipo de Asignatura') !!}
                    <select class="form-control" name="tipo" id="tipo" required >
                        <option value="">- - - -</option>
                        <option value="obligatoria">Obligatoria</option>
                        <option value="seminario">Seminario</option>
                        <option value="optativa">Optativa</option>
                        <option value="estancia">Estancia</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('fechaElabP', 'Fecha Elaboración') !!}
                    <input type="date" class="form-control" id="fechaElabP"  name="fechaElabP"  required placeholder="Fecha de Elaboración de materia"  value={{$asignatura->fechaElabP}}  >
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