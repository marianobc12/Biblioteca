<?php
	session_start();
	$Acceso=$_SESSION['Acceso'];
	if ($Acceso!="true") {
		header('Location:index.php');	
	}
?>
<?php
    include('include/funciones.php');
    $rowusuario=Traer_Datos_Usuarios();
    $resprestamos=Traer_Prestamos();
    $cantprestamos=mysqli_num_rows($resprestamos);
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
			    <li><a href="alta_prestamo.php"><i class="fas fa-user-plus"></i> Nuevo</a></li>
			    <li><a href="buscar_prestamo.php"><i class="fas fa-search"></i> Buscar</a></li>
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
			    } ?>"><a href="#"><i class="fas fa-plus"></i>Agregar Cuenta</a>
			    </li>
			    <li><a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i>  Cerrar Cuenta</a></li>
		  	</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="table-responsive col-md-8 col-md-offset-2 contenedor-tabla-prestamo">
            <h1>Prestamos</h1>
            <h2><i class="fas fa-user"></i> <?php echo $rowusuario['Nom_Ape'] ?></h2>
            <?php
                if($cantprestamos>0){
            ?>
            <table class="table table-bordered tabla-prestamo">
                <thead>
                    <th>Nº de Ejemplar</th>
                    <th>Libro</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        while($rowprestamos=$resprestamos->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $rowprestamos['Num_Inventario'] ?></td>
                        <td><?php echo $rowprestamos['Titulo'] ?></td>
                        <td><?php echo $rowprestamos['Fecha_Prestamo'] ?></td>
                        <td><?php echo $rowprestamos['Fecha_Fin_Prestamo'] ?></td>
                        <td>
                            <form action="t_prestamo.php" method="post">
                            <input name="Id_Prestamo" type="text" value="<?php echo $rowprestamos['Id_Prestamo']; ?>" style="display:none;">
                            <input name="Id_Libro" type="text" value="<?php echo $rowprestamos['Id_Libro']; ?>" style="display:none;">
                                <button class="btn btn-success"><i class="fas fa-check"></i> Finalizar</button>
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <input name="Id_Prestamo" type="text" value="<?php echo $rowprestamos['Id_Prestamo']; ?>" style="display:none;">
                                <button class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <div class="alert alert-info col-md-6 col-md-offset-3 text-center" role="alert" style="animation:zoomIn 0.5s forwards">
                        <strong>Notificación:</strong> El usuario no presenta actualmente ningún prestamo.
                    </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>