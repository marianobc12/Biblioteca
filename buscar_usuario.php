<?php
	include('include/funciones.php');
	$res=Traer_Nombres_Usuarios();
?>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $(".tarjeta-usuario :input:not([type=button])").prop("disabled", true);
            $("#eliminar-mod-cliente").prop("disabled", false);
        });
    </script>
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
		<form class="col-md-4  col-md-offset-1 form-busquedausuario" action="" method="post" >
			<h1>Buscar Usuario</h1>
			<h2>D.N.I</h2>
			<input list="browsers" name="Nom_Ape" placeholder="Escriba nombre" autocomplete="off">
			<datalist id="browsers">
			<?php
				while ($row=$res->fetch_assoc()) {
			?>
				<option value="<?php echo $row['Dni']; ?>"><?php echo $row['Nom_Ape']; ?></option>
			<?php
				}
			?>
			</datalist>
        <button class="buscar"><i class="fas fa-search"></i> Buscar</button>
    </form>
    <form class="col-md-5 col-md-offset-1 tarjeta-usuario" method="post" action="">
        <div class="col-md-12">
            <h1><i class="fas fa-user"></i> Mariano Flores</h1>
        </div>
        <div class="row">
            <div class="col-md-6 contenedor-menu">
                <button type="button" onclick="modificar_cliente();" id="modificar-mod-cliente"><i class="fas fa-edit fa-lg"></i> Modificar</button>
            </div>
            <div class="col-md-6 contenedor-menu">
                <button id="eliminar-mod-cliente"><i class="fas fa-trash fa-lg"></i> Eliminar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 contenedor-menu">
                <button id="guardar-mod-cliente" style="display: none;"><i class="fas fa-save fa-lg"></i> Guardar</button>
            </div>
            <div class="col-md-6 contenedor-menu">
                <button id="cancelar-mod-cliente" style="display: none;" onclick="cancelar_cliente();"><i class="fas fa-times fa-lg"></i> Cancelar</button>
            </div>
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-id-card"></i> D.N.I</h2>
            <input type="number" name="Dni">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-user"></i> Nombre</h2>
            <input type="text" name="Nombre">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-calendar-alt"></i> Fecha de nacimiento</h2>
            <input type="date" name="Fec_Nac">
        </div>
        <div class="col-md-12">
            <h2><i class="far fa-flag"></i> Nacionalidad</h2>
            <input type="text" name="Nacionalidad">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-phone-volume"></i> Teléfono</h2>
            <input type="text" name="Teléfono">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-mobile-alt"></i> Celular</h2>
            <input type="text" name="Celular">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-map-marker-alt"></i> Domicilio</h2>
            <input type="text" name="Domicilio">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-map-marker-alt"></i> Escuela o Lugar de trabajo</h2>
            <input type="text" name="Escuela_Trabajo">
        </div>
        <div class="col-md-12">
            <h2><i class="fas fa-envelope"></i> Email</h2>
            <input type="text" name="Email">
        </div>
    </form>
</body>

</html>