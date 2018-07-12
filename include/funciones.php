<?php
mb_internal_encoding("UTF-8");
function Conexion(){
	$link	= mysqli_connect('localhost', 'root','root','biblioteca')or die('No se pudo conectar a la DB'. mysqli_error($link));
	return $link;
}
/*('localhost', 'id6360398_root','biblioteca1234','id6360398_biblioteca')*/

function Traer_Nombres_Usuarios(){
	$link=Conexion();
	$sql="SELECT * FROM usuario";
	$res=mysqli_query($link,$sql);
	return $res;
}

function Traer_Datos_Usuarios(){
	$Dni=$_POST['Dni'];
	$link=Conexion();
	$sql="SELECT * FROM usuario WHERE Dni='$Dni' LIMIT 1";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();	
	return $row;
}

function Traer_Datos_Cuenta(){
	$Id_Cuenta=$_SESSION['Id_Cuenta'];
	$link=Conexion();
	$sql="SELECT * FROM cuenta WHERE Id_Cuenta='$Id_Cuenta' LIMIT 1";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();
	return $row;
}

function Recuperar_Cuenta(){
	$Email=$_POST['Email'];
	$link=Conexion();
	$sql="SELECT Dni,Clave FROM cuenta WHERE Email='$Email'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();
	$numerorow=count($row);
	echo $numerorow;
	if ($numerorow>0) {
		$cuenta="true";
		$Dni=$row['Dni'];
		$Clave=$row['Clave'];
		$Mensaje="Recuperacion de cuenta - Sistema Bibliotecario Adolfo Alsina\n Cuenta Recuperada\n D.N.I: ".$Dni."\n Contraseña: ".$Clave."\n Saludos!";
		mail($Email, "Recuperar Cuenta - Sistema Bibliotecario Adolfo Alsina", $Mensaje);
		echo "Mensaje enviado a su email";
	}else{
		$cuenta="false";
		echo "NO EXISTE ESA CUENTA";
	}
	return $cuenta;
}

function Modificar_Cuenta(){
	$Id_Cuenta=$_SESSION['Id_Cuenta'];
	$Dni=$_POST['Dni'];
	$Nom_Ape=$_POST['Nom_Ape'];
	$Email=$_POST['Email'];

	if ($Dni==null || $Nom_Ape==null || $Email==null) {
		header('Location:mi_perfil.php');	
	}else{
		$link=Conexion();
		$sql="UPDATE cuenta SET Dni='$Dni',Nom_Ape='$Nom_Ape',Email='$Email' WHERE Id_Cuenta='$Id_Cuenta'";
		$res=mysqli_query($link,$sql);
		header('Location:mi_perfil.php'); 
	}
}

function Nuevo_Usuario(){
	date_default_timezone_set("America/Buenos_Aires");
	$Dni=$_POST['Dni'];
	$Nom_Ape=$_POST['Nom_Ape'];
	$Fecha_Nac=$_POST['Fecha_Nac'];
	$Nacionalidad=$_POST['Nacionalidad'];
	$Telefono=$_POST['Telefono'];
	$Celular=$_POST['Celular'];
	$Domicilio=$_POST['Domicilio'];
	$Escuela_Trabajo=$_POST['Escuela_Trabajo'];
	$Email=$_POST['Email'];
	$Fecha_Alta=date("Y/m/d");

	$link=Conexion();

	$sql="SELECT * FROM usuario WHERE Dni='$Dni'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();


	if ($row['Dni']==$Dni) {
		$Existe="Si";
	}else{
		$Existe="No";
		$sql="INSERT INTO usuario (Dni,Nom_Ape,Fec_Nac,Nacionalidad,Telefono,Celular,Domicilio,Domicilio_Seg,Email,Fecha_Alta) VALUES ('$Dni','$Nom_Ape','$Fecha_Nac','$Nacionalidad','$Telefono','$Celular','$Domicilio','$Escuela_Trabajo','$Email','$Fecha_Alta')";
		$res=mysqli_query($link,$sql);
	}

	return $Existe;

}



function Modificar_Usuario(){
	$Dni=$_POST['Dni'];
	$Nom_Ape=$_POST['Nom_Ape'];
	$Fecha_Nac=$_POST['Fecha_Nac'];
	$Nacionalidad=$_POST['Nacionalidad'];
	$Telefono=$_POST['Telefono'];
	$Celular=$_POST['Celular'];
	$Domicilio=$_POST['Domicilio'];
	$Escuela_Trabajo=$_POST['Escuela_Trabajo'];
	$Email=$_POST['Email'];

	$link=Conexion();

	$sql="SELECT * FROM usuario WHERE Dni='$Dni'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();

	if ($row['Dni']==$Dni) {
		$Existe="Si";
		$sql="UPDATE usuario SET Nom_Ape='$Nom_Ape',Fec_Nac='$Fecha_Nac',Nacionalidad='$Nacionalidad',Telefono='$Telefono',Celular='$Celular',Domicilio='$Domicilio',Domicilio_Seg='$Escuela_Trabajo',Email='$Email' WHERE Dni='$Dni'";
		$res=mysqli_query($link,$sql);
	}else{
		$Existe="No";
	}
	return $Existe;
}
?>