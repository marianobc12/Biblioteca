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
                                <a href="#">
                                    <i class="fas fa-search"></i> Buscar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="dropdown" data-toggle="dropdown">
                            <i class="fas fa-arrow-down"></i> Devoluciones
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <i class="fas fa-user-plus"></i> Nuevo</a>
                            </li>
                            <li>
                                <a href="#">
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
            <div class="col-md-6 col-md-offset-3 contenedor-prestamo">
                <form action="" method="" class="col-md-12 form-alta-prestamo">
                    <div class="row">
                        <h1><i class="fas fa-arrow-up"></i> Prestamo</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h2><i class="fas fa-user"></i> Buscar usuario</h2>
                            <input list="buscador-usuarios" name="Dni" required="" maxlength="60" placeholder="Escriba nombre" autocomplete="off">
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
                            <input list="buscador-libros" name="Num_Inventario" required="" maxlength="60" placeholder="Escriba nombre" autocomplete="off">
                            <datalist id="buscador-libros">
                            <?php
                                while ($row=$nombreslibros->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['Num_Inventario']; ?>"><?php echo $row['Titulo']; ?></option>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h2><i class="fas fa-calendar-alt"></i> Fecha del prestamo</h2>
                            <input type="date" name="Fecha_Prestamo">
                        </div>
                        <div class="col-md-6">
                            <h2><i class="fas fa-align-left"></i> Observaciones</h2>
                            <textarea></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="prestar"><i class="fas fa-handshake"></i> Prestar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>