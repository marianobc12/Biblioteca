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
<body>
	<div class="container-fluid">
		<div class="row">
			<form class="col-md-6 col-md-offset-3 form-recuperar-cuenta" action="recuperar_cuenta.php" method="post">
				<div class="col-md-12">
					<h1>Recuperación de Cuenta</h1>
				</div>
				<div class="col-md-12">
					<h2><i class="fas fa-envelope"></i> Ingrese su correo electronico</h2>
					<input class="form-control" type="email" name="Email" required="" placeholder="Ej: ejemplo@dominio.com">
				</div>
				<?php
					if($Cuenta=="false"){
				?>
					<div class="col-md-8 col-md-offset-2" style="margin-top:20px;animation:zoomIn 0.5s forwards;">
						<div class="alert alert-danger text-center">
						<i class="fas fa-exclamation-circle fa-lg"></i> El correo que ingresó no tiene una cuenta.
						</div>
					</div>
				<?php
					}
				?>
				<div class="col-md-12">
					<button type="submit" class="btn recuperar"><i class="fas fa-unlock-alt"></i> Recuperar Cuenta</button>
					<button class="btn recuperar" onclick="location.href='index.php'"><i class="fas fa-undo"></i> Volver al acceso</button>
				</div>
			</form>
		</div>
	</div>
	<div id="avisoemail" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">¡Mensaje Enviado!</h4>
			</div>
			<div class="modal-body">
				<p>¡Por favor ingrese a su correo , para ver los datos de su cuenta!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
			</div>

		</div>
	</div>
</body>
</html>

<?php
	if($Cuenta=="true"){
	echo
	"<script type='text/javascript'>
		$('#avisoemail').modal();
    </script>";
	}
?>