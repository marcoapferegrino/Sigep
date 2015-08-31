@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">

                <div class="page-header">
                    <h1><i class="fa fa-user"></i>
                        Docente:
                        {{$user->getNombreCompleto()}}
                        <small>
                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        </small>
                    </h1>
                </div>

                @include('docente.partials.datosGeneralesUsuario')


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Licenciatura</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Escuela</dt>
                            <dd>{{$docente->escuelaLicenciatura}}</dd>

                            <dt>Localidad </dt>
                            <dd>{{$docente->localidadLicenciatura}}</dd>

                            <dt>Carrera</dt>
                            <dd>{{$docente->carreraLicenciatura}}</dd>

                            <dt>Especialidad</dt>
                            <dd>{{$docente->especialidadLicenciatura}}</dd>

                            <dt>Situación</dt>
                            <dd>{{$docente->situacionLicenciatura}}</dd>

                            <dt>Año inicio</dt>
                            <dd>{{$docente->anioinicialLicenciatura}}</dd>

                            <dt>Año final</dt>
                            <dd>{{$docente->ultimoAnioLicenciatura}}</dd>

                            <dt>Tesis</dt>
                            <dd>{{$docente->tesisLicenciatura}}</dd>

                            <dt>Fecha exámen</dt>
                            <dd>{{$docente->examenLicenciatura}}</dd>

                            <dt>Cédula</dt>
                            <dd>{{$docente->cedulaLicenciatura}}</dd>

                            <dt>Observaciónes</dt>
                            <dd>{{$docente->observacionesLicenciatura}}</dd>

                        </dl>
                    </div>
                </div>

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Maestría</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Escuela</dt>
                            <dd>{{$docente->escuelaMaestria}}</dd>

                            <dt>Localidad </dt>
                            <dd>{{$docente->localidadMaestria}}</dd>

                            <dt>Carrera</dt>
                            <dd>{{$docente->carreraMaestria}}</dd>

                            <dt>Especialidad</dt>
                            <dd>{{$docente->especialidadMaestria}}</dd>

                            <dt>Situación</dt>
                            <dd>{{$docente->situacionEstudiosMaestria}}</dd>

                            <dt>Año inicio</dt>
                            <dd>{{$docente->anioIniciaEstudiosMaestria}}</dd>

                            <dt>Año final</dt>
                            <dd>{{$docente->ultimoAnioEstudiosMaestria}}</dd>

                            <dt>Tesis</dt>
                            <dd>{{$docente->tesisMaestria}}</dd>

                            <dt>Fecha exámen</dt>
                            <dd>{{$docente->examenMaestria}}</dd>

                            <dt>Cédula</dt>
                            <dd>{{$docente->cedulaMaestria}}</dd>

                            <dt>Observaciónes</dt>
                            <dd>{{$docente->observacionesMaestria}}</dd>

                        </dl>
                    </div>
                </div>

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Doctorado</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Escuela</dt>
                            <dd>{{$docente->escuelaDoctorado}}</dd>

                            <dt>Localidad </dt>
                            <dd>{{$docente->localidadDoctorado}}</dd>

                            <dt>Carrera</dt>
                            <dd>{{$docente->carreraDoctorado}}</dd>

                            <dt>Especialidad</dt>
                            <dd>{{$docente->especialidadDoctorado}}</dd>

                            <dt>Situación</dt>
                            <dd>{{$docente->situacionEstudiosDoctorado}}</dd>

                            <dt>Año inicio</dt>
                            <dd>{{$docente->anioiniciaestudiosDoctorado}}</dd>

                            <dt>Año final</dt>
                            <dd>{{$docente->ultimoAnioEstudiosDoctorado}}</dd>

                            <dt>Tesis</dt>
                            <dd>{{$docente->tesisDoctorado}}</dd>

                            <dt>Fecha exámen</dt>
                            <dd>{{$docente->examenDoctorado}}</dd>

                            <dt>Cédula</dt>
                            <dd>{{$docente->cedulaDoctorado}}</dd>

                            <dt>Observaciónes</dt>
                            <dd>{{$docente->observacionesDoctorado}}</dd>

                        </dl>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos Laborales</h3>
                    </div>
                    <div class="panel-body">
                        <dl>
                            <dt>Categoría</dt>
                            <dd>{{$docente->categoria}}</dd>

                            <dt>Nivel</dt>
                            <dd>{{$docente->nivel}}</dd>

                            <dt>Clave presupuestal</dt>
                            <dd>{{$docente->clavePresupuestal}}</dd>

                            <dt>Ingreso al IPN</dt>
                            <dd>{{$docente->ingresoIpn}}</dd>

                            <dt>Número de empleado</dt>
                            <dd>{{$docente->numEmpleado}}</dd>

                            <dt>Número de tarjeta</dt>
                            <dd>{{$docente->numTarjetaEscom}}</dd>

                            <dt>SIP</dt>
                            <dd>{{$docente->sip}}</dd>
                        </dl>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection