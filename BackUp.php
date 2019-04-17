<?php 
    //ENTER THE RELEVANT INFO BELOW
 /*   $mysqlUserName      = "root";
    $mysqlPassword      = "root";
    $mysqlHostName      = "localhost";
    $DbName             = "biblioteca";
    $backup_name        = "BackUpBibliotecaAlsina.sql";
    $tables             = "*";

   //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );

    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
        echo $content; exit;
    }*/



    date_default_timezone_set("America/Buenos_Aires");

    $db_host = 'localhost'; //Host del Servidor MySQL
	$db_name = 'biblioteca'; //Nombre de la Base de datos
	$db_user = 'root'; //Usuario de MySQL
    $db_pass = 'root'; //Password de Usuario MySQL
    
    $fecha = date("Ymd-His"); //Obtenemos la fecha y hora para identificar el respaldo

    // Construimos el nombre de archivo SQL Ejemplo: mibase_20170101-081120.sql
    $salida_sql = $db_name.'_'.$fecha.'.sql'; 
    
    //Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
    $dump = "C:\wamp\bin\mysql\mysql5.6.17\bin\mysqldump --host=".$db_host." --user=".$db_user." --password=".$db_pass."  ".$db_name." > $salida_sql";
    
    system($dump, $output); //Ejecutamos el comando para respaldo

    $zip = new ZipArchive(); //Objeto de Libreria ZipArchive

    //Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
    $salida_zip = $db_name.'_'.$fecha.'.zip';
    
    if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
		$zip->addFile($salida_sql); //Agregamos el archivo SQL a ZIP
		$zip->close(); //Cerramos el ZIP
		unlink($salida_sql); //Eliminamos el archivo temporal SQL
		header ("Location: $salida_zip"); // Redireccionamos para descargar el Arcivo ZIP
		} else {
		echo 'No se pudo hacer la copia de resguardo.'; //Enviamos el mensaje de error
	}
?>