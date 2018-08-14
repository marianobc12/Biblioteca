<?php
    session_start();
    $Acceso=$_SESSION['Acceso'];
    if ($Acceso!="true") {
        header('Location:index.php');   
    }
?>
<?php
    include ('include/funciones.php');
    $nombreslibros=Traer_Nombres_Libros();
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
        $(document).ready(function() {
            $(".tarjeta-usuario :input:not([type=button])").prop("disabled", true);
            $("#eliminar-mod-cliente").prop("disabled", false);
        });
    </script>
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
                            <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin"){
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
		<form class="col-md-4  col-md-offset-4 form-busquedausuario" action="c_libro.php" method="post" >
			<h1>Buscar Libro</h1>
			<h2><i class="fas fa-book"></i> Nº de inventario</h2>
			<input class="form-control input-lg" list="browsers" name="Num_Inventario" required="" maxlength="60" placeholder="Escribir Nombre" autocomplete="off">
			<datalist id="browsers">
			<?php
				while ($row=$nombreslibros->fetch_assoc()) {
			?>
				<option value="<?php echo $row['Num_Inventario']; ?>"><?php echo $row['Titulo']; ?></option>
			<?php
				}
			?>
			</datalist>
            <button class="btn buscar"><i class="fas fa-search"></i> Buscar</button>
    </form>
</body>
</html>