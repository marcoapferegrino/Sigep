

<!-- Modal -->
<div class="modal fade" id="modalAddAsignatura" tabindex="-1" role="dialog" aria-labelledby="modalAddAsignatura">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Asignatura</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'asignatura.addAsignatura','method' => 'POST']) !!}



                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',null, array('class' => 'form-control','id'=>'periodo','placeholder'=>'Nombre de la asignatura'))!!}
                </div>

                <div class="form-group">
                    {!! Form::label('creditos', 'Créditos') !!}
                    {!! Form::number('creditos',null, array('class' => 'form-control','id'=>'creditos','placeholder'=>'Créditos equivalentes'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('horasPract', 'Horas de práctica') !!}
                    {!! Form::number('horasPract',null, array('class' => 'form-control','id'=>'horasPract','placeholder'=>'Horas de Práctica'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('horasTeoricas', 'Horas de teoría') !!}
                    {!! Form::number('horasTeoricas',null, array('class' => 'form-control','id'=>'horasTeoricas','placeholder'=>'Horas de Teoría'))!!}
                </div>

                <div class="form-group">
                     {!! Form::label('tipo', 'Tipo de Asignatura') !!}
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="">- - - -</option>
                        <option value="obligatoria">Obligatoria</option>
                        <option value="seminario">seminario</option>
                        <option value="optativa">Optativa</option>
                        <option value="estancia">Estancia</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('fechaElabP', 'Fecha Elaboración') !!}
                    <input type="date" class="form-control" id="fechaElabP"  name="fechaElabP" placeholder="Fecha de Elaboración de materia"  value={{\Carbon\Carbon::now() }}  >
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