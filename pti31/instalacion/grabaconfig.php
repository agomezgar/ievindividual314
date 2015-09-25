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

$abro_fichero = fopen('../config.php','w');
$servidor=$_POST['servidor'];
$base=$_POST['base'];
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];
$nombrecentro=$_POST['nombrecentro'];
$direccion=$_POST['direccion'];
$curso=$_POST['curso'];
	$salto = "\n";
		
	$linea_1 = '<?php'; 
	fputs($abro_fichero,$linea_1); 
	fputs($abro_fichero,$salto);

	$linea_2 = '$servidor = \''.$servidor.'\';'; 
	fputs($abro_fichero,$linea_2); 
	fputs($abro_fichero,$salto);
		$linea_3 = '$base = \''.$base.'\';'; 
	fputs($abro_fichero,$linea_3); 
	fputs($abro_fichero,$salto);
		$linea_4 = '$usuario = \''.$usuario.'\';'; 
	fputs($abro_fichero,$linea_4); 
	fputs($abro_fichero,$salto);
		$linea_5 = '$contra = \''.$contra.'\';'; 
	fputs($abro_fichero,$linea_5); 
	fputs($abro_fichero,$salto);
			$linea_6 = '$nombrecentro = \''.$nombrecentro.'\';'; 
	fputs($abro_fichero,$linea_6); 
			$linea_7 = '$direccion = \''.$direccion.'\';'; 
	fputs($abro_fichero,$linea_7); 
	fputs($abro_fichero,$salto);
		$linea_9 = '$curso = \''.$curso.'\';'; 
	fputs($abro_fichero,$linea_9); 
	
	fputs($abro_fichero,$salto);
	$linea_8 = '?>'; 
	fputs($abro_fichero,$linea_8); 
		fputs($abro_fichero,$salto);

	fclose($abro_fichero);
	
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=creatablas.php\">";
	?>
</body>
</html>
