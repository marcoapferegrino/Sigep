@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('partials.messages')

            <div class="col-md-12 ">

                <div class="page-header">
                    <h1><i class="fa fa-user"></i> {{$user->getNombreCompleto()}} <small><a href="mailto:{{$user->email}}">{{$user->email}}</a></small></h1>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Datos generales </h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Nombre Completo</dt>
                                    <dd>{{$user->getNombreCompleto()}}</dd>

                                    <dt>Fecha de Nacimiento</dt>
                                    <dd>{{$user->fechanac}}</dd>

                                    <dt>Nacionalidad</dt>
                                    <dd>{{$user->nacionalidad}}</dd>

                                    <dt>Estado</dt>
                                    <dd>{{$user->edoNacimiento}}</dd>

                                    <dt>Género</dt>
                                    <dd>{{$user->genero}}</dd>

                                    <dt>RFC</dt>
                                    <dd>{{$user->rfc}}</dd>

                                    <dt>CURP</dt>
                                    <dd>{{$user->curp}}</dd>

                                    <dt>Identificación</dt>
                                    <dd>
                                        <ul class="list-inline">
                                            <li class="text-capitalize">{{$user->tipoIdOficial}}</li>
                                            <li><strong>No Id:</strong> {{$user->noIdOficial}}</li>
                                        </ul>
                                    </dd>

                                    <dt>Estado Civil</dt>
                                    <dd>{{$user->edoCivil}}</dd>

                                    <dt>Hijos</dt>
                                    <dd>{{$user->numHijos}}</dd>

                                    <dt>Vive Con</dt>
                                    <dd>{{$alumno->viveCon}}</dd>

                                    <dt>Depende de </dt>
                                    <dd>{{$alumno->dependEconomic}}</dd>

                                </dl>
                            </div>
                            <div class="col-md-6">
                                <h4>Contacto</h4>
                                <address>
                                    <strong>{{$user->direccion}}</strong><br>
                                    {{"Colonia: ".$user->colonia}}<br>
                                    {{$user->ciudad." ".$user->estado}}<br>
                                    {{"cp: ".$user->cp}} <br>
                                    <abbr title="phone"><i class="fa fa-phone"></i></abbr> {{$user->telefono}} <br>
                                    <abbr title="phone"><i class="fa fa-mobile"></i></abbr> {{"Celular: ".$user->telMovil}}
                                </address>
                                <address>
                                    <strong>Email</strong><br>
                                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                </address>

                            </div>
                        </div>




                    </div>
                </div>

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
                            <dd> {{$alumno->calificacion}}  </dd>

                            <dt> Localidad de estudios </dt>
                            <dd> {{$alumno->localidadEstudios }}  </dd>

                            <dt> Años que estudio </dt>
                            <dd> {{$alumno->aniosEstudios }}  </dd>

                            <dt> Escuela </dt>
                            <dd> {{$alumno->escuela }}  </dd>

                            <dt> Especialidad </dt>
                            <dd> {{$alumno->especialidadCarrera }}  </dd>

                            <dt> Retomar Estudios </dt>
                            <dd> {{$alumno->retomarEstudios }}  </dd>

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

                            <dt> Tiempo en el ramo </dt>
                            <dd> {{$alumno->tiempoEnRamoConstruccion }}  </dd>
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

                            <dt> Herramientas de desarrollo </dt>
                            <dd> {{$alumno->conocimientoHerramientasConstru}}  </dd>

                            <dt> Herramientas de administración </dt>
                            <dd> {{$alumno->conocimientoherramientasadmin}}  </dd>

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

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <dt> Nombre 3 </dt>
                                    <dd> {{$alumno->ref3Nombre}} </dd>

                                    <dt> Afinidad </dt>
                                    <dd> {{$alumno->ref3Afinidad}}  </dd>

                                    <dt> Domicilio </dt>
                                    <dd> {{$alumno->ref3Domicilio}}  </dd>

                                    <dt> Teléfono </dt>
                                    <dd> {{$alumno->ref3Telefono }}  </dd>

                                    <dt> Tiempo de conocerlo </dt>
                                    <dd> {{$alumno->ref3Tiempoconocerlo }}  </dd>
                                </div>
                            </div>


                        </dl>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection