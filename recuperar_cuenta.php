<?php
	session_start();
	include('include/funciones.php');
	$Cuenta=Recuperar_Cuenta();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<title>Recuperar Cuenta - Biblioteca Adolfo Alsina</title>
</head>
<body style="background-image:url(img/fondo-sistema.jpg);">
	<div class="container-fluid">
		<div class="row">
			<form class="col-md-6 col-md-offset-3 form-recuperar-cuenta" action="" method="post">
				<div class="col-md-12">
					<h1>Recuperación de Cuenta</h1>
				</div>
				<div class="col-md-12">
					<h2><i class="fas fa-envelope"></i> Ingrese su correo electronico</h2>
					<input type="email" name="Email" placeholder="Ej: ejemplo@dominio.com">
				</div>
				<div class="col-md-12">
					<button type="submit" class="recuperar"><i class="fas fa-unlock-alt"></i> Recuperar Cuenta</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>