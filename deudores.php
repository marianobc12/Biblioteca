<?php
	session_start();
	$Acceso=$_SESSION['Acceso'];
	if ($Acceso!="true") {
		header('Location:index.php');	
	}
?>

<?php
    include('include/funciones.php');
    $res=Deudores();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
    <title>Menú Principal - Biblioteca Adolfo Alsina</title>
    <link rel="stylesheet" href="DataTable/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="DataTable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="DataTable/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="DataTable/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="DataTable/js/jquery.dataTables.min.js"></script>
    <script src="DataTable/js/dataTables.bootstrap.min.js"></script>
    <script src="DataTable/js/dataTables.responsive.min.js"></script>
    
    <script src="DataTable/js/dataTables.buttons.min.js"></script>
    <script src="DataTable/js/buttons.print.min.js"></script>

    <script src="DataTable/js/pdfmake.min.js"></script>
    <script src="DataTable/js/vfs_fonts.js"></script>
    <script src="DataTable/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#Tabla-Deudores').DataTable( {
                dom: 'Blfrtip',
                buttons: [
                    'print','pdfHtml5'
                ],
                "language": {
                    "url": "DataTable/json/Spanish.json"
                }
            } );
        } );
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
			    <li style="display:<?php if ($_SESSION['TipoAcceso']=="Admin") {
			    	echo "block";
			    }else{
			    	echo "none";
			    } ?>"><a href="agregar_cuenta.php"><i class="fas fa-plus"></i>Agregar Cuenta</a>
			    </li>
			    <li><a href="BackUp.php"><i class="fas fa-hdd"></i> Backup</a></li>
                <li><a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i>  Cerrar Cuenta</a></li>
		  	</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="contenedor-tabla-prestamo col-md-10 col-md-offset-1 col-sm-12">
            <h1>Deudores</h1>
            <table id="Tabla-Deudores" class="table  table-striped table-bordered display responsive nowrap tabla-deudores" style="width:100%">
                <thead>
                    <tr>
                        <th>D.N.I</th>
                        <th>Usuario</th>
                        <th>Nº Inventario</th>
                        <th>Libro</th>
                        <th>Terminó</th>
                        <th>Teléfono</th>
                        <th>Domicilio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row=$res->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['Dni']; ?></td>
                        <td><?php echo $row['Nom_Ape']; ?></td>
                        <td><?php echo $row['Num_Inventario']; ?></td>
                        <td><?php echo $row['Titulo']; ?></td>
                        <td><?php echo $row['Fecha_Fin_Prestamo']; ?></td>
                        <td><?php echo $row['Telefono']; ?></td>
                        <td><?php echo $row['Domicilio']; ?></td>
                    </tr>
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