

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
                    {!! Form::label('claveAsignatura', 'Clave de Asignatura') !!}
                    {!! Form::text('claveAsignatura',$asignatura->claveAsignatura, array('class' => 'form-control','id'=>'claveAsignatura','placeholder'=>'Clave de la asignatura'))!!}
                </div>

                <div class="form-group">
                    {!! Form::label('creditos', 'Créditos') !!}
                    {!! Form::number('creditos',$asignatura->creditos, array('class' => 'form-control','id'=>'creditos','placeholder'=>'Créditos equivalentes','required'))!!}
                </div>
                <div class="form-group">
                    {!! Form::label('horas', 'Horas') !!}
                    {!! Form::number('horas',$asignatura->horas, array('class' => 'form-control','id'=>'horas','placeholder'=>'Horas de clase'))!!}
                </div>


                <div class="form-group">
                    {!! Form::label('curso', 'Tipo de curso') !!}
                    <select class="form-control" name="curso" id="curso">
                        <option selected="{{$asignatura->curso}}">{{$asignatura->curso}}</option>
                        <option value="Teórico">Teórico</option>
                        <option value="Práctico">Práctico</option>
                        <option value="T/P">T/P</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo de Asignatura') !!}
                    <select class="form-control" name="tipo" id="tipo">
                        <option selected="{{$asignatura->tipo}}">{{$asignatura->tipo}}</option>
                        <option value="obligatoria">Obligatoria</option>
                        <option value="seminario">Seminario</option>
                        <option value="optativa">Optativa</option>
                        <option value="movilidad">Movilidad</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('fechaVigencia', 'Fecha de vigencia') !!}
                    <input type="date" class="form-control" id="fechaVigencia"  name="fechaVigencia" placeholder="Fecha de Elaboración de materia"  value={{$asignatura->fechaVigencia}}  >
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