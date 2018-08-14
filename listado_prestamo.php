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
    
    <script type="text/javascript">
		$(function(){
	    $(".btn-eliminar-prestamo").click(function(e) {
	        e.preventDefault();
            var data = $(this).attr("data-valor");
	        document.getElementById("Id_Prestamo").value=data;
	    	});
		});
	</script>
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
                <li><a href="inventario.php"><i class="fas fa-book"></i> Inventario</a></li>
				<li><a href="historial_prestamo.php"><i class="fas fa-history"></i> Historial Prestamos</a></li>
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
        <div class="table-responsive col-md-8 col-md-offset-2 col-sm-12   contenedor-tabla-prestamo">
            <h1>Prestamos</h1>
            <h2><i class="fas fa-user"></i> <?php echo $rowusuario['Nom_Ape'] ?></h2>
            <?php
                if($cantprestamos>0){
            ?>
            <table class="table table-bordered tabla-prestamo">
                <thead>
                    <th>Nº de Inventario</th>
                    <th><i class="fas fa-book"></i> Libro</th>
                    <th><i class="fas fa-calendar-alt"></i> Inicio</th>
                    <th><i class="fas fa-calendar-alt"></i> Fin</th>
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
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Finalizar</button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-eliminar-prestamo" data-valor="<?php echo $rowprestamos['Id_Prestamo']?>" onclick="eliminar_prestamo();"><i class="fas fa-trash"></i> Borrar</button>
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





<div class="modal fade modal-eliminar" id="Modal-Eliminar-Prestamo">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¿Deseas eliminar el prestamo?</h4>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="alert alert-warning">
                            <strong>Atención:</strong> Si elimina el prestamo , el libro vuelve a estar disponible para ser prestado.
                        </div>
                        <form action="e_prestamo.php" method="post" class="col-md-12 eliminar-prestamo">
                            <input type="number"  id="Id_Prestamo" name="Id_Prestamo" style="display:none;">
                            <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 ">
                                <button type="submit" class="btn  eliminar">Si , Eliminar</button>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <button type="button" class="btn cancelar" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>