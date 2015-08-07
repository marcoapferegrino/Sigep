<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="/css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">
					@if (!Auth::guest())
						@if(Auth::getRol()=="admin")
							Admin
						@elseif(Auth::getRol()=="superAdmin")
							Super Admin
						@elseif(Auth::getRol()=="alumno")
							Alumno
						@elseif(Auth::getRol()=="docente")
							Profesor
						@else
							Home
						@endif
					@else
						Home
					@endif
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">


                    @if (!Auth::guest())
                        @if(Auth::getRol()=="admin")
                            <li><a href="">Crear Horarios</a></li>
                        @elseif(Auth::getRol()=="superAdmin")
                            <li><a href="{{url('homeSA')}}">Programas y periodos <i class="fa fa-calendar-o fa-lg"></i></a></li>
							<li><a href="{{url('asignaturas')}}">Asignaturas <i class="fa fa-book fa-lg"></i></a></li>
							<li><a href="{{url('horarios')}}">Horarios <i class="fa fa-table fa-lg"></i></a></li>
                        @elseif(Auth::getRol()=="alumno")
                            <li><a href="">Ver calificaciones</a></li>
                            <li><a href="">Horario</a></li>
                        @elseif(Auth::getRol()=="docente")
							<li><a href="{{url('homeP')}}">Mis grupos <i class="fa fa-users"></i> </a></li>
                            <li><a href="{{url('calificaciones')}}">Calificaciones <i class="fa fa-pencil"></i> </a></li>
							<li><a href="">Expedientes <i class="fa fa-newspaper-o"></i> </a></li>
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
								<li><a href="/auth/logout"><i class="fa fa-user"></i> Perfil </a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>
