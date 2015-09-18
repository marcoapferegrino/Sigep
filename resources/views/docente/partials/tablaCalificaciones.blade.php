



<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @if(!empty($gruposAsignaturas))
        @foreach($gruposAsignaturas as $grupoAsignatura)
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="heading{{$grupoAsignatura->id}}">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$grupoAsignatura->id}}" aria-expanded="true" aria-controls="collapse{{$grupoAsignatura->id}}">
                            {{$grupoAsignatura->nombre}} <small>en el salón</small> {{$grupoAsignatura->salon}} <small> Periodo</small> {{$grupoAsignatura->nombrePeriodo}}
                        </a>
                        @if($grupoAsignatura->acta == 0)
                            <div class="pull-right text-danger">¡ Esta acta esta cerrada !</div>
                        @else
                            <div class="pull-right ">Acta abierta</div>
                        @endif
                    </h4>
                </div>
                <div id="collapse{{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{$grupoAsignatura->id}}">
                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                @if($grupoAsignatura->finPeriodo>\Carbon\Carbon::now())<th>Calificación</th>@endif
                                @if($grupoAsignatura->acta == 1 || Auth::getRol()=='superAdmin')
                                <th>Calificar</th>
                                @endif
                            </tr>
                            </thead>

                            @if(Auth::getRol()=='superAdmin')
                                {!! Form::open(['route' => ['alumnos.calificar'],'method' => 'POST']) !!}
                            @endif

                            @if(Auth::getRol()=='docente')
                                {!! Form::open(['route' => ['asignatura.addCalificacion'],'method' => 'POST']) !!}
                            @endif


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
                                            @if($grupoAsignatura->finPeriodo>\Carbon\Carbon::now())
                                                @if($grupoAsignatura->acta == 1|| Auth::getRol()=='superAdmin')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="inscripcion_ids[]" value="{{$alumno->inscripcion_id}}">
                                                            {!!Form::select('calificaciones[]', config('optionsCalifications.calificaciones'),null,['class'=>'form-control'])!!}

                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                       @if($grupoAsignatura->finPeriodo>\Carbon\Carbon::now())
                            @if(($grupoAsignatura->acta == 1 && Auth::getRol()=='docente')|| Auth::getRol()=='superAdmin')
                                <div class="col-md-8 col-lg-offset-2">
                                    <button type="submit" onclick="return confirm('Seguro que se merecen estas calificaciones ?')" class="btn btn-info btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Enviar calificación">
                                        Enviar Calificaciones  <i class="fa fa-send"></i>
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            @endif
                            @if($grupoAsignatura->acta == 0 && Auth::getRol()=='superAdmin')
                                    {!! Form::open(['route' => ['calificaciones.abrirActa'],'method' => 'POST']) !!}
                                        <div class="col-md-8 col-lg-offset-2">
                                            <input type="hidden" name="id" value="{{$grupoAsignatura->id}}">
                                            <button type="submit" onclick="return confirm('Seguro?')" class="btn btn-warning btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Abrir acta">
                                                Abrir acta <i class="fa fa-folder-open"></i>
                                            </button>
                                        </div>
                                    {!! Form::close() !!}

                            @endif
                            @if($grupoAsignatura->acta == 1)
                            {!! Form::open(['route' => ['calificaciones.cerrarActa'],'method' => 'POST']) !!}
                            <div class="col-md-8 col-lg-offset-2">
                                <input type="hidden" name="id" value="{{$grupoAsignatura->id}}">
                                <button type="submit" onclick="return confirm('Ya no podrás modificar calificaciones.Seguro?')" class="btn btn-danger btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Cerrar Acta">
                                    Cerrar acta para calificar  <i class="fa fa-close"></i>
                                </button>
                            </div>
                            {!! Form::close() !!}
                             @endif


                        @endif
                    </div>
                    </div>
                </div>

        @endforeach
    @else
        <div class="alert alert-danger" role="alert"> :( No hay resultados con esos valores.</div>
    @endif
</div>