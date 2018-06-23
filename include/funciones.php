<?php
mb_internal_encoding("UTF-8");
function Conexion(){
	$link	= mysqli_connect('localhost', 'root','root','biblioteca')or die('No se pudo conectar a la DB'. mysqli_error($link));
	return $link;
}


?>