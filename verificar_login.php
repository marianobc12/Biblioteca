<?php
	session_start();
	$Acceso=$_SESSION['Acceso'];
	if ($Acceso!="true") {
		header('Location:index.php');	
	}
?>
<?php
	session_start();

	$DNI=$_POST['Dni'];
	$Contraseña=$_POST['Contraseña'];

	include('include/funciones.php');

	$link=Conexion();

	$sql="SELECT * FROM cuenta WHERE Dni='$DNI' AND Clave='$Contraseña' LIMIT 1";

	$res=mysqli_query($link,$sql);

	$row=$res->fetch_assoc();

	$numerocampos=count($row);

	if ($numerocampos==6) {
		header('Location: menu_principal.php');
		$_SESSION['Id_Cuenta']=$row['Id_Cuenta'];
		$_SESSION['Acceso']="true";
	}else{
		header('Location: index.php');
		$_SESSION['Acceso']="false";
	}
?>