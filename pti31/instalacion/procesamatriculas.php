<?php 
/*
 *    
 *      Copyright 2009 Antonio Gomez Garcia <agomeztron@yahoo.es>
 *      
 * Este programa es software libre; lo puedes redistribuir y/o modificar
 * bajo los terminos de la licencia publica GNU, publicada por la Free 
 * Software Foundation; ya sea la version 2 de la licencia, o cualquier 
 * version posterior.
 * 
 * Este programa se esta distribuyendo con la esperanza de que sea util 
 * a la comunidad, pero SIN NINGUNA GARANTIA, ¡RECLAMACIONES, AL MAESTRO 
 * ARMERO!, que decian en la mili. Si te quedas con la duda, examina los
 * terminos de la licencia GNU
 * 
 * Deberias haber recibido una copia de la Licencia Publica General GNU 
 * junto con esta aplicacion. Si no es asi, y te da pereza tirar de In-
 * ternet, escribe a: Free Software Foundation, Inc., 51 Franklin Street
 * , Fifth Floor, Boston, MA 02110-1301,USA.
 * 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
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

</body>
</html>
