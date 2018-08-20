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
                            <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin") {
                			    	echo "block ";
                			    }else{
                			    	echo "none ";
                			    } ?>">
                                <a href="agregar_cuenta.php">
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
            <div class="col-md-6 col-md-offset-3 contenedor-cuentanueva">
                <form action="cuenta_creada.php" method="post" class="nueva-cuenta">
                    <h1 class="text-center"><i class="fas fa-plus"></i> Crear Cuenta</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <h2><i class="fas fa-id-card"></i> D.N.I</h2>
                            <input type="number" class="form-control input-lg" name="Dni" required>
                        </div>
                        <div class="col-md-7">
                            <h2><i class="fas fa-user"></i> Nombre y Apellido</h2>
                            <input type="text" class="form-control input-lg" name="Nom_Ape" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h2><i class="fas fa-user-shield"></i> Tipo de cuenta</h2>
                            <select required name="Tipo_Cuenta" id="" class="form-control input-lg">
                                <option value="">Seleccionar</option>
                                <option value="Usuario">Usuario</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <h2><i class="fas fa-envelope"></i> Email</h2>
                            <input type="email" class="form-control input-lg" name="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h2><i class="fas fa-unlock-alt"></i> Contraseña</h2>
                            <input type="password" class="form-control input-lg" name="Contraseña" required>
                        </div>
                        <div class="col-md-7">
                            <button type="submit" class="btn crear-cuenta">Crear <i class="fas fa-user-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>