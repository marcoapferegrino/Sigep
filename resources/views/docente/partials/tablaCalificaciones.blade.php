



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
                                    <td>{{$alumno->email}}{{$alumno->inscripcion_id}}</td>
                                    <td>
                                        @if($alumno->calificacion == 'S/C')
                                            Sin calificar
                                        @else
                                            {{$alumno->calificacion}}
                                        @endif
                                    </td>
                                    <td>

                                    @if($grupoAsignatura->acta == 1)
                                        {!! Form::open(['route' => ['asignatura.addCalificacion'],'method' => 'POST']) !!}
                                        <div class="row">
                                            <div class="col-md-6">

                                                <input type="hidden" name="inscripcion_id" value="{{$alumno->inscripcion_id}}">
                                                {!!Form::select('calificacion', config('optionsCalifications.calificaciones'),null,['class'=>'form-control'])!!}

                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" onclick="return confirm('Seguro que se merece esta calificación?')" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Enviar calificación">
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        </div>

                                    {!! Form::close() !!}
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endforeach
</div>