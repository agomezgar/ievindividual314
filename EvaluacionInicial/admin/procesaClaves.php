<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
 <html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Procesando clave enviada</title>
</head>

<body>
<?php
   include("conectarse.php");
   $link=Conectarse();
   $usuario=md5($_POST['usuario']);
   $contra=md5($_POST['contra']);
   $tutoria=$_POST['tutoria'];
   mysql_query("insert into claves (nombre,contra,tutoria) values ('$usuario','$contra','$tutoria')",$link);
   echo "<meta http-equiv=\"refresh\" content=\"0;URL=elige.php\">";
   ?>
</body>
</html>