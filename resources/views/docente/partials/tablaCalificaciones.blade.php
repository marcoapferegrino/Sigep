@for($i=0;$i<count($gruposMateriasDeProfesor);$i++)
    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="heading{{$gruposMateriasDeProfesor[$i]->grupo_id.$gruposMateriasDeProfesor[$i]->asignatura_id}}">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$gruposMateriasDeProfesor[$i]->grupo_id.$gruposMateriasDeProfesor[$i]->asignatura_id}}" aria-expanded="false" aria-controls="collapse{{$gruposMateriasDeProfesor[$i]->grupo_id.$gruposMateriasDeProfesor[$i]->asignatura_id}}">
                    {{$gruposMateriasDeProfesor[$i]->nombre}} <small>en el salón</small> {{$gruposMateriasDeProfesor[$i]->salon}}
                </a>
            </h4>
        </div>
        <div id="collapse{{$gruposMateriasDeProfesor[$i]->grupo_id.$gruposMateriasDeProfesor[$i]->asignatura_id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$gruposMateriasDeProfesor[$i]->grupo_id.$gruposMateriasDeProfesor[$i]->asignatura_id}}">
            <div class="panel-body">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Calificación</th>
                    </tr>
                    @foreach($alumnosArray[$i] as $alumno)
                        <tr class="{{$alumno->calificacion>5 ? 'success' : 'danger'}}">
                            <td>{{$alumno->name}}</td>
                            <td>{{$alumno->email}}</td>
                            <td>
                                {!! Form::open(['route' => ['asignatura.addCalificacion'],'method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::number('calificacion',$alumno->calificacion, array('class' => 'form-control','id'=>'calificacion','placeholder'=>'Calificación','required'))!!}
                                        <input type="hidden" name="alumno_id" value="{{$alumno->id}}">
                                        <input type="hidden" name="grupo_id" value="{{$gruposMateriasDeProfesor[$i]->grupo_id}}">
                                        <input type="hidden" name="asignatura_id" value="{{$gruposMateriasDeProfesor[$i]->asignatura_id}}">
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" onclick="return confirm('Seguro que se merece esta calificación?')" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Enviar calificación">
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endfor