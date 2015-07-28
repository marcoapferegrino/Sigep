

<!-- Modal -->
<div class="modal fade" id="modalAddAsignatura" tabindex="-1" role="dialog" aria-labelledby="modalAddAsignatura">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Asignatura</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'programa.addPrograma','method' => 'POST']) !!}



                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',null, array('class' => 'form-control','id'=>'periodo','placeholder'=>'Nombre del Periodo'))!!}
                </div>

                <div class="form-group">
                    {!! Form::label('creditos', 'Créditos') !!}
                    {!! Form::text('creditos',null, array('class' => 'form-control','id'=>'creditos','placeholder'=>'Créditos'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('hrsPractica', 'Horas de práctica') !!}
                    {!! Form::text('hrsPractica',null, array('class' => 'form-control','id'=>'hrsPractica','placeholder'=>'Horas de Práctica'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('horasTeoricas', 'Horas de teoría') !!}
                    {!! Form::text('horasTeoricas',null, array('class' => 'form-control','id'=>'horasTeoricas','placeholder'=>'Horas de Teoria'))!!}
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



                <div class="form-group">
                    {!! Form::label('periodo', 'Periodo') !!}
                    <select class="form-control" name="periodo_id" id="periodo_id">
                        <option value="">- - - -</option>
                        @foreach($periodos as $periodo)
                            <tr>
                                <option value="{{$periodo->id}}">{{$periodo->nombre}} </option>
                            </tr>
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