<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        @if (!Auth::guest())
            @if(Auth::getRol()=="admin")
                <li class="dropdown dropUsuarios">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrar <i class="fa fa-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="getAddAlumno"><a href="{{url('getAddAlumno')}}"><i class="fa fa-user"></i> Registrar alumno </a></li>
                        <li class="getAddDocente"><a href="{{url('getAddDocente')}}"><i class="fa fa-user-secret"></i> Registrar docente </a></li>
                    </ul>
                </li>

                <li class="getAddSalon"><a href="{{url('getAddSalon')}}">Registro de grupos  <i class="fa fa-pencil fa-lg"></i></a></li>
                <li class="getAddGrupo"><a href="{{url('getAddGrupo')}}">Registro de asignaturas a grupos <i class="fa fa-pencil fa-lg"></i></a></li>
                <li class="getAddInscripcion"><a href="{{url('getAddInscripcion')}}">Inscripciones <i class="fa fa-pencil fa-lg"></i></a></li>


            @elseif(Auth::getRol()=="superAdmin")
                <li class="dropdown" id="dropCatalogos">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cátalogos <i class="fa fa-list"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="homeSA"><a href="{{url('homeSA')}}"><i class="fa fa-calendar-o fa-lg"></i> Periodos </a></li>
                        <li class="asignaturas"><a href="{{url('asignaturas')}}"><i class="fa fa-book fa-lg"></i> Asignaturas </a></li>
                        <li class="horarios"><a href="{{url('horarios')}}"><i class="fa fa-table fa-lg"></i> Horarios </a></li>
                    </ul>
                </li>
                <li class="dropdown dropUsuarios">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <i class="fa fa-users fa-lg"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="showUsuarios"><a href="{{url('showUsuarios')}}"><i class="fa fa-search"></i> Lista usuarios </a></li>
                        <li class="getAddAlumno"><a href="{{url('getAddAlumno')}}"><i class="fa fa-user"></i> Registrar alumno </a></li>
                        <li class="getAddDocente"><a href="{{url('getAddDocente')}}"><i class="fa fa-user-secret"></i> Registrar docente </a></li>
                    </ul>
                </li>
                <li class="dropdown" id="dropEstructAca">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estructura académica <i class="fa fa-list"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="getAddSalon"><a href="{{url('getAddSalon')}}"> <i class="fa fa-pencil fa-users"></i> Grupos  </a></li>
                        <li class="getAddGrupo"><a href="{{url('getAddGrupo')}}"><i class="fa fa-pencil fa-lg"></i>  Asignaturas a grupos </a></li>
                    </ul>
                </li>
                <li class="dropdown" id="dropInscrip">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inscripciones <i class="fa fa-users fa-lg"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="getAddInscripcion"><a href="{{url('getAddInscripcion')}}"><i class="fa fa-pencil fa-lg"></i> Inscribir alumno</a></li>
                        <li class="getInscritos"><a href="{{url('getInscritos')}}"><i class="fa fa-th-list"></i> Alumnos inscritos </a></li>
                        <li class="getGrupos"><a href="{{url('getGrupos')}}"> Lista de grupos</a></li>
                    </ul>
                </li>
                <li id="menuCalifAlumno"><a href="{{url('getAlumnosCalificar')}}">Calificar <i class="fa fa-pencil-square-o"></i></a></li>
            @elseif(Auth::getRol()=="alumno")
                <li><a href="{{url('calificacionesAlumno')}}">Ver calificaciones  <i class="fa fa-file-text-o fa-lg"></i></a></li>
                <li><a href="{{url('getHorarioAlumno')}}">Horario <i class="fa fa-calendar fa-lg"></i></a></li>

            @elseif(Auth::getRol()=="docente")
                <li><a href="{{url('homeP')}}">Horario <i class="fa fa-users"></i> </a></li>
                <li><a href="{{url('calificaciones')}}">Calificaciones <i class="fa fa-pencil"></i> </a></li>
                <li><a href="{{url('misAlumnos')}}">Expedientes <i class="fa fa-newspaper-o"></i> </a></li>
            @endif
        @endif
    </ul>

    <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><a href="/auth/login">Login</a></li>
            <!--<li><a href="/auth/register">Register</a></li>-->
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/auth/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
                </ul>
            </li>
        @endif
    </ul>
</div>