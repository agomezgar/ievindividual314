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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<html>
<head>
   <title>CONEXIÓN</title>
</head>
<body>
<?php


function Conectarse()
{require('../config.php');
   if (!($link=mysql_connect($servidor,$usuario,$contra)))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db($base,$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}

$link=Conectarse();


mysql_close($link); //cierra la conexion
?>
</body>
</html> 
</body>
</html>
