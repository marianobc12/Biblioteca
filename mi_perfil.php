<?php
	session_start();
	$Acceso=$_SESSION['Acceso'];
	if ($Acceso!="true") {
		header('Location:index.php');	
	}
?>
<?php
	include('include/funciones.php');
	$rowcuenta=Traer_Datos_Cuenta();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<title>Menú Principal - Biblioteca Adolfo Alsina</title>
</head>
<body  style="background-image:url(img/fondo-sistema.jpg);">
<nav class="navbar navbar-inverse menu-principal">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="menu_principal.php"><i class="fas fa-book"></i> Biblioteca Adolfo Alsina</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="" class="dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> Usuarios <i class="fas fa-caret-down"></i></a>
	        <ul class="dropdown-menu">
			    <li><a href="nuevo_usuario.php"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="buscar_usuario.php"><i class="fas fa-search"></i> Buscar</a></li>
		  	</ul>
        </li>
        <li><a href="" class="dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> Libros <i class="fas fa-caret-down"></i></a>
	        <ul class="dropdown-menu">
			    <li><a href="alta_libro.php"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="buscar_libro.php"><i class="fas fa-search"></i> Buscar</a></li>
		  	</ul>
        </li>
        <li><a href="" class="dropdown" data-toggle="dropdown"><i class="fas fa-arrow-up"></i> Prestamos <i class="fas fa-caret-down"></i></a>
	        <ul class="dropdown-menu">
			    <li><a href="#"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="#"><i class="fas fa-search"></i> Buscar</a></li>
		  	</ul>
        </li>
        <li><a href="" class="dropdown" data-toggle="dropdown"><i class="fas fa-arrow-down"></i> Devoluciones <i class="fas fa-caret-down"></i></a>
	        <ul class="dropdown-menu">
			    <li><a href="#"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="#"><i class="fas fa-search"></i> Buscar</a></li>
		  	</ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" class="dropdown" data-toggle="dropdown"><i class="fas fa-user-circle"></i> Mi Cuenta <i class="fas fa-caret-down"></i></a>
	        <ul class="dropdown-menu">
			    <li><a href="mi_perfil.php"><i class="fas fa-address-card"></i> Ver Datos</a></li>
			    <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin") {
			    	echo "block";
			    }else{
			    	echo "none";
			    } ?>"><a href="#"><i class="fas fa-plus"></i> Agregar Cuenta</a></li>
			    <li><a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i>  Cerrar Cuenta</a></li>
		  	</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
	<div class="row">
		<form class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 form-perfil" action="modificar_perfil.php" method="post">
			<h1><i class="fas fa-user"></i> Mis Datos</h1>
			<div class="row">
				<div class="col-md-6">
					<h2><i class="fas fa-id-card"></i> D.N.I</h2>
					<input type="number" name="Dni" value="<?php echo $rowcuenta['Dni'] ?>" id=Dni>
				</div>
				<div class="col-md-6">
					<h2><i class="fas fa-user"></i> Nombre y Apellido</h2>
					<input type="text" name="Nom_Ape" value="<?php echo $rowcuenta['Nom_Ape'] ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h2><i class="fas fa-user-shield"></i> Tipo de cuenta</h2>
					<h2><?php echo $rowcuenta['Tipo'] ?></h2>
				</div>
				<div class="col-md-6">
					<h2><i class="fas fa-envelope"></i> Email</h2>
					<input type="email" name="Email" value="<?php echo $rowcuenta['Email'] ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 menu-perfil">
					<button type="button" onclick="cambio_contraseña();"><i class="fas fa-lock"></i> Cambiar Contraseña</button>
				</div>
				<div class="col-md-6 menu-perfil">
					<button type="submit"><i class="fas fa-user-cog"></i> Modificar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id="Modal-Contraseña" class="modal fade modal-contraseña" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fas fa-lock"></i> Cambio de contraseña</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        	<div class="row">
        		<form action="" method="" class="col-md-12 modal-body form-cambiocontra">
		        	<div class="col-md-12">
		        		<h2>Contraseña Actual</h2>
		        		<input type="password" name="Contraseña_Actual" placeholder="Ingresar Contraseña Actual">
		        	</div>
		        	<div class="col-md-12">
		        		<h2>Nueva Contraseña</h2>
		        		<input type="password" name="Contraseña_Nueva1" placeholder="Ingresar Contraseña Nueva">
		        	</div>
		        	<div class="col-md-12">
		        		<h2>Repita Contraseña Nueva</h2>
		        		<input type="password" name="Contraseña_Nueva2" placeholder="Ingresar Contraseña Nueva">
		        	</div>
		        	<div class="col-md-12">
		        		<button class="guardar">Guardar</button>
		        	</div>
	        	</form>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>