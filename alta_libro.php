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
    <title>Alta de libro - Biblioteca Adolfo Alsina</title>
</head>

<body style="background-image:url(img/fondo-sistema.jpg);">
    <nav class="navbar navbar-inverse menu-principal">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menu_principal.php">
                    <i class="fas fa-book"></i> Biblioteca Adolfo Alsina</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="" class="dropdown" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Usuarios
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="nuevo_usuario.php">
                                    <i class="fas fa-user-plus"></i> Nuevo</a>
                            </li>
                            <li>
                                <a href="buscar_usuario.php">
                                    <i class="fas fa-search"></i> Buscar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="dropdown" data-toggle="dropdown">
                            <i class="fas fa-book"></i> Libros
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="alta_libro.php">
                                    <i class="fas fa-user-plus"></i> Nuevo</a>
                            </li>
                            <li>
                                <a href="buscar_libro.php">
                                    <i class="fas fa-search"></i> Buscar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="dropdown" data-toggle="dropdown">
                            <i class="fas fa-arrow-up"></i> Prestamos
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="alta_prestamo.php">
                                    <i class="fas fa-user-plus"></i> Nuevo</a>
                            </li>
                            <li>
                                <a href="buscar_prestamo.php">
                                    <i class="fas fa-search"></i> Buscar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="" class="dropdown" data-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Mi Cuenta
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="mi_perfil.php">
                                    <i class="fas fa-address-card"></i> Ver Datos</a>
                            </li>
                            <li><a href="resumen.php"><i class="fas fa-edit"></i> Resumen</a></li>
                            <li><a href="inventario.php"><i class="fas fa-book"></i> Inventario</a></li>
					        <li><a href="historial_prestamo.php"><i class="fas fa-history"></i> Historial Prestamos</a></li>
                            <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin") {
                			    	echo "block ";
                			    }else{
                			    	echo "none ";
                			    } ?>">
                                <a href="#">
                                    <i class="fas fa-plus"></i>Agregar Cuenta</a>
                            </li>
                            <li>
                                <a href="cerrar_sesion.php">
                                    <i class="fas fa-sign-out-alt"></i> Cerrar Cuenta</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <form class="col-md-6 col-md-offset-3 col-sm-12 form-altausuario" action="g_libro.php" method="post">
                <h1>
                    <i class="fas fa-book"></i> Libro</h1>
                <div class="row">
                    <div class="col-md-6 col-sm-6 contenedor-campos">
                        <h2>
                            <i class="fas fa-id-card"></i> Número de inventario </h2>
                        <input class="form-control input-lg" type="number" name="Num_inventario" required="" max="99999" placeholder="Hasta 5 dígitos" min="1">
                    </div>
                    <div class="col-md-6 col-sm-6  contenedor-campos">
                        <?php
                            date_default_timezone_set("America/Buenos_Aires");
                            $fecha_actual=date("Y-m-d");
                        ?>
                        <h2>
                            <i class="fas fa-calendar-alt"></i> Fecha de entrada </h2>
                        <input class="form-control input-lg" type="date" name="Fecha_entrada" required="" value="<?php echo $fecha_actual; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 contenedor-campos">
                        <h2>
                            <i class="fas fa-user"></i> Autor </h2>
                        <input class="form-control input-lg" type="text" name="Autor" maxlength="60" placeholder="Ej: Jorge Luis Borges" required="">
                    </div>
                    <div class="col-md-6 col-sm-6 contenedor-campos">
                        <h2>
                            <i class="fas fa-book"></i> Título</h2>
                        <input class="form-control input-lg" type="text" name="Titulo" maxlength="100" required="" placeholder="Ej: El Aleph">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 contenedor-campos">
                        <h2>
                            <i class="fas fa-id-card"></i> Editorial</h2>
                        <input class="form-control input-lg" type="text" name="Editorial" maxlength="60" required="" placeholder="Ej: Santillana">
                    </div>
                    <div class="col-md-6 col-sm-6 contenedor-campos">
                        <h2>
                            <i class="fas fa-user"></i> Género</h2>
                        <input class="form-control input-lg" type="text" name="Genero" required="" placeholder="Ej: 82-32">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6  contenedor-campos">
                        <h2>
                            <i class="fas fa-donate"></i> Tipo de Operación</h2>
                        <select name="Tipo_Operacion" class="form-control input-lg">
                            <option value="0">Seleccionar Operación</option>
                            <option value="Comprado">Comprado</option>
                            <option value="Donado">Donado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 contenedor-campos">
                        <button type="submit" class="btn guardar">
                        <i class="fas fa-save fa-lg"></i> Guardar</button>
                    </div>
                </div>
                <div class="row">
                </div>
            </form>
        </div>
    </div>
</body>

</html>