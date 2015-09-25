<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
{require('config.php');
//ATENCION!  FALSE Y 128 EVITA LOS ERROES DE NO FUNCIONA CON ESTA VERSION DE MYSQL...

   if (!($link=mysql_connect($servidor,$usuario,$contra,false,128)))
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
