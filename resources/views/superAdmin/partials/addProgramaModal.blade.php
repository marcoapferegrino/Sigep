

<!-- Modal -->
<div class="modal fade" id="modalPrograma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Programa</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'programa.addPrograma','method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('escuela', 'Escuela') !!}
                        {!! Form::text('escuela',null, array('class' => 'form-control','id'=>'escuela','placeholder'=>'Nombre de la Escuela'))!!}
                    </div>

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',null, array('class' => 'form-control','id'=>'periodo','placeholder'=>'Nombre del Periodo'))!!}
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