

<!-- Modal -->
<div class="modal fade" id="modalInscribir{{$alumno->alumno_id}}" tabindex="-1" role="dialog" aria-labelledby="modalInscribir{{$alumno->alumno_id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>

                <h4 class="modal-title" id="myModalLabel8">Inscribir asignaturas para: {{$alumno->name}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</h4>

            </div>
            <div class="modal-body">


                {!! Form::open(['route' => 'inscripcion.addInscripcion','method' => 'POST']) !!}

                {!! Form::hidden('id',$alumno->alumno_id) !!}
             <div class="form-group" >

     <!--                                 ////////////////////////////////////////////  -->

                 <div class="panel panel-primary">
                     <div class="panel-heading">Grupos</div>

                     <div class="panel-body">
                         @foreach($grupos as $grupo)

                             <div class="panel panel-info">
                                 <div class="panel-heading">{{$grupo-> grupoNombre}} </div>
                                 <div class="panel-body">

                             @foreach($asignaturasGrupo as $asignaturaG)
                                 @for($i=0;$i<count($asignaturaG);$i++)

                                     @if($asignaturaG[$i]->grupo_id==$grupo->grupoId )
                                         <div class="text-info" >
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         <input type="checkbox" name="option{{$asignaturaG[$i]->id}}" value="{{$asignaturaG[$i]->id}}">

                                         {{$asignaturaG[$i]->asignaturaNombre}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         Profesor: {{$asignaturaG[$i]->apellidoP}} {{ $asignaturaG[$i]->apellidoM}}, {{$asignaturaG[$i]->docenteNombre}}
<br>                                    </div>
                                     @endif
                                 @endfor

                             @endforeach
                             </div></div>

                         @endforeach

                     </div>
                 </div>



      <!--                                 ////////////////////////////////////////////  -->

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Inscribir ',array('class'=>'btn btn-success')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
