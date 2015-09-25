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
<title>Introducir el bloque de actividades estandar para el curso y materia especificados...</title>
</head>

<body>
La relacion de actividades que aqui se especifique aparecera por defecto en la pti que se realice para cada alumno, si bien luego el profesor responsable puede modificarla a placer...
<form id="items" name="items" method="post" action="procesactividades.php">
   CURSO SOBRE EL QUE SE HACE LA PTI:
      <select name="curso" id="curso">
	
         
         <option value="PRIMEROSEC">PRIMERO DE SECUNDARIA</option> 
         <option value="SEGUNDOSEC">SEGUNDO DE SECUNDARIA</option> 
         <option value="TERCEROSEC">TERCERO DE SECUNDARIA</option> 
	 <option value="CUARTOSEC">CUARTO DE SECUNDARIA</option>	
<option value="PCPI">PCPI</option>
 <option value="PRIMEROPRIM">PRIMERO DE PRIMARIA</option>	
 <option value="SEGUNDOPRIM">SEGUNDO DE PRIMARIA</option>
 <option value="TERCEROPRIM">TERCERO DE PRIMARIA</option>
 <option value="CUARTOPRIM">CUARTO DE PRIMARIA</option>
 <option value="QUINTOPRIM">QUINTO DE PRIMARIA</option>
 <option value="SEXTOPRIM">SEXTO DE PRIMARIA</option>
       </select> </p>
<p>
      MATERIA SOBRE LA QUE SE HACE LA PTI:
<select name="materia" id="materia" OnChange="enviar()">
  <option value=""></option>
        <?
	require("../conectarse.php");	 

   $link=Conectarse();
   $result = mysql_query("SELECT * FROM materias order by materia",$link);

while($row = mysql_fetch_array($result)) {?>
        <option value="<?php echo $row['materia'];?>"><?php echo $row['nombre']; }?></option> </p> 
  <p>ACTIVIDADES PARA EL CURSO:
    <TEXTAREA COLS=100% ROWS=20 NAME="activ">
</TEXTAREA> 
</p>
  
  <p>
    <input type="submit" name="Submit" value="GRABAR" />
  </p>
  <p>&nbsp;</p></div>
</form>
</body>
</html>
