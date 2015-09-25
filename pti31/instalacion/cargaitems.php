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
<title>Introducir bloques de contenidos (hasta 20)</title>
</head>

<body>
Puede introducir hasta veinte bloques de contenido para cada curso y materia...
<form id="items" name="items" method="post" action="procesaitems.php">
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
      MATERIA SOBRE LA QUE SE HACE LA PTI:
<select name="materia" id="materia" OnChange="enviar()">
  <option value=""></option>
        <?
	require("../conectarse.php");	 

   $link=Conectarse();
   $result = mysql_query("SELECT * FROM materias order by materia",$link);

while($row = mysql_fetch_array($result)) {?>
        <option value="<?php echo $row['materia'];?>"><?php echo $row['nombre']; }?></option> </p> 
  <div id="formulario"><p>BLOQUES DE CONTENIDOS </p>
<p>BLOQUE DE CONTENIDOS 1
    <input name="item1" type="text" id="item1"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 2
    <input name="item2" type="text" id="item2"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 3
    <input name="item3" type="text" id="item3" size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 4
    <input name="item4" type="text" id="item4" size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 5
    <input name="item5" type="text" id="item5" size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 6
    <input name="item6" type="text" id="item6"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 7
    <input name="item7" type="text" id="item7"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 8
    <input name="item8" type="text" id="item8" size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 9
    <input name="item9" type="text" id="item9"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 10
    <input name="item10" type="text" id="item10"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 11
    <input name="item11" type="text" id="item11"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 12
    <input name="item12" type="text" id="item12"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 13
    <input name="item13" type="text" id="item13"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 14
    <input name="item14" type="text" id="item14"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 15
    <input name="item15" type="text" id="item15"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 16
    <input name="item16" type="text" id="item16"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 17
    <input name="item17" type="text" id="item17"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 18
    <input name="item18" type="text" id="item18"  size="100" />
</p>

  <p>BLOQUE DE CONTENIDOS 19
    <input name="item19" type="text" id="item19"  size="100" />
</p>
  <p>BLOQUE DE CONTENIDOS 20
    <input name="item20" type="text" id="item20"  size="100" />
</p>
  <p>
    <input type="submit" name="Submit" value="GRABAR" />
  </p>
  <p>&nbsp;</p></div>
</form>
</body>
</html>
