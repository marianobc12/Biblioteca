<?php
/*mb_internal_encoding("UTF-8");*/
function Conexion(){
	$link	= mysqli_connect("localhost", "root", "", "biblioteca")or die('No se pudo conectar a la DB'. mysqli_error($link));
	mysqli_set_charset($link,"utf8");
	header('Content-type: text/html; charset=utf-8');
	return $link;
}
/* ('localhost', 'id6360398_baa','biblioteca','id6360398_baa')  coneccion*/

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

function Traer_Clave(){
	$Email=$_POST['Email'];
	$link=Conexion();
	$sql="SELECT Dni,Clave FROM cuenta WHERE Email='$Email'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();
	$clave=$row['Clave'];
	return $clave;

}

function Recuperar_Cuenta(){
	$Email=$_POST['Email'];
	$link=Conexion();
	$sql="SELECT Dni,Clave FROM cuenta WHERE Email='$Email'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();
	$numerorow=count($row);
	if ($Email==NULL){
		$cuenta="null";
	}else{
		if ($numerorow>0) {
			$cuenta="true";
			$Dni=$row['Dni'];
			$Clave=$row['Clave'];
			$Mensaje="Recuperacion de cuenta - Sistema Bibliotecario Adolfo Alsina\n Cuenta Recuperada\n D.N.I: ".$Dni."\n Contraseña: ".$Clave."\n Saludos!";
			mail($Email, "Recuperar Cuenta - Sistema Bibliotecario Adolfo Alsina", $Mensaje);
		}else{
			$cuenta="false";
		}
	}
	return $cuenta;
}

