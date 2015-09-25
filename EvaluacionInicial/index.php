<!DOCTYPE html>
<?php 
if (!file_exists("config.php")){
header ("Location: ./admin/");
}?>
<?php
function CleanFiles($dir)
{
    //Borrar los ficheros temporales
    $t = time();
    $h = opendir($dir);
    while($file=readdir($h))
    {
        if(substr($file,0,3)=='tmp' && substr($file,-4)=='.pdf')
        {
            $path = $dir.'/'.$file;
            if($t-filemtime($path)>3600)
                @unlink($path);
        }
    }
    closedir($h);
}
CleanFiles("evaluacion1");
CleanFiles("evaluacion2");
CleanFiles("evaluacion3");
CleanFiles("evaluacionextra");
?>

<html>
<head>
<title>Evaluación inicial</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <h1 align="center">Evaluación inicial</h1>
<form action="procesaClaves.php" method="post" name="claves">
  <label for="textfield">Nombre:</label>
  <input name="nombre" type="text" id="nombre"/>
  <label for="label">Contraseña:</label>
  <input name="contra" type="password" id="contra"  />
  <p>&nbsp;</p>
  <p>
    <label>
    <input type="submit" name="Submit" value="ENVIAR" />
    </label>
  <p>&nbsp; </p>
</form>
</body>
</html>
