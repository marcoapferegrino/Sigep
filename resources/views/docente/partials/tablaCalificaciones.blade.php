



<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach($gruposAsignaturas as $grupoAsignatura)
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="heading{{$grupoAsignatura->id}}">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$grupoAsignatura->id}}" aria-expanded="true" aria-controls="collapse{{$grupoAsignatura->id}}">
                        {{$grupoAsignatura->nombre}} <small>en el salón</small> {{$grupoAsignatura->salon}}
                    </a>
                </h4>
            </div>
            <div id="collapse{{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{$grupoAsignatura->id}}">
                <div class="panel-body">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Calificación</th>
                            @if($grupoAsignatura->acta == 1)
                            <th>Calificar</th>
                            @endif
                        </tr>
                        </thead>
                        {!! Form::open(['route' => ['asignatura.addCalificacion'],'method' => 'POST']) !!}
                        <input type="hidden" name="acta" value="{{$grupoAsignatura->acta}}">
                        <tbody>
                        @foreach($alumnos as $alumno)
                            @if($alumno->asignatura_grupo_id == $grupoAsignatura->id)

                                @if($alumno->calificacion == 'S/C')
                                    <?php $classCalificacion = 'default'?>
                                @elseif($alumno->calificacion>5)
                                    <?php $classCalificacion = 'success'?>
                                @elseif($alumno->calificacion<6)
                                    <?php $classCalificacion = 'danger'?>
                                @else
                                    <?php $classCalificacion = 'default'?>
                                @endif

                                <tr class="{{$classCalificacion}}">
                                    <td>{{$alumno->name . " " .$alumno->apellidoP." ". $alumno->apellidoM}}</td>
                                    <td>{{$alumno->email}}</td>
                                    <td>
                                        @if($alumno->calificacion == 'S/C')
                                            Sin calificar
                                        @else
                                            {{$alumno->calificacion}}
                                        @endif
                                    </td>
                                    <td>

                                    @if($grupoAsignatura->acta == 1)

                                        <div class="row">
                                            <div class="col-md-6">


                                                <input type="hidden" name="inscripcion_ids[]" value="{{$alumno->inscripcion_id}}">
                                                {!!Form::select('calificaciones[]', config('optionsCalifications.calificaciones'),null,['class'=>'form-control'])!!}

                                            </div>

                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    @if($grupoAsignatura->acta == 1)
                    <div class="col-md-8 col-lg-offset-2">
                        <button type="submit" onclick="return confirm('Seguro que se merecen estas calificaciones ?')" class="btn btn-info btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Enviar calificación">
                            Enviar Calificaciones  <i class="fa fa-send"></i>
                        </button>
                    </div>
                    <div class="col-md-8 col-lg-offset-2">
                        <button type="submit" onclick="return confirm('Ya no podrás modificar calificaciones.Seguro?')" class="btn btn-warning btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Cerrar Acta">
                            Cerrar acta para calificar  <i class="fa fa-close"></i>
                        </button>
                    </div>
                    @endif

                </div>

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
</div>