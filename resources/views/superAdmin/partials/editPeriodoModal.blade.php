<!-- Modal -->
<div class="modal fade" id="modalEditPeriodo{{$periodo->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditPeriodo{{$periodo->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Periodo: {{$periodo->nombre}}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'periodo.updatePeriodo','method' => 'POST']) !!}
                    {!! Form::hidden('id',$periodo->id) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',$periodo->nombre, array('class' => 'form-control','id'=>'nombre','placeholder'=>'Nombre del Periodo'))!!}
                </div>

                <div class="form-group">
                    {!! Form::label('inicioPeriodo', 'Fecha inicio Periodo') !!}
                    <input type="date" class="form-control" id="inicioPeriodo" name="inicioPeriodo" placeholder="Fecha de inicio"  value={{$periodo->inicioPeriodo}}  >
                </div>

                <div class="form-group">
                    {!! Form::label('finPeriodo', 'Fecha fin Periodo') !!}
                    <input type="date" class="form-control" id="finPeriodo"  name="finPeriodo" placeholder="Fecha de fin"  value={{$periodo->finPeriodo}} >
                </div>
                <div class="form-group">
                    {!! Form::label('inicioCalificaciones', 'Fecha inicio Calificaciones') !!}
                    <input type="date" class="form-control" id="inicioCalificaciones" name="inicioCalificaciones" placeholder="Fecha de inicio"   value={{$periodo->inicioCalificaciones}}  >
                </div>

                <div class="form-group">
                    {!! Form::label('finCalificaciones', 'Fecha fin Calificaciones') !!}
                    <input type="date" class="form-control" id="finCalificaciones"  name="finCalificaciones" placeholder="Fecha de fin"  value={{$periodo->finCalificaciones}}  >
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