function Modificar_Cuenta(){
	$Id_Cuenta=$_SESSION['Id_Cuenta'];
	$Dni=$_POST['Dni'];
	$Nom_Ape=$_POST['Nom_Ape'];
	$Email=$_POST['Email'];

	$link=Conexion();
	$sql="UPDATE cuenta SET Dni='$Dni',Nom_Ape='$Nom_Ape',Email='$Email' WHERE Id_Cuenta='$Id_Cuenta'";
	$res=mysqli_query($link,$sql);

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
	$Observacion=$_POST['Observacion'];

	$link=Conexion();

	$sql="SELECT * FROM usuario WHERE Dni='$Dni'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();


	if ($row['Dni']==$Dni) {
		$Existe="Si";
	}else{
		$Existe="No";
		$sql="INSERT INTO usuario (Dni,Nom_Ape,Fec_Nac,Nacionalidad,Telefono,Celular,Domicilio,Domicilio_Seg,Email,Fecha_Alta,Observacion) VALUES ('$Dni','$Nom_Ape','$Fecha_Nac','$Nacionalidad','$Telefono','$Celular','$Domicilio','$Escuela_Trabajo','$Email','$Fecha_Alta','$Observacion')";
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
	$Observacion=$_POST['Observacion'];

	$link=Conexion();

	$sql="SELECT * FROM usuario WHERE Dni='$Dni'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();

	if ($row['Dni']==$Dni) {
		$Existe="Si";
		$sql="UPDATE usuario SET Nom_Ape='$Nom_Ape',Fec_Nac='$Fecha_Nac',Nacionalidad='$Nacionalidad',Telefono='$Telefono',Celular='$Celular',Domicilio='$Domicilio',Domicilio_Seg='$Escuela_Trabajo',Email='$Email',Observacion='$Observacion' WHERE Dni='$Dni'";
		$res=mysqli_query($link,$sql);
	}else{
		$Existe="No";
	}
	return $Existe;
}

function Traer_Nombres_Libros(){
	$link=Conexion();
	$sql="SELECT * FROM libro";
	$res=mysqli_query($link,$sql);
	return $res;
}

function Traer_Nombres_Libros_Prestamos(){
	$link=Conexion();
	$sql="SELECT * FROM libro WHERE Disponibilidad='Disponible'";
	$res=mysqli_query($link,$sql);
	return $res;
}


function Nuevo_Libro(){
	$Num_Inventario=$_POST['Num_inventario'];
	$Fecha_Entrada=$_POST['Fecha_entrada'];
	$Autor=$_POST['Autor'];
	$Titulo=$_POST['Titulo'];
	$Editorial=$_POST['Editorial'];
	$Genero=$_POST['Genero'];
	$Tipo_Operacion=$_POST['Tipo_Operacion'];
	 

	$link=Conexion();

	$sql="SELECT * FROM libro WHERE Num_Inventario='$Num_Inventario'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();
	
	if ($row['Num_Inventario']==$Num_Inventario) {
		$Existe="Si";
	}else{
		$Existe="No";
		$sql="INSERT INTO libro (Num_Inventario,Fecha_Entrada,Autor,Titulo,Editorial,Tipo_Operacion,Genero,Disponibilidad) VALUES ('$Num_Inventario','$Fecha_Entrada','$Autor','$Titulo','$Editorial','$Tipo_Operacion','$Genero','Disponible')";
		$res=mysqli_query($link,$sql);
	}

	return $Existe;


}

function Nuevo_Prestamo(){
	$Dni=$_POST['Dni'];
	$Num_Inventario=$_POST['Num_Inventario'];
	$Fecha_Prestamo=$_POST['Fecha_Prestamo'];
	$Fecha_Fin_Prestamo=$_POST['Fecha_Fin_Prestamo'];

	$link=Conexion();


	// CONSULTA PARA AVERIGUAR EL ID DEL USUARIO TENIENDO SU DNI//
	$sql="SELECT Id_Usuario FROM usuario WHERE Dni='$Dni'";
	$res=mysqli_query($link,$sql);
	$rowusuario=$res->fetch_assoc();
	$Id_Usuario=$rowusuario['Id_Usuario'];

	// CONSULTA PARA AVERIGUAR EL ID DEL LIBRO TENIENDO SU NUM DE INVENTARIO//
	$sql="SELECT Id_Libro FROM libro WHERE Num_Inventario='$Num_Inventario'";
	$res=mysqli_query($link,$sql);
	$rowlibro=$res->fetch_assoc();
	$Id_Libro=$rowlibro['Id_Libro'];

	// UPDATE QUE CAMBIA LA DISPONIBILIDAD DEL LIBRO A OCUPADO //
	$sql="UPDATE libro SET Disponibilidad='Ocupado' WHERE Id_Libro='$Id_Libro'";

	mysqli_query($link,$sql);

	// NUEVO PRESTAMO AGREGADO A LA BASE DE DATOS//
	$sql="INSERT INTO prestamo (Id_Usuario,Id_Libro,Fecha_Prestamo,Fecha_Fin_Prestamo,Activo) VALUES ('$Id_Usuario','$Id_Libro','$Fecha_Prestamo','$Fecha_Fin_Prestamo','Si')";
	
	mysqli_query($link,$sql);

}



function Eliminar_Usuario(){
	$Dni=$_POST['Dni'];

	$link=Conexion();

	$sql="SELECT * FROM usuario WHERE Dni='$Dni'";

	$res=mysqli_query($link,$sql);

	$row=$res->fetch_assoc();

	$Id_Usuario=$row['Id_Usuario'];


	/* Consulta sql para poner disponibles los libros antes de eliminar el usuario , sus prestamos y sus devoluciones. */

	$sql="UPDATE libro INNER JOIN prestamo ON libro.Id_Libro = prestamo.Id_Libro SET libro.Disponibilidad = 'Disponible' WHERE prestamo.Activo='Si' AND prestamo.Id_Usuario='$Id_Usuario'"; 

	mysqli_query($link,$sql);

	$sql="DELETE FROM usuario WHERE Dni='$Dni'";

	mysqli_query($link,$sql);

}

function Traer_Datos_Libros(){
	$Num_Inventario=$_POST['Num_Inventario'];

	$link=Conexion();

	$sql="SELECT * FROM libro WHERE Num_Inventario='$Num_Inventario'";

	$res=mysqli_query($link,$sql);

	$row=$res->fetch_assoc();

	return $row;
}

function Traer_Prestamos(){
	$link=Conexion();

	$rowusuario=Traer_Datos_Usuarios();

	$Id_Usuario=$rowusuario['Id_Usuario'];

	$sql="SELECT * FROM prestamo INNER JOIN libro ON prestamo.Id_Libro = libro.Id_Libro WHERE prestamo.Id_Usuario='$Id_Usuario' AND prestamo.Activo='Si'";

	$res=mysqli_query($link,$sql);

	return $res;
	
}


function Modificar_Libro(){
	$Num_Inventario=$_POST['Num_Inventario'];
	$Fecha_Entrada=$_POST['Fecha_Entrada'];
	$Autor=$_POST['Autor'];
	$Titulo=$_POST['Titulo'];
	$Editorial=$_POST['Editorial'];
	$Genero=$_POST['Genero'];
	$Tipo_Operacion=$_POST['Operacion'];

	$link=Conexion();

	$sql="SELECT * FROM libro WHERE Num_Inventario='$Num_Inventario'";
	$res=mysqli_query($link,$sql);
	$row=$res->fetch_assoc();

	if ($row['Num_Inventario']==$Num_Inventario) {
		$Existe="Si";
		$sql="UPDATE libro SET Fecha_Entrada='$Fecha_Entrada',Autor='$Autor',Titulo='$Titulo',Editorial='$Editorial',Tipo_Operacion='$Tipo_Operacion',Genero='$Genero' WHERE Num_Inventario='$Num_Inventario'";
		$res=mysqli_query($link,$sql);
	}else{
		$Existe="No";
	}
	return $Existe;
}


function Terminar_Prestamo(){
	$Id_Prestamo=$_POST['Id_Prestamo'];
	$Id_Libro=$_POST['Id_Libro'];

	$link=Conexion();

	$sql="UPDATE prestamo SET Activo='No' WHERE Id_Prestamo='$Id_Prestamo'";

	mysqli_query($link,$sql);

	$sql="UPDATE libro SET Disponibilidad='Disponible' WHERE Id_Libro='$Id_Libro'";

	mysqli_query($link,$sql);

	date_default_timezone_set("America/Buenos_Aires");
	$Fecha_Actual=date('Y-m-d');

	$sql="INSERT INTO devolucion (Id_Prestamo,Fecha_Devolucion) VALUES ('$Id_Prestamo','$Fecha_Actual')";

	mysqli_query($link,$sql);

}

function Borrar_Prestamo(){
	$Id_Prestamo=$_POST['Id_Prestamo'];

	$link=Conexion();

	$sql="SELECT * FROM prestamo WHERE Id_Prestamo='$Id_Prestamo'";

	$res=mysqli_query($link,$sql);

	$row=$res->fetch_assoc();

	$Id_Libro=$row['Id_Libro'];

	$sql="UPDATE libro SET Disponibilidad='Disponible' WHERE Id_Libro='$Id_Libro'";

	mysqli_query($link,$sql);

	$sql="DELETE FROM prestamo WHERE Id_Prestamo='$Id_Prestamo'";

	mysqli_query($link,$sql);


}


function Cantidad_Usuarios(){
	$link=Conexion();

	$sql="SELECT count(*) FROM usuario";
	
	$res=mysqli_query($link,$sql);

	$cant_usuario=mysqli_fetch_row($res);

	return $cant_usuario;
}

function Cantidad_Libros(){
	$link=Conexion();

	$sql="SELECT count(*) FROM libro";
	
	$res=mysqli_query($link,$sql);

	$cant_libro=mysqli_fetch_row($res);

	return $cant_libro;
}

function Cantidad_Prestamos_Hoy(){
	date_default_timezone_set("America/Buenos_Aires");
	$Fecha_Actual=date("Y-m-d");

	$link=Conexion();

	$sql="SELECT count(*) FROM prestamo WHERE Fecha_Prestamo='$Fecha_Actual'";

	$res=mysqli_query($link,$sql);

	$cant_prestamo_hoy=mysqli_fetch_row($res);

	return $cant_prestamo_hoy;



}

function Cantidad_Devoluciones_Hoy(){
	date_default_timezone_set("America/Buenos_Aires");
	$Fecha_Actual=date("Y-m-d");

	$link=Conexion();

	$sql="SELECT count(*) FROM devolucion WHERE Fecha_Devolucion='$Fecha_Actual'";

	$res=mysqli_query($link,$sql);

	$cant_devolucion_hoy=mysqli_fetch_row($res);

	return $cant_devolucion_hoy;

}


function Listar_Prestamos(){
	$link=Conexion();

	$sql="SELECT u.Dni,u.Nom_Ape,l.Num_Inventario,l.Titulo,p.Fecha_Prestamo,p.Fecha_Fin_Prestamo,p.Activo FROM  prestamo p INNER JOIN  libro l ON p.Id_Libro=l.Id_Libro INNER JOIN usuario u ON p.Id_Usuario=u.Id_Usuario";

	$res=mysqli_query($link,$sql);

	return $res;
}

function Listar_Libros(){
	$link=Conexion();

	$sql="SELECT * FROM libro";

	$res=mysqli_query($link,$sql);

	return $res;
}

function Cambiar_Contraseña(){
	$link=Conexion();

	$Id_Cuenta=$_SESSION['Id_Cuenta'];

	$Contraseña_Nueva=$_POST['Contraseña_Nueva1'];

	$sql="UPDATE  cuenta SET Clave='$Contraseña_Nueva'  WHERE Id_Cuenta='$Id_Cuenta'";

	mysqli_query($link,$sql);
}

function Crear_Cuenta(){
	$Dni=$_POST['Dni'];
	$Nom_Ape=$_POST['Nom_Ape'];
	$Tipo_Cuenta=$_POST['Tipo_Cuenta'];
	$Email=$_POST['Email'];
	$Contraseña=$_POST['Contraseña'];
	
	$link=Conexion();

	$sql="SELECT * FROM cuenta WHERE Dni='$Dni'";

	$res=mysqli_query($link,$sql);

	$row=mysqli_num_rows($res);

	if($row>0){
		$Existe="Si";
	}else{
		$Existe="No";
	}
	
	echo $Existe;

	$sql="INSERT INTO cuenta (Dni,Nom_Ape,Tipo,Email,Clave) VALUES ('$Dni','$Nom_Ape','$Tipo_Cuenta','$Email','$Contraseña')";

	mysqli_query($link,$sql);

	return $Existe;
}


function Deudores(){
	date_default_timezone_set("America/Buenos_Aires");
	$Fecha_Actual=date('Y-m-d');

	$link=Conexion();

	$sql="SELECT u.Dni,u.Nom_Ape,u.Telefono,u.Domicilio,l.Num_Inventario,l.Titulo,p.Fecha_Fin_Prestamo  FROM prestamo p INNER JOIN libro l ON p.Id_Libro=l.Id_Libro INNER JOIN usuario u ON p.Id_Usuario=u.Id_Usuario WHERE p.Activo='Si' AND p.Fecha_Fin_Prestamo<'$Fecha_Actual'";

	$res=mysqli_query($link,$sql);

	return $res;
}

function Devoluciones(){
	$Id_Usuario=$_POST['Id_Usuario'];

	$link=Conexion();

	$sql="SELECT u.Nom_Ape,l.Num_Inventario,l.Titulo,p.Fecha_Prestamo,p.Fecha_Fin_Prestamo,d.Fecha_Devolucion FROM devolucion d INNER JOIN prestamo p ON  d.Id_Prestamo=p.Id_Prestamo INNER JOIN usuario u ON p.Id_Usuario=u.Id_Usuario INNER JOIN libro l ON p.Id_Libro=l.Id_Libro WHERE u.Id_Usuario='$Id_Usuario'";

	$res=mysqli_query($link,$sql);

	return $res;
}

function Eliminar_Libro(){
	$Num_Inventario=$_POST['Num_Inventario'];

	$link=Conexion();

	$sql="DELETE FROM libro WHERE Num_Inventario='$Num_Inventario'";

	$res=mysqli_query($link,$sql);

}



?>