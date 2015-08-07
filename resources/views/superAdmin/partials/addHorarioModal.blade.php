<!-- Modal -->
<div class="modal fade" id="modalHorario" tabindex="-1" role="dialog" aria-labelledby="modalHorario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalHorario">Agregar Horario</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-info" role="alert">El <strong>Formato</strong> del horario es en <strong>24hrs</strong></div>
                {!! Form::open(['route' => 'horarios.addHorario','method' => 'POST','class'=>'form-inline']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',null, array('class' => 'form-control','id'=>'nombre','placeholder'=>'Nombre del horario'))!!}
                </div>
                <br><br>

                <div class="form-group">
                   <strong>Lunes</strong>  <br>
                    Inicio
                    <input class= "form-control" type="time" name="lunesI" id="lunesI">
                    Fin
                    <input class= "form-control" type="time" name="lunesF" id="lunesF">
                </div>
                <br><br>

                <div class="form-group">
                    <strong>Martes</strong> <br>
                    Inicio
                    <input class= "form-control" type="time" name="martesI" id="martesI">
                    Fin
                    <input class= "form-control" type="time" name="martesF" id="martesF">
                </div>
                <br><br>

                <div class="form-group">
                    <strong>Miércoles</strong> <br>
                    Inicio
                    <input class= "form-control" type="time" name="miercolesI" id="miercolesI">
                    Fin
                    <input class= "form-control" type="time" name="miercolesF" id="miercolesF">
                </div>
                <br><br>

                <div class="form-group">
                    <strong>Jueves</strong> <br>
                    Inicio
                    <input class= "form-control" type="time" name="juevesI" id="juevesI">
                    Fin
                    <input class= "form-control" type="time" name="juevesF" id="juevesF">
                </div>
                <br><br>

                <div class="form-group">
                    <strong>Viernes</strong> <br>
                    Inicio
                    <input class= "form-control" type="time" name="viernesI" id="viernesI">
                    Fin
                    <input class= "form-control" type="time" name="viernesF" id="viernesF">
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