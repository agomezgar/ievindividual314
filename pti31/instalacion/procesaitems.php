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
$cursofinal="CONTENIDOS".$materia.$curso;

$item1=$_POST['item1'];
 $item2=$_POST['item2'];
$item3=$_POST['item3'];
	  $item4=$_POST['item4'];
	   $item5=$_POST['item5'];
	    $item6=$_POST['item6'];
		 $item7=$_POST['item7'];
		 $item8=$_POST['item8'];
  $item9=$_POST['item9'];
 $item10=$_POST['item10'];
 $item11=$_POST['item11'];
 $item12=$_POST['item12'];
 $item13=$_POST['item13'];
 $item14=$_POST['item14'];
 $item15=$_POST['item15'];
 $item16=$_POST['item16'];
 $item17=$_POST['item17'];
 $item18=$_POST['item18'];
 $item19=$_POST['item19'];
 $item20=$_POST['item20'];
      $BORRARCUARTO="DROP TABLE $cursofinal";
mysql_query ($BORRARCUARTO,$link);
 $CONTENIDOSCUARTO="CREATE TABLE $cursofinal(
 `id` INT NOT NULL AUTO_INCREMENT ,
`b1` TEXT NOT NULL ,
`b2` TEXT NOT NULL ,
`b3` TEXT NOT NULL ,
`b4` TEXT NOT NULL ,
`b5` TEXT NOT NULL ,
`b6` TEXT NOT NULL ,
`b7` TEXT NOT NULL ,
`b8` TEXT NOT NULL ,
`b9` TEXT NOT NULL ,
`b10` TEXT NOT NULL ,
`b11` TEXT NOT NULL ,
`b12` TEXT NOT NULL ,
`b13` TEXT NOT NULL ,
`b14` TEXT NOT NULL ,
`b15` TEXT NOT NULL ,
`b16` TEXT NOT NULL ,
`b17` TEXT NOT NULL ,
`b18` TEXT NOT NULL ,
`b19` TEXT NOT NULL ,
`b20` TEXT NOT NULL ,
PRIMARY KEY ( `id` )  )";
mysql_query($CONTENIDOSCUARTO,$link);
mysql_query("insert into $cursofinal(b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,b16,b17,b18,b19,b20)values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13','$item14','$item15','$item16','$item17','$item18','$item19','$item20')",$link)or die (mysql_error());
   echo "<meta http-equiv=\"refresh\" content=\"3;URL=elige.php\">";
   ?>
</body>
</html>
