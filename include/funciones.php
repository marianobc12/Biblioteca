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
?>