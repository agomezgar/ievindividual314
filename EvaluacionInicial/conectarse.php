<html>
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
//PONER FALSE,128 PROTEGE CONTRA ERRORES DATA LOCAL INSIDE
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