@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">

                <div class="page-header">
                    <h1>
                        <i class="fa fa-user"></i>
                        Alumno: {{$user->getNombreCompleto()}}
                        <small>
                            <a href="mailto:{{$user->email}}">{{$user->email}} </a>
                            <br>Boleta:{{$alumno->boleta}}
                        </small>
                        <br>
                    </h1>

                </div>

                @include('docente.partials.datosGeneralesUsuario')

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Estudios</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt> Grado de estudios </dt>
                            <dd> {{$alumno->gradoDeEstudios}} </dd>

                            <dt> Situación de estudios </dt>
                            <dd> {{$alumno->situacionEstudios}}  </dd>

                            <dt> Calificación </dt>
                            <dd> {{$alumno->califEstudios}}  </dd>

                            <dt> Localidad de estudios </dt>
                            <dd> {{$alumno->localidadEstudios }}  </dd>

                            <dt> Años que estudio </dt>
                            <dd> {{$alumno->aniosEstudios }}  </dd>

                            <dt> Escuela </dt>
                            <dd> {{$alumno->escuela }}  </dd>

                            <dt> Especialidad </dt>
                            <dd> {{$alumno->especialidadCarrera }}  </dd>

                            <dt> Observaciones </dt>
                            <dd> {{$alumno->observacionEstudios }}  </dd>
                        </dl>
                    </div>
                </div>

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Último empleo </h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt> Empresa </dt>
                            <dd> {{$alumno->empresaUltimoEmpleo}} </dd>

                            <dt> Puesto </dt>
                            <dd> {{$alumno->puestoCategUltimoEmpleo}}  </dd>

                            <dt> Jefe inmediato </dt>
                            <dd> {{$alumno->jefeInmediatoUltimoEmpleo}}  </dd>

                            <dt> Teléfono </dt>
                            <dd> {{$alumno->telefonoUltimoEmpleo }}  </dd>

                            <dt> Fecha ingreso </dt>
                            <dd> {{$alumno->fechaIngresoUltimoEmpleo }}  </dd>

                            <dt> Fecha salida </dt>
                            <dd> {{$alumno->fechaTerminoUltimoEmpleo }}  </dd>

                            <dt> Actividades </dt>
                            <dd> {{$alumno->actividadesUltimoEmpleo }}  </dd>

                            <dt> Motivos de separación de la empresa </dt>
                            <dd> {{$alumno->motivosSeparacionUltimoEmpleo }}  </dd>


                        </dl>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Curriculum</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">

                            <dt> Actividades que conozco </dt>
                            <dd> {{$alumno->actividadesQueConoce}} </dd>

                            <dt> Conocimientos Software </dt>
                            <dd> {{$alumno->conocimientoSoftware }}  </dd>

                            <dt> Otros conocimientos </dt>
                            <dd> {{$alumno->obsconocimientos }}  </dd>


                        </dl>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Referencias</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <dt> Nombre 1 </dt>
                                    <dd> {{$alumno->ref1Nombre}} </dd>

                                    <dt> Afinidad </dt>
                                    <dd> {{$alumno->ref1Afinidad}}  </dd>

                                    <dt> Domicilio </dt>
                                    <dd> {{$alumno->ref1Domicilio}}  </dd>

                                    <dt> Teléfono </dt>
                                    <dd> {{$alumno->ref1Telefono }}  </dd>

                                    <dt> Tiempo de conocerlo </dt>
                                    <dd> {{$alumno->ref1Tiempoconocerlo }}  </dd>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <dt> Nombre 2 </dt>
                                    <dd> {{$alumno->ref2Nombre}} </dd>

                                    <dt> Afinidad </dt>
                                    <dd> {{$alumno->ref2Afinidad}}  </dd>

                                    <dt> Domicilio </dt>
                                    <dd> {{$alumno->ref2Domicilio}}  </dd>

                                    <dt> Teléfono </dt>
                                    <dd> {{$alumno->ref2Telefono }}  </dd>

                                    <dt> Tiempo de conocerlo </dt>
                                    <dd> {{$alumno->ref2Tiempoconocerlo }}  </dd>
                                </div>
                            </div>

                        </dl>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection