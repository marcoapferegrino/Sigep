@extends('app')



@section('content')
    <div class="container">
        <div class="row">
            @include('partials.messages')
            <div class="col-md-12 ">
                <div class="panel panel-success">
                    <div class="panel-heading"> <h3 class="panel-title">Registro Grupo</h3> </div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'salon.addSalon','method' => 'POST','class'=>'form-inline']) !!}

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos del salón</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    {!! Form::label('nombre', 'Nombre del grupo*') !!}
                                    {!! Form::text('nombre',null, array('class' => 'form-control ','id'=>'nombre','placeholder'=>'Nombre grupo','required','autofocus'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('salon', 'Salón*') !!}
                                    {!! Form::text('salon',null, array('class' => 'form-control ','id'=>'salon','placeholder'=>'Salón del grupo','required'))!!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('semestre', 'Semestre*') !!}
                                    {!! Form::text('semestre',null, array('class' => 'form-control ','id'=>'semestre','placeholder'=>'Semestre del grupo ','required'))!!}
                                </div>

                                <br><br>
                                {!! Form::label('periodo', 'Período al que pertenece*') !!}
                                <select class="form-control" name="periodo_id" id="periodo_id" required>
                                    <option value="">- - - -</option>
                                    @foreach($periodos as $periodo)
                                        <option value="{{$periodo['id']}}"> {{$periodo['nombre']}}  </option>
                                    @endforeach

                                </select>
                                <br><br>

                        {!! Form::submit('Guardar',array('class'=>'btn btn-success btn-block')) !!}
                        {!! Form::close() !!}
                    </div>


                </div>
            </div>
        </div>
            </div>
        </div>
    </div>




@endsection
