<?php 
if (file_exists("../config.php")){
header ("Location: elige.php");
}?>
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
<form id="form1" name="form1" method="post" action="grabaconfig.php">
  <label>Servidor:
  <input name="servidor" type="text" id="servidor" value="normalmente, es localhost" size="50%" />
  </label>
  <p>Nombre de base:
    <label>
    <input name="base" type="text" id="base" value="Introduce el nombre de tu base de datos" size="50%" />
    </label>
</p>
  <p>Nombre de usuario:
    <label>
    <input name="usuario" type="text" id="usuario" value="Introduce el nombre de usuario de la base" size="50%" />
    </label>
</p>
  <p>Contrase&ntilde;a:
    <label>
    <input name="contra" type="password" id="contra" />
    </label>
  </p>
  <p>Nombre del centro: 
    <label>
    <input name="nombrecentro" type="text" id="nombrecentro" value="Introducir nombre que queremos que aparezca en los informes" size="50%" />
    </label>
  </p>
  <p>Direcci&oacute;n: 
    <label>
    <input name="direccion" type="text" id="direccion" />
    </label>
  </p>
<p>Curso:
    <label>
    <input name="curso" type="text" id="curso" />
    </label>
</p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Grabar datos" />
    </label>
  </p>
</form>
</body>
</html>
