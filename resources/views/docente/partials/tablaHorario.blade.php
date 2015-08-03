
<table class="table table-hover">
    <thead>
    <tr>
        <th>Grupo</th>
        <th>Materia</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($datos);$i++)
        <tr>
            <td>
                {{$datos[$i]->salon}}
            </td>
            <td>
                {{$datos[$i]->nombre}}
            </td>
            <td>
                @foreach($horario[$i] as $hora)
                    @if($hora->dia === 'lun' )
                        {{$hora->horaInicio.'-'.$hora->horaFin}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($horario[$i] as $hora)
                    @if($hora->dia === 'mar' )
                        {{$hora->horaInicio.'-'.$hora->horaFin}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($horario[$i] as $hora)
                    @if($hora->dia === 'mier' )
                        {{$hora->horaInicio.'-'.$hora->horaFin}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($horario[$i] as $hora)
                    @if($hora->dia === 'juev' )
                        {{$hora->horaInicio.'-'.$hora->horaFin}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($horario[$i] as $hora)
                    @if($hora->dia === 'viern' )
                        {{$hora->horaInicio.'-'.$hora->horaFin}}
                    @endif
                @endforeach
            </td>

        </tr>
    @endfor
    </tbody>
</table>