<?php
    session_start();
    $Acceso=$_SESSION['Acceso'];
    if ($Acceso!="true") {
        header('Location:index.php');   
    }
?>
<?php
    include('include/funciones.php');
    $nombreslibros=Traer_Nombres_Libros_Prestamos();
    $resnombres=Traer_Nombres_Usuarios();
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

<body>
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
                            <li><a href="deudores.php"><i class="fas fa-user-times"></i> Deudores</a></li>
                            <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin") {
                			    	echo "block ";
                			    }else{
                			    	echo "none ";
                			    } ?>">
                                <a href="agregar_cuenta.php">
                                    <i class="fas fa-plus"></i>Agregar Cuenta</a>
                            </li>
                            <li><a href="BackUp.php"><i class="fas fa-hdd"></i> Backup</a></li>
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
            <div class="col-md-6 col-md-offset-3 contenedor-prestamo">
                <form action="g_prestamo.php" method="post" class="col-md-12 form-alta-prestamo">
                    <div class="row">
                        <h1><i class="fas fa-arrow-up"></i> Prestamo</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h2><i class="fas fa-user"></i> Buscar usuario</h2>
                            <input class="form-control input-lg" list="buscador-usuarios" name="Dni" required="" maxlength="60" placeholder="Escriba nombre" autocomplete="off">
                            <datalist id="buscador-usuarios">
                            <?php
                                while ($row=$resnombres->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['Dni']; ?>"><?php echo $row['Nom_Ape']; ?></option>
                            <?php
                                }
                            ?>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <h2><i class="fas fa-book"></i> Buscar libro</h2>
                            <input class="form-control input-lg" list="buscador-libros" name="Num_Inventario" required="" maxlength="60" placeholder="Escriba nombre" autocomplete="off">
                            <datalist id="buscador-libros">
                                <?php
                                    while($row=$nombreslibros->fetch_assoc()){
                                ?>
                                    <option value="<?php echo $row['Num_Inventario']; ?>"><?php echo $row['Titulo']; ?></option>
                                <?php
                                    }
                                ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            date_default_timezone_set("America/Buenos_Aires");
                            $fecha_actual=date("Y-m-d");
                        ?>
                        <div class="col-md-6">
                            <h2><i class="fas fa-calendar-alt"></i> Inicio del prestamo</h2>
                            <input required class="form-control input-lg" type="date" name="Fecha_Prestamo" value="<?php echo $fecha_actual; ?>">
                        </div>
                        <div class="col-md-6">
                            <h2><i class="fas fa-calendar-alt"></i> Fin del prestamo</h2>
                            <input required class="form-control input-lg" type="date" name="Fecha_Fin_Prestamo">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn prestar"><i class="fas fa-handshake"></i> Prestar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>