<?php
mb_internal_encoding("UTF-8");
function Conexion(){
	$link	= mysqli_connect('localhost', 'root','root','biblioteca')or die('No se pudo conectar a la DB'. mysqli_error($link));
	return $link;
}

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
?>