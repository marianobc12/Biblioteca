<?php
mb_internal_encoding("UTF-8");
function Conexion(){
	$link	= mysqli_connect('localhost', 'root','root','instituto')or die('No se pudo conectar a la DB'. mysqli_error($link));
	return $link;
}


?>