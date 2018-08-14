<?php
	session_start();
	$Acceso=$_SESSION['Acceso'];
	if ($Acceso!="true") {
		header('Location:index.php');	
	}
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
<body>
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
			    <li><a href="alta_prestamo.php"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="buscar_prestamo.php"><i class="fas fa-search"></i> Buscar</a></li>
		  	</ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" class="dropdown" data-toggle="dropdown"><i class="fas fa-user-circle"></i> Mi Cuenta <i class="fas fa-caret-down"></i></a>
	        <ul class="dropdown-menu">
					<li><a href="mi_perfil.php"><i class="fas fa-address-card"></i> Ver Datos</a></li>
					<li><a href="resumen.php"><i class="fas fa-edit"></i> Resumen</a></li>
					<li><a href="inventario.php"><i class="fas fa-book"></i> Inventario</a></li>
					<li><a href="historial_prestamo.php"><i class="fas fa-history"></i> Historial Prestamos</a></li>
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
	<form class="col-md-6 col-md-offset-3 col-sm-12 form-altausuario" action="g_usuario.php" method="post">
		<h1><i class="fas fa-user"></i> Usuario</h1>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-id-card"></i> D.N.I </h2>
				<input class="form-control input-lg" type="text" name="Dni" required="" maxlength="8" placeholder="Ingresar D.N.I" minlength="8" >
			</div>
			<div class="col-md-6 col-sm-6  contenedor-campos">
				<h2><i class="fas fa-user"></i> Nombre y Apellido </h2>
				<input class="form-control input-lg" type="text" name="Nom_Ape" required="" maxlength="60" placeholder="Ingresar Nombre y Apellido">
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento </h2>
				<input class="form-control input-lg" type="date" name="Fecha_Nac" required="">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="far fa-flag"></i> Nacionalidad</h2>
				<input class="form-control input-lg" type="text" name="Nacionalidad" required="" maxlength="50" placeholder="Ej: Argentina">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-phone-volume"></i> Teléfono</h2>
				<input class="form-control input-lg" type="text" name="Telefono" required="" maxlength="20" placeholder="Ej: 4253254">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-mobile-alt"></i> Celular</h2>
				<input class="form-control input-lg" type="text" name="Celular" maxlength="20" placeholder="Ej: 2215678532">
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-map-marker-alt"></i> Domicilio </h2>
				<input class="form-control input-lg" type="text" name="Domicilio" required="" maxlength="100" placeholder="Ej: 4 e/ 37 y 38">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-map-marker-alt"></i> Escuela o lugar de trabajo</h2>
				<input class="form-control input-lg" type="text" name="Escuela_Trabajo" maxlength="100" placeholder="Ingresar Dirección">
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-envelope"></i> Email</h2>
				<input class="form-control input-lg" type="email" name="Email" maxlength="100" placeholder="Ej: Ejemplo@dominio.com">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<button type="submit" class="btn guardar"><i class="fas fa-save fa-lg"></i>  Guardar</button>
			</div>
		</div>
	</form>
	</div>
</div>	
</body>
</html>






