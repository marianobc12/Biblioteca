<?php
	session_start();
	$Acceso=$_SESSION['Acceso'];
	if ($Acceso=="true") {
		header('Location: menu_principal.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<title>Acceso - Biblioteca Adolfo Alsina</title>
</head>
<body style="background-image:url(img/fondo-inicio.jpg);">
	<form action="verificar_login.php" method="post" class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 formulario-login" onsubmit="return verificar_login();">
		<h1><i class="fas fa-book"></i> Biblioteca</h1>
		<h1>Adolfo Alsina</h1>
		<h1>Club Mayo</h1>
		<h2>Acceso al sistema</h2>
		<div class="col-md-12 col-sm-12 campos-login">
			<h1><i class="fas fa-id-card fa-lg"></i> D.N.I</h1>
			<input type="number" name="Dni" id="Dni">
		</div>
		<div class="col-md-12 col-sm-12 campos-login">
			<h1><i class="fas fa-unlock-alt"></i> Contraseña</h1>
			<input type="password" name="Contraseña" id="Contraseña">
		</div>
		<div class="col-md-12">
			<h4 class="msj-incorrecto">
				<?php
					if ($Acceso=="false"){
						echo "¡Datos Incorrectos!";
					}
				?>
			</h4>
		</div>
		<div class="col-md-12 col-sm-12 campos-login">
			<button class="entrar"><i class="fas fa-sign-in-alt"></i> Entrar</button>
		</div>
	</form>

	<div id="Modal-Alerta" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h2 class="modal-title">¡Recuerde!</h2>
	      </div>
	      <div class="modal-body">
	        <p id="contenido-modal"></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
  		</div>
	</div>
</body>
</html>