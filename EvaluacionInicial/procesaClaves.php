 
<?php 
 session_start();    
   include("conectarse.php");
   header("Content-type: text/html; charset=UTF-8");
   $link=Conectarse();
   $nombre=md5($_POST['nombre']);
   $nombreSinClave=$_POST['nombre'];
   $contra=md5($_POST['contra']);
	$result = mysql_query("SELECT * FROM claves WHERE nombre='$nombre' AND contra='$contra'");

    
$row = mysql_fetch_array($result);
 $tutoria=$row["tutoria"];
$usuario=$nombre;

if ((!isset($row[0]))) {
die( "El Usuario con Nombre <B>".$nombreSinClave."</B> no está registrado en nuestra base de datos o no ha introducido adecuadamente su clave."); mysql_close();
} else{
  
if ($tutoria==="no")
    {
    echo "El usuario ".$nombreSinClave." no es tutor de ningún grupo.";
}else if($tutoria==="administrador"){
 echo "El usuario ".$nombreSinClave." es adjunto al Departamento de orientación";

}
else{
      
echo "El usuario ".$nombreSinClave." tiene asignada la tutoría de: ".$tutoria;
}
  $_SESSION["tutoria"]=$tutoria;
  $_SESSION["nombre"]=$usuario;
echo "<meta http-equiv=\"refresh\" content=\"5;URL=pruebaConexion.php\">";

}

  ?>
