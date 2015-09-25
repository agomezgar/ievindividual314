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
$curso=$_POST['curso'];
$materia=$_POST['materia'];
$actividadesfinal="ACTIVIDADES".$materia.$curso;

$activ=$_POST['activ'];

   $BORRARCUARTO="DROP TABLE $actividadesfinal";
mysql_query ($BORRARCUARTO,$link);
 $CONTENIDOSCUARTO=" CREATE TABLE IF NOT EXISTS $actividadesfinal(
 `id` INT NOT NULL AUTO_INCREMENT ,
`activ` TEXT NOT NULL ,

PRIMARY KEY ( `id` )  )";
mysql_query($CONTENIDOSCUARTO,$link) or die (mysql_error());
mysql_query("insert into $actividadesfinal(activ)values('$activ')",$link)or die (mysql_error());
   echo "<meta http-equiv=\"refresh\" content=\"3;URL=elige.php\">";
   ?>
</body>
</html>
