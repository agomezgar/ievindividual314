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
 * a la comunidad, pero SIN NINGUNA GARANTIA, Â¡RECLAMACIONES, AL MAESTRO 
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
<title>Introducir datos de alumno individual.</title>
</head>

<body>
Rellene los datos referidos al nuevo alumnno:
<form id="items" name="items" method="post" action="procesalumnoindividual.php">
 
   
<p>
      GRUPO AL QUE PERTENECE EL ALUMNO:
<select name="grupo" id="grupo" OnChange="enviar()">
  <option value=""></option>
        <?
	require("../conectarse.php");	 

   $link=Conectarse();
   $result = mysql_query("SELECT * FROM gruposinf order by nombre",$link);

while($row = mysql_fetch_array($result)) {?>
        <option value="<?php echo $row['nombre'];?>"><?php echo $row['nombre']; }?></option> </select></p> 
<p>Nº MATRICULA (maximo cinco cifras)
    <input name="alumno" type="text" id="alumno"  size="5" />
</p>
  <p>APELLIDOS
    <input name="apellidos" type="text" id="apellidos"  size="100" />
</p>
  <p>NOMBRE
    <input name="nombre" type="text" id="nombre" size="100" />
</p>
  <p>DNI
    <input name="dni" type="text" id="dni" size="100" />
</p>
  <p>APELLIDOS DEL PADRE
    <input name="padre" type="text" id="padre" size="100" />
</p>
  <p>NOMBRE DEL PADRE
    <input name="g" type="text" id="g"  size="100" />
</p>
  <p>NOMBRE DE LA MADRE
    <input name="madre" type="text" id="madre"  size="100" />
</p>
  <p>APELLIDOS DE LA MADRE
    <input name="h" type="text" id="h" size="100" />
</p>
  <p>DOMICILIO
    <input name="dom" type="text" id="dom"  size="100" />
</p>
  <p>LOCALIDAD
    <input name="loc" type="text" id="loc"  size="100" />
</p>
  <p>PROVINCIA
    <input name="prov" type="text" id="prov"  size="100" />
</p>
  <p>TELEFONO 1
    <input name="tf" type="text" id="tf"  size="100" />
</p>
  <p>TELEFONO 2
    <input name="b" type="text" id="b"  size="100" />
</p>
  
    <input type="submit" name="Submit" value="GRABAR" />
  </p>
  <p>&nbsp;</p></div>
</form>
</body>
</html>
