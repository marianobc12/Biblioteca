<?php
    session_start();
    $Acceso=$_SESSION['Acceso'];
    if ($Acceso!="true") {
        header('Location:index.php');   
    }
?>
<?php 
    include('include/funciones.php');
    $rowlibro=Traer_Datos_Libros();
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
                            <li><a href="deudores.php"><i class="fas fa-user-times"></i> Deudores</a></li>
                            <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin"){
                                echo "block";
                            }else{
                                echo "none";
                            } ?>"><a href="agregar_cuenta.php"><i class="fas fa-plus"></i> Agregar Cuenta</a></li>
                            <li><a href="BackUp.php"><i class="fas fa-hdd"></i> Backup</a></li>
                            <li><a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i>  Cerrar Cuenta</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form class="col-md-10 col-md-offset-1 tarjeta-usuario" method="post" action="m_libro.php" id="tarjeta-usuario">
        <div class="col-md-12">
            <h1><i class="fas fa-book"></i> <?php echo $rowlibro['Titulo'] ?></h1>
        </div>
        <div class="row">
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="button" onclick="modificar_libro();" id="modificar-mod-libro"><i class="fas fa-edit fa-lg"></i> Modificar</button>
            </div>
            <div class="col-md-6 contenedor-menu">
                <button type="button" class="btn" id="eliminar-mod-libro" onclick="eliminar_libro();"><i class="fas fa-trash fa-lg"></i> Eliminar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="submit" id="guardar-mod-libro" style="display: none;"><i class="fas fa-save fa-lg"></i> Guardar</button>
            </div>
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="button" id="cancelar-mod-libro" style="display: none;" onclick="cancelar_libro();"><i class="fas fa-times fa-lg"></i> Cancelar</button>
            </div>
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-id-card"></i> Nº de Inventario</h2>
            <h2><?php echo $rowlibro['Num_Inventario'] ?></h2>
            <input style="display:none;" required="" max="99999"  class="form-control input-lg" type="number" name="Num_Inventario" value="<?php echo $rowlibro['Num_Inventario'] ?>">
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-id-card"></i> Fecha Entrada</h2>
            <input required="" class="form-control input-lg" type="date" name="Fecha_Entrada" value="<?php echo $rowlibro['Fecha_Entrada'] ?>">
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-id-card"></i> Autor</h2>
            <input class="form-control input-lg" maxlength="90" required="" type="text" name="Autor" value="<?php echo $rowlibro['Autor'] ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-id-card"></i> Título</h2>
            <input class="form-control input-lg" maxlength="200" required="" type="text" name="Titulo" value="<?php echo $rowlibro['Titulo'] ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-id-card"></i> Editorial</h2>
            <input class="form-control input-lg" maxlength="90" required="" type="text" name="Editorial" value="<?php echo $rowlibro['Editorial'] ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-id-card"></i> Género - Clasificación</h2>
            <input class="form-control input-lg" type="text" required="" maxlength="90" name="Genero" value="<?php echo $rowlibro['Genero'] ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-id-card"></i> Adquisición</h2>
            <select class="form-control input-lg" name="Operacion" id="">
                <option <?php if($rowlibro['Tipo_Operacion']=="Compra"){echo "selected";} ?> value="Compra">Compra</option>
                <option <?php if($rowlibro['Tipo_Operacion']=="Donación"){echo "selected";} ?> value="Donación">Donación</option>
            </select>
        </div>
    </form>
    <div class="modal fade modal-eliminar" id="Modal-Eliminar_Libro">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¿Deseas eliminar el libro?</h4>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="alert alert-warning">
                            <strong>Atención:</strong> Si elimina el libro , también se borrarán sus prestamos y devoluciones.
                        </div>
                        <form action="e_libro.php" method="post" class="col-md-12 eliminar-libro">
                            <input type="number" name="Num_Inventario" value="<?php echo $rowlibro['Num_Inventario'] ?>" style="display:none;">
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