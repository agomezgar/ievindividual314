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
      <?php
   require("conectarse.php");
   $link=Conectarse();

  $grupo=utf8_decode($_POST['grupo']);



   ?>
   
      <select name="alumno" id="alumno" onChange="validaralumno()">
	  <option value=""></option>

        <?php 
$ordenando=mysql_query("SELECT * FROM alumnos ORDER BY apellidos");
while($ordenado=mysql_fetch_array($ordenando)){

$result = mysql_query("SELECT alumno FROM matriculas WHERE grupo='$grupo'",$link);

while($row = mysql_fetch_array($result)) {
if ($row[alumno]==$ordenado[alumno]){
$nene=mysql_query("SELECT * FROM alumnos WHERE alumno=$row[alumno] ORDER BY apellidos");
while($nene2=mysql_fetch_array($nene)){
?>
        <option value="<?php echo $nene2['alumno'];?>"><?php echo urlencode($nene2['apellidos']).','.urlencode($nene2['nombre']); }?></option>
      
  <?php 
  
  mysql_free_result;}}}
?>
      </select>

