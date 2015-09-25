<html>
<?php


function Conectarse()
{require('../config.php');
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
?></html>