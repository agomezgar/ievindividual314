<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
   include("conectarse.php");
   $link=Conectarse();


//copiamos el archivo a la carpeta temporal
  //    Script Que copia el archivo temporal subido al servidor en un directorio.
$tipo = $_FILES['tablacsv']['type'];

//    Definimos Directorio donde se guarda el archivo
$dir = '../archivos/';



if (!copy($_FILES['tablacsv']['tmp_name'], $dir.$_FILES['tablacsv']['name']))
echo '<script> alert("'.$id_error_upload.'");</script>';

//una vez transferido, lo abrimos e insertamos en la base de datos la información
//abro el archivo
move_uploaded_file($_FILES['tablacsv']['tmp_name'],$dir.$_FILES['tablacsv']['name']);
$arch=$dir.$_FILES['tablacsv']['name'];

	$carga="LOAD DATA LOCAL INFILE '$arch' INTO TABLE matriculas FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\r\n' IGNORE 1 LINES";
mysql_query($carga,$link) or die (mysql_error());

	   $gruposinstituto = mysql_query("SELECT * FROM matriculas ",$link);

while($row = mysql_fetch_array($gruposinstituto)) {
$grupoclase=$row['grupo'];
$compruebagrupo=mysql_query("SELECT * FROM gruposinf WHERE nombre='$grupoclase'");
if (mysql_num_rows($compruebagrupo)==0){


mysql_query("insert into gruposinf (nombre) values ('$grupoclase')",$link);}
	}
echo "<meta http-equiv=\"refresh\" content=\"0;URL=elige.php\">";
	



?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
