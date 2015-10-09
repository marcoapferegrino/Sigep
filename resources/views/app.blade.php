<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SIGEP IPN</title>


	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/font-aweasome/css/font-awesome.min.css">


	<style>
		label{
			font-weight:bold ;
		}
	</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div class="page-header">
	<div class="row headerIcons">
		<div class="col-md-5">
			<img alt="Brand" src="{{asset('/icons/escudoescom.ico')}}">
			<img alt="Brand" src="{{asset('/icons/sepi.ico')}}">

		</div>
		<div class="col-md-3">
			<p class="lead"><h1>SIGEP</h1></p>
		</div>
		<div class="col-md-3">
			<img alt="Brand" src="{{asset('/icons/logoIPNGris.png')}}">
		</div>
	</div>

</div>
	<nav class="navbar navbar-inverse">
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
							Administrador
						@elseif(Auth::getRol()=="superAdmin")
							Super Administrador
						@elseif(Auth::getRol()=="alumno")
							Alumno
						@elseif(Auth::getRol()=="docente")
							Docente
						@else
							Home
						@endif
					@else
						Home
					@endif
				</a>
			</div>

			@include('partials.menu')
		</div>
	</nav>

	@yield('content')
<div class="row">
	<div class="col-md-12 ">
		<div class="panel-footer"> <div class="text-center" style="color: #6C193F;font-weight: bold;">Departamento de posgrado SIGEP ® 2015 </div> </div>
	</div>
</div>

	<!-- Scripts -->
	<script src="/js/jquery-2.1.4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="/js/activeMenus.js"></script>
	@yield('scripts')
</body>


</html>
