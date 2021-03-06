<?php
    session_start();
    $Acceso=$_SESSION['Acceso'];
    if ($Acceso!="true") {
        header('Location:index.php');   
    }
?>
<?php 
    include('include/funciones.php');
    $resdatos=Traer_Datos_Usuarios();
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
    <form class="col-md-10 col-md-offset-1 tarjeta-usuario" method="post" action="m_usuario.php" id="tarjeta-usuario">
        <div class="col-md-12">
            <h1><i class="fas fa-user"></i> <?php echo $resdatos['Nom_Ape']; ?></h1>
        </div>
        <div class="row">
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="button" onclick="modificar_cliente();" id="modificar-mod-cliente"><i class="fas fa-edit fa-lg"></i> Modificar</button>
            </div>
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="button" id="eliminar-mod-cliente" onclick="eliminar_usuario();"><i class="fas fa-trash fa-lg"></i> Eliminar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="submit" id="guardar-mod-cliente" style="display: none;"><i class="fas fa-save fa-lg"></i> Guardar</button>
            </div>
            <div class="col-md-6 contenedor-menu">
                <button class="btn" type="button" id="cancelar-mod-cliente" style="display: none;" onclick="cancelar_cliente();"><i class="fas fa-times fa-lg"></i> Cancelar</button>
            </div>
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-id-card"></i> D.N.I</h2>
            <h2><?php echo $resdatos['Dni']; ?></h2>
            <input style="display:none;" class="form-control input-lg" type="number" pattern="[0-9]+" required=""   maxlength="8" minlength="8" name="Dni" value="<?php echo $resdatos['Dni']; ?>">
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-user"></i> * Nombre</h2>
            <input class="form-control input-lg" type="text" required="" minlength="4"  maxlength="100" name="Nom_Ape" value="<?php echo $resdatos['Nom_Ape']; ?>" >
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-calendar-alt"></i> * Fecha de nacimiento</h2>
            <input class="form-control input-lg" type="date" required=""  min="1900-01-01" name="Fecha_Nac" value="<?php echo $resdatos['Fec_Nac']; ?>">
        </div>
        <div class="col-md-4">
            <h2><i class="far fa-flag"></i> * Nacionalidad</h2>
            <input class="form-control input-lg" type="text" name="Nacionalidad" required="" minlength="2"   maxlength="50" value="<?php echo $resdatos['Nacionalidad']; ?>">
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-phone-volume"></i> * Teléfono</h2>
            <input class="form-control input-lg" type="text" name="Telefono" required="" minlength="5"  maxlength="20" value="<?php echo $resdatos['Telefono']; ?>">
        </div>
        <div class="col-md-4">
            <h2><i class="fas fa-mobile-alt"></i> Celular</h2>
            <input class="form-control input-lg" type="text" name="Celular"  minlength="5"  maxlength="20" value="<?php echo $resdatos['Celular']; ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-map-marker-alt"></i> * Domicilio</h2>
            <input class="form-control input-lg" type="text" minlength="4" required=""  maxlength="100" name="Domicilio" value="<?php echo $resdatos['Domicilio']; ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-map-marker-alt"></i> Escuela o Lugar de trabajo</h2>
            <input class="form-control input-lg" type="text" minlength="4" maxlength="100" name="Escuela_Trabajo" value="<?php echo $resdatos['Domicilio_Seg']; ?>">
        </div>
        <div class="col-md-6">
            <h2><i class="fas fa-envelope"></i> Email</h2>
            <input class="form-control input-lg" maxlength="100" type="text" name="Email" value="<?php echo $resdatos['Email']; ?>">
        </div>
        <div class="col-md-6">
				<h2><i class="fas fa-pencil-alt"></i> Observacion</h2>
				<textarea name="Observacion" class="form-control input-lg"  placeholder="Escriba la observación...."><?php echo $resdatos['Observacion']; ?></textarea>
		</div>
    </form>
    <form action="devoluciones.php" method="post" class="col-md-10 col-md-offset-1 form-devoluciones">
        <input type="text" value="<?php echo $resdatos['Id_Usuario']; ?>" style="display:none;" name="Id_Usuario">
        <button type="submit" class="btn ver-devoluciones"><i class="fas fa-arrow-down"></i> Ver Devoluciones</button>
    </form>
    <div class="modal fade modal-eliminar" id="Modal-Eliminar_Usuario">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¿Deseas eliminar el usuario?</h4>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="alert alert-warning">
                            <strong>Atención:</strong> Si elimina el usuario , también se borrarán sus prestamos y devoluciones.
                        </div>
                        <form action="e_usuario.php" method="post" class="col-md-12 eliminar-usuario">
                            <input type="number" name="Dni" value="<?php echo $resdatos['Dni']; ?>" style="display:none;">
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