

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
                        {!! Form::text('nombre',null, array('class' => 'form-control','id'=>'nombre','placeholder'=>'Nombre del Periodo','required'))!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('inicioPeriodo', 'Fecha inicio Periodo') !!}
                        <input type="date" class="form-control" id="inicioPeriodo" name="inicioPeriodo" placeholder="Fecha de inicio"   value={!!\Carbon\Carbon::now() !!} required  >
                    </div>

                    <div class="form-group">
                        {!! Form::label('finPeriodo', 'Fecha fin Periodo') !!}
                        <input type="date" class="form-control" id="finPeriodo"  name="finPeriodo" placeholder="Fecha de fin"  value={{\Carbon\Carbon::now() }}  required>
                    </div>
                    <div class="form-group">
                        {!! Form::label('inicioCalificaciones', 'Fecha inicio Calificaciones') !!}
                        <input type="date" class="form-control" id="inicioCalificaciones" name="inicioCalificaciones" placeholder="Fecha de inicio"  value={!!\Carbon\Carbon::now() !!} required  >
                    </div>

                    <div class="form-group">
                        {!! Form::label('finCalificaciones', 'Fecha fin Calificaciones') !!}
                        <input type="date" class="form-control" id="finCalificaciones"  name="finCalificaciones" placeholder="Fecha de fin"  value={{\Carbon\Carbon::now() }} required >
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
