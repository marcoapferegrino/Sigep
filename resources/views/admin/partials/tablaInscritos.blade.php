
<div class="panel panel-info">
    <!-- Default panel contents -->



    <div class="panel-heading">Alumnos inscritos   <b class="pull-right">Período: <b style="color: #262626 ;font-size: 120%" >{{ $actual }}</b></b></div>

    <div class="panel-body">

    <div class="form-inline navbar-left pull-right">
        {!! Form::open(['route' => 'inscritos.inscritosFiltroPeriodo','method' => 'get','class'=>'form-inline navbar-form navbar-left pull-right','role'=>'search']) !!}
    <div class="form-group">
            Buscar en período:
            <select class="form-control" name="periodo_id" id="periodo_id" required>
                <option value="">- - - -</option>
                @foreach($periodos as $periodo )
                    <option value="{{$periodo['id']}}"> {{$periodo['nombre']}}  </option>
                @endforeach

            </select>
        </div>


        <button type="submit" class="btn btn-info"> <i class="fa fa-search"></i> </button>


        <a class="btn btn-success " href="{{url('getInscritos')}}" role="button" ><i class="fa fa-refresh"></i></a>

        {!! Form::close() !!}
        <br> <br><br> <br>

    </div>


    <!-- Table -->
    <table class="table table-hover">
        <thead>
        <tr>

            <th>Alumno</th>
            <th>Boleta</th>
            <th>Materia</th>
            <th>Periodo</th>
            <th>Grupo</th>
            <th>Calificación</th>
            <th>Operaciones</th>

        </tr>
        </thead>
        <tbody>


        @foreach($alumnos as $i=>$alumno)
        @foreach($gruposAsignaturas as  $grupoAsignatura)
                <!--  <div class="panel-heading" role="tab" id="heading{#{$grupoAsignatura->id}}"> -->
        <!-- <div id="collapse{#{$grupoAsignatura->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{#{$grupoAsignatura->id}}"> -->
        @if($alumno->asignatura_grupo_id==$grupoAsignatura->id)
            <tr>

                <td>{{$alumno->name}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}</td>
                <td>{{$alumno->boleta}}</td>
                <td>{{$grupoAsignatura->nombre}}</td>
                <td>{{$grupoAsignatura->nombrePeriodo}}</td>
                <td>{{$grupoAsignatura->salon}}</td>
                @if($alumno->calificacion<6 && !($alumno->calificacion=='S/C') )


                    <td class="text-center" style="background-color: #ce8483">{{$alumno->calificacion}}</td>
              @elseif($alumno->calificacion>=6)
                    <td class="text-center "style="background-color:#A9F5A9">{{$alumno->calificacion}}</td>
                @elseif($alumno->calificacion>='S/C')

                    <td class="text-center" >{{$alumno->calificacion}}</td>
                @endif
                <td>
                    {!! Form::open(['route' => ['alumno.deleteInscripcion',$alumno->inscripcion_id],'method' => 'DELETE']) !!}
                    <button type="submit" onclick="return confirm('¿Seguro que quieres desinscribir la asignatura? Esta acción borrará la calificación ')" class="btn btn-danger">

                        <i class="fa fa-trash-o"></i>
                    </button>
                    {!! Form::close() !!}
                    <a href="{{route('admin.showKardex',$alumno->id)}}">Ver kardex</a>
                </td>
            </tr>
        @endif

        @endforeach
        @endforeach
        </tbody>
    </table>


       {!! $alumnos->appends(['periodo_id'=> Input::get('periodo_id')])->render() !!}


    </div>
</div>



