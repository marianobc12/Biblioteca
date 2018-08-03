<?php
mb_internal_encoding("UTF-8");
function Conexion(){
	$link	= mysqli_connect('localhost', 'root','root','biblioteca')or die('No se pudo conectar a la DB'. mysqli_error($link));
	return $link;
}
/*('localhost', 'id6360398_biblioteca','biblioteca','id6360398_biblioteca')*/

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
}




?>