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
$grupo=$_POST['grupo'];
$alumno=$_POST['alumno'];
$apellidos=$_POST['apellidos'];
 $nombre=$_POST['nombre'];
$dni=$_POST['dni'];
	  $padre=$_POST['padre];
	   $g=$_POST['g'];
	    $madre=$_POST['madre'];
		 $h=$_POST['h'];
		 $dom=$_POST['dom'];
  $loc=$_POST['loc'];
 $prov=$_POST['prov'];
 $tf=$_POST['tf'];
 $b=$_POST['b'];
 

mysql_query("insert into alumnos(alumno,apellidos,nombre,dni,padre,g,madre,h,dom,loc,prov,tf,b)values('$alumno','$apellidos','$nombre','$dni','$padre','$g','$madre','$h','$dom,'$loc','$prov','$tf','$b')",$link)or die (mysql_error());
mysql_free_result;
echo "<meta http-equiv=\"refresh\" content=\"0;URL=elige.php\">";
   ?>
</body>
</html>
