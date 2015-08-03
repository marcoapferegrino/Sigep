

<!-- Modal -->
<div class="modal fade" id="modalPeriodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Periodo</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'periodo.addPeriodo','method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre') !!}
                        {!! Form::text('nombre',null, array('class' => 'form-control','id'=>'nombre','placeholder'=>'Nombre del Periodo'))!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('inicio', 'Fecha inicio') !!}
                        <input type="date" class="form-control" id="inicio" name="inicio" placeholder="Fecha de inicio" min={!!\Carbon\Carbon::now() !!}  value={!!\Carbon\Carbon::now() !!}  >
                    </div>

                    <div class="form-group">
                        {!! Form::label('fin', 'Fecha fin') !!}
                        <input type="date" class="form-control" id="fin"  name="fin" placeholder="Fecha de fin" min={{\Carbon\Carbon::now() }}  value={{\Carbon\Carbon::now() }}  >
                    </div>

                    <div class="form-group">
                        {!! Form::label('programa', 'Programa') !!}
                        <select class="form-control" name="programa_id" id="programa_id">
                            <option value="">- - - -</option>
                            @foreach($programas as $programa)
                                <tr>
                                    <option value="{{$programa->id}}">{{$programa->nombre}} </option>
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
