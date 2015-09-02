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
                            <li class="text-capitalize">
                                @foreach(config('optionsIdentificaciones.identificaciones') as $k => $v)
                                    @if($k == $user->tipoIdOficial)
                                        {{$v}}
                                    @endif
                                @endforeach
                            </li>
                            <li><strong>No Id:</strong> {{$user->noIdOficial}}</li>
                        </ul>
                    </dd>

                    <dt>Estado Civil</dt>
                    <dd>{{$user->edoCivil}}</dd>

                    <dt>Hijos</dt>
                    <dd>{{$user->numHijos}}</dd>

                    @if(isset($docente))

                        <dt>Status</dt>
                        <dd>{{$docente->status}}</dd>

                        <dt>Escuela IPN</dt>
                        <dd>{{$docente->escuelaLugarIpn}}</dd>

                        <dt>Extensión IPN</dt>
                        <dd>{{$docente->extensionIpn}}</dd>

                    @endif

                    @if(isset($alumno))
                    <dt>Vive Con</dt>
                    <dd>{{$alumno->viveCon}}</dd>


                    <dt>Depende de </dt>
                    <dd>{{$alumno->dependEconomic}}</dd>
                    @endif
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
                    <abbr title="phone"><i class="fa fa-mobile"></i></abbr> {{"Celular: ".$user->telMovil}}<br>
                    @if(isset($docente))
                        <abbr title="phone"><i class="fa fa-mobile"></i></abbr> {{"Celular: ".$docente->movil}}
                    @endif
                </address>
                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:{{$user->email}}">{{$user->email}}</a> <br>
                    @if(isset($docente))
                        <a href="mailto:{{$docente->email1}}">{{$docente->email1}}</a><br>
                        <a href="mailto:{{$docente->email2}}">{{$docente->email1}}</a><br>
                        <strong>Web</strong><br>
                        <a href="{{$docente->web}}">{{$docente->web}}</a><br>
                     @endif

                </address>

            </div>
        </div>

    </div>
</div>