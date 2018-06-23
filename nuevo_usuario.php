<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<title>Menú Principal - Biblioteca Adolfo Alsina</title>
</head>
<body style="background-image:url(img/fondo-inicio.jpg);">
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
			    <li><a href="#"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="#"><i class="fas fa-search"></i> Buscar</a></li>
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
			    <li><a href="#"><i class="fas fa-plus"></i> Agregar Cuenta</a></li>
			    <li><a href="#"><i class="fas fa-sign-out-alt"></i>  Cerrar Cuenta</a></li>
		  	</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
<div class="row">
	<form class="col-md-6 col-md-offset-3 col-sm-12 form-altausuario" action="" method="post">
		<h1><i class="fas fa-user"></i> Usuario</h1>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-id-card"></i> D.N.I </h2>
				<input type="text" name="Dni" required="" maxlength="8" placeholder="Ingresar D.N.I" minlength="8" >
			</div>
			<div class="col-md-6 col-sm-6  contenedor-campos">
				<h2><i class="fas fa-user"></i> Nombre y Apellido </h2>
				<input type="text" name="Nom_Ape" required="" required="" placeholder="Ingresar Nombre y Apellido">
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento </h2>
				<input type="date" name="Fec_Nac" required="">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="far fa-flag"></i> Nacionalidad</h2>
				<input type="text" name="Nacionalidad" required="" placeholder="Ej: Argentina">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-phone-volume"></i> Teléfono</h2>
				<input type="text" name="Telefono" required="" placeholder="Ej: 4253254">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-mobile-alt"></i> Celular</h2>
				<input type="text" name="Celular" placeholder="Ej: 2215678532">
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-map-marker-alt"></i> Domicilio </h2>
				<input type="text" name="Domicilio" required="" placeholder="Ej: 4 e/ 37 y 38">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-map-marker-alt"></i> Escuela o lugar de trabajo</h2>
				<input type="text" name="Escuela_Trabajo" placeholder="Ingresar Dirección">
			</div>	
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<h2><i class="fas fa-envelope"></i> Email</h2>
				<input type="email" name="Email" placeholder="Ej: Ejemplo@dominio.com">
			</div>
			<div class="col-md-6 col-sm-6 contenedor-campos">
				<button type="submit" class="guardar"><i class="fas fa-save fa-lg"></i>  Guardar</button>
			</div>
		</div>
	</form>
	</div>
</div>	
</body>
</html>






