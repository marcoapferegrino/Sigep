<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
			.btn{
				font-size: 50px;
				background-color: #2196F3;
				color: #FFFFFF;
				width: 400px;
				margin-top: 150px;
				margin-left: 30%;
				border-radius: 10px 10px 10px 10px;
				-moz-border-radius: 10px 10px 10px 10px;
				text-decoration:none;
				display: block;
				

			}
		</style>
	</head>
	<body>

		<div class="container">
			<div class="content">
				<div class="title">Departamento de  posgrado</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<br><br><br>

			</div>

				<a class="btn" href="auth/login">Entrar</a>

		</div>


	</body>
</html>
