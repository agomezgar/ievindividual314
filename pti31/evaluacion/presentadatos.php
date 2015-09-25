
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
   include("conectarse.php");
   include("../config.php");
   $link=Conectarse();
  $alumno=$_POST['alumno'];
  $grupo=$_POST['grupo'];
$materia=$_POST['materia'];
$curso=$_POST['CURSO'];
$nivelcontenidos="CONTENIDOS".$materia.$curso;
$nivelactividades="ACTIVIDADES".$materia.$curso;
         $result2 = mysql_query("SELECT * FROM alumnos WHERE alumno='$alumno'",$link);

while($row3 = mysql_fetch_array($result2)) {
$nombrealumno=$row3['apellidos'].",".$row3['nombre'];
$nombre=$row3['nombre'];
$apellidos=$row3['apellidos'];
$fecha=$row3['fecha'];
$dom=$row3['dom'];
$loc=$row3['loc'];
$prov=$row3['prov'];
$tf=$row3['tf'];
$tf2=$row3['b']; 
$apelpadre=$row3['padre'];
$nombrepadre=$row3['g'];
$apelmadre=$row3['madre'];
$nombremadre=$row3['h'];



?>

<table width="50%" border="1" align="center">
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <p><strong><?php echo $grupo;?></strong></p>
      <p><strong>PLAN DE TRABAJO  INDIVIDUALIZADO </strong></p>
      <p align="left"><strong>ALUMNO/A:<?PHP echo urlencode($row3['apellidos']).",".urlencode($row3['nombre']);?> &nbsp;</strong></p>
    </div></td>
  </tr>
</table>
<p>
<?php 
$alumnobjeto=$alumno.$materia.$curso;
$result3=mysql_query("select * from pti where id='$alumnobjeto'",$link);

while($comprueba= mysql_fetch_array($result3)) {
$d=$comprueba['id'];}
if (!isset($d)){echo "En este momento no constan medidas de ampliacion y/o refuerzo"; $destino="grabarinforme.php";}
if (isset($d)){echo "Ya se ha rellenado un informe sobre la evaluacion del alumno; rellenar este informe supone introducir cambios ";$destino="actualizarinforme.php";}

mysql_free_result($result3);
?>
<p>

<p>
<fieldset><legend><strong>DATOS PERSONALES</strong></legend>
<?

	    $result3 = mysql_query("SELECT * FROM pti WHERE id='$alumnobjeto'",$link);

while($row4 = mysql_fetch_array($result3)) {
$idalumno2=$row4['idalumno'];
$nombre2=$row4['NOMBRE'];
$curso2=$row4['CURSO'];
$tutor2=$row4['TUTOR'];
$materia2=$row4['MATERIA'];
$calificacion2=$row4['CALIFICACION'];
$profesor2=$row4['PROFESOR'];
$acnee2=$row4['ACNEE'];
$objetor2=$row4['OBJETOR'];
$acneae2=$row4['ACNEAE'];
$diver2=$row4['DIVER'];
$absen2=$row4['ABSEN'];
$tarde2=$row4['TARDE'];
$interc2=$row4['INTERC'];
$vago2=$row4['VAGO'];
$dificultades2=$row4['DIFICULTADES'];
$rec12=$row4['rec1'];
$rec22=$row4['rec2'];
$rec32=$row4['rec3'];
$rec42=$row4['rec4'];
$rec52=$row4['rec5'];
$rec62=$row4['rec6'];
$rec72=$row4['rec7'];
$rec82=$row4['rec8'];
$rec92=$row4['rec9'];
$rec102=$row4['rec10'];
$rec112=$row4['rec11'];
$rec122=$row4['rec12'];
$rec132=$row4['rec13'];
$rec142=$row4['rec14'];
$rec152=$row4['rec15'];
$rec162=$row4['rec16'];
$rec172=$row4['rec17'];
$rec182=$row4['rec18'];
$rec192=$row4['rec19'];
$rec202=$row4['rec20'];
$evc12=$row4['evc1'];
$evc22=$row4['evc2'];
$evc32=$row4['evc3'];
$evc42=$row4['evc4'];
$evc52=$row4['evc5'];
$evc62=$row4['evc6'];
$evc72=$row4['evc7'];
$evc82=$row4['evc8'];
$evc92=$row4['evc9'];
$evc102=$row4['evc10'];
$evc112=$row4['evc11'];
$evc122=$row4['evc12'];
$evc132=$row4['evc13'];
$evc142=$row4['evc14'];
$evc152=$row4['evc15'];
$evc162=$row4['evc16'];
$evc172=$row4['evc17'];
$evc182=$row4['evc18'];
$evc192=$row4['evc19'];
$evc202=$row4['evc20'];
$otro2=$row4['OTRO'];
$actividades2=$row4['ACTIVIDADES'];
$comp12=$row4['COMP1'];
$comp22=$row4['COMP2'];
$comp32=$row4['COMP3'];
$comp42=$row4['COMP4'];
$comp52=$row4['COMP5'];
$comp62=$row4['COMP6'];
$comp72=$row4['COMP7'];
$comp82=$row4['COMP8'];
$comp92=$row4['COMP9'];
$calificapti2=$row4['CALIFICAPTI'];
$observaciones2=$row4['OBSERVACIONES'];


}
 $buscacontenidos = mysql_query("SELECT * FROM $nivelcontenidos",$link);

while($rowcont = mysql_fetch_array($buscacontenidos)) {
$conte1=$rowcont['b1'];
$conte2=$rowcont['b2'];
$conte3=$rowcont['b3'];
$conte4=$rowcont['b4'];
$conte5=$rowcont['b5'];
$conte6=$rowcont['b6'];
$conte7=$rowcont['b7'];
$conte8=$rowcont['b8'];
$conte9=$rowcont['b9'];
$conte10=$rowcont['b10'];
$conte11=$rowcont['b11'];
$conte12=$rowcont['b12'];
$conte13=$rowcont['b13'];
$conte14=$rowcont['b14'];
$conte15=$rowcont['b15'];
$conte16=$rowcont['b16'];
$conte17=$rowcont['b17'];
$conte18=$rowcont['b18'];
$conte19=$rowcont['b19'];
$conte20=$rowcont['b20'];

}

 $buscactividades = mysql_query("SELECT * FROM $nivelactividades",$link);

while($rowcont2 = mysql_fetch_array($buscactividades)) {
$activ=$rowcont2['activ'];

}
?>
<form id="form1" name="form1" method="post" action="<?php echo $destino; ?>">

      <table width="100%" border="1">
        <tr>
          <td colspan="7"><div align="center"><strong> DATOS PERSONALES DEL ALUMNO </strong></div></td>
        </tr>
        <tr>
          <td width="26%"><strong>CENTRO</strong></td>
          <td colspan="2"><strong>LOCALIDAD</strong></td>
          <td width="22%"><strong>CURSO</strong></td>
          <td width="11%" colspan="3"><strong>FECHA ACTUAL </strong></td>
        </tr>
        <tr>
          <td><?php echo $nombrecentro; ?> </td>
          <td colspan="2"><?php echo $direccion; ?></td>
      
          <td><?php echo $grupo; ?></td>
          <td colspan="2"><?
echo date(d."-".m."-".Y); 
?></td>
        </tr>
        <tr>
          <td><strong>NOMBRE DEL ALUMNO </strong></td>
          <td colspan="6"><strong>APELLIDOS DEL ALUMNO </strong></td>
        </tr>
        <tr>
          <td><?php echo urlencode($nombre); ?>&nbsp;</td>
          <td colspan="6"><?php echo urlencode($apellidos); ?>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>FECHA DE NACIMIENTO </strong></td>
          <td width="41%" ><strong>PROFESOR/-A TUTOR/-A </strong></td>
          <td colspan="2" ><strong>NIVEL-GRUPO</strong></td>
        </tr>
        <tr>
          <td><?php echo $fecha; ?>&nbsp;</td>
          <td ><input name="tutor" type="text" id="tutor" size="50" value="<?php echo urlencode($tutor2);?>"></td>
          <td width="41%" ><?php echo $grupo; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>DIRECCI&Oacute;N</strong></td>
          <td ><strong>TEL&Eacute;FONO</strong></td>
          <td ><strong>PADRES/TUTORES LEGALES </strong></td>
        </tr>
        <tr>
          <td rowspan="2"><?php echo urlencode($dom).", ".urlencode($loc).", ".urlencode($prov); ?>&nbsp;</td>
          <td ><?php echo $tf; ?>&nbsp;</td>
          <td ><?php echo urlencode($apelpadre).", ".urlencode($nombrepadre); ?>&nbsp;</td>
        </tr>
        <tr>
          <td ><?php echo $tf2; ?>&nbsp;</td>
          <td ><?php echo urlencode($apelmadre).", ".urlencode($nombremadre); ?>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
<fieldset>
<p align="center">
       
  </p>
<p align="left">MATERIA: <?php echo $materia;?>
</p>
<p align="left">PROFESOR ENCARGADO: 
       <label>
       <input name="profesor" type="text" id="profesor" size="50" value="<?php echo urlencode($profesor2);?>">
       </label>
</p>
     <p align="left">CURSO SOBRE EL QUE SE BASA LA PTI: <?php echo $curso;?>
</p>
 <p align="left">CALIFICACI&Oacute;N ACTUAL DEL ALUMNO:</p>
  
       <label>
       <select name="calificacion" id="calificacion" >
         <option value="1"<?php if ($calificacion2==1){ echo "selected";}?>>1</option>
         <option value="2"<?php if ($calificacion2==2){ echo "selected";}?>>2</option>
         <option value="3"<?php if ($calificacion2==3){ echo "selected";}?>>3</option>
         <option value="4"<?php if ($calificacion2==4){ echo "selected";}?>>4</option>
         <option value="5"<?php if ($calificacion2==5){ echo "selected";}?>>5</option>
         <option value="6"<?php if ($calificacion2==6){ echo "selected";}?>>6</option>
         <option value="7"<?php if ($calificacion2==7){ echo "selected";}?>>7</option>
         <option value="8"<?php if ($calificacion2==8){ echo "selected";}?>>8</option>
         <option value="9"<?php if ($calificacion2==9){ echo "selected";}?>>9</option>
         <option value="10"<?php if ($calificacion2==10){ echo "selected";}?>>10</option>
       </select>
       </label></p>
     <p align="center"><strong>PERFIL ACAD&Eacute;MICO DEL ALUMNO/-A:</strong></p>
     <table width="100%" border="1">
       <tr>
         <td><p align="center">&nbsp;</p>
           <p>
             <label>
               <input type="checkbox" name="ACNEE" value="1" <?php if ($acnee2=="1") {echo "checked";} ?>>
               ACNEE</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="OBJETOR" value="1"<?php if ($objetor2=="1") {echo "checked";} ?>>
               OBJETOR ESCOLAR</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="ACNEAE" value="1"<?php if ($acneae2=="1") {echo "checked";} ?>>
               ACNEAE</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="DIVER" value="1" <?php if ($diver2=="1") {echo "checked";} ?>>
               DIVERSIFICACION CURRICULAR</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="ABSEN" value="1" <?php if ($absen2=="1") {echo "checked";} ?>>
               ABSENTISMO ESCOLAR</label>
         </p></td>
         <td><p align="center">&nbsp;</p>
           <p>
             <label>
               <input type="checkbox" name="TARDE" value="1" <?php if ($tarde2=="1") {echo "checked";} ?>>
               INCORPORACION TARDIA</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="INTERC" value="1" <?php if ($interc2=="1") {echo "checked";} ?>>
               INTERCULTURALIDAD</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="VAGO" value="1" <?php if ($vago2=="1") {echo "checked";} ?>>
               VAGO/PEREZOSO</label>
           </p>
           <p>
             <label>
               <input type="checkbox" name="DIFICULTADES" value="1" <?php if ($dificultades2=="1") {echo "checked";} ?>>
               PRESENTA DIFICULTADES</label>
           </p>
           <p>OTRO:
             <label>
               <input name="OTRO" type="text" id="OTRO" size="50" value="<?php echo urlencode($otro2);?>" >
             </label>
           </p></td>
       </tr>
     </table>
<div id="contenidos">
     <p align="center"><strong>CONTENIDOS A RECUPERAR</strong></p>
     <table width="100%" border="1">
       <tr>
         <td>CONTENIDO</td>
         <td>&iquest;NECESITA RECUPERACI&Oacute;N? </td>
         <td>M&Eacute;TODO  DE EVALUACI&Oacute;N (entrega de actividades, trabajos propuestos, entrega de contenidos...) </td>
       </tr>
       <tr>
         <td><?php if(isset($conte1)){ echo urlencode($conte1);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><label>
           <select name="rec1" id="rec1">
             <option value="0" <?php if ($rec12==0){ echo "selected";}?>>NO</option>
             <option value="1" <?php if ($rec12==1){ echo "selected";}?>>SI</option>
         </select>
         </label></td>
         <td><label>
           <input name="evc1" type="text" id="evc1" size="100%"value="<?php echo urlencode($evc12);?>">
         </label></td>
       </tr>
       <tr>
         <td><?php if(isset($conte2)){ echo urlencode($conte2);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec2" id="rec2">
           <option value="0"<?php if ($rec22==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec22==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc2" type="text" id="evc2" size="100%"value="<?php echo urlencode($evc22);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte3)){ echo urlencode($conte3);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec3" id="rec3" >
           <option value="0"<?php if ($rec32==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec32==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc3" type="text" id="evc3" size="100%" value="<?php echo urlencode($evc32);?>" ></td>
       </tr>
       <tr>
         <td><?php if(isset($conte4)){ echo urlencode($conte4);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec4" id="rec4">
           <option value="0"<?php if ($rec42==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec42==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc4" type="text" id="evc4" size="100%" value="<?php echo urlencode($evc42);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte5)){ echo urlencode($conte5);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec5" id="rec5">
           <option value="0"<?php if ($rec52==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec52==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc5" type="text" id="evc5" size="100%" value="<?php echo urlencode($evc52);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte6)){ echo urlencode($conte6);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec6" id="rec6">
           <option value="0"<?php if ($rec62==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec62==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc6" type="text" id="evc6" size="100%"value="<?php echo urlencode($evc62);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte7)){ echo urlencode($conte7);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec7" id="rec7">
           <option value="0"<?php if ($rec72==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec72==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc7" type="text" id="evc7" size="100%"value="<?php echo urlencode($evc72);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte8)){ echo urlencode($conte8);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec8" id="rec8">
           <option value="0"<?php if ($rec82==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec82==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc8" type="text" id="evc8" size="100%"value="<?php echo urlencode($evc82);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte9)){ echo urlencode($conte9);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec9" id="rec9">
           <option value="0"<?php if ($rec92==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec92==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc9" type="text" id="evc9" size="100%"value="<?php echo urlencode($evc92);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte10)){ echo urlencode($conte10);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec10" id="rec10">
           <option value="0"<?php if ($rec102==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec102==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc10" type="text" id="evc10" size="100%"value="<?php echo urlencode($evc102);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte11)){ echo urlencode($conte11);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec11" id="rec11">
           <option value="0"<?php if ($rec112==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec112==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc11" type="text" id="evc11" size="100%"value="<?php echo urlencode($evc112);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte12)){ echo urlencode($conte12);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec12" id="rec12">
           <option value="0"<?php if ($rec122==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec122==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc12" type="text" id="evc12" size="100%"value="<?php echo urlencode($evc122);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte13)){ echo urlencode($conte13);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec13" id="rec13">
           <option value="0"<?php if ($rec132==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec132==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc13" type="text" id="evc13" size="100%"value="<?php echo urlencode($evc132);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte14)){ echo urlencode($conte14);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec14" id="rec14">
           <option value="0"<?php if ($rec142==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec142==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc14" type="text" id="evc14" size="100%"value="<?php echo urlencode($evc142);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte15)){ echo urlencode($conte15);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec15" id="rec15">
           <option value="0"<?php if ($rec152==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec152==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc15" type="text" id="evc15" size="100%"value="<?php echo urlencode($evc152);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte16)){ echo urlencode($conte16);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec16" id="rec16">
           <option value="0"<?php if ($rec162==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec162==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc16" type="text" id="evc16" size="100%"value="<?php echo urlencode($evc162);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte17)){ echo urlencode($conte17);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec17" id="rec17">
           <option value="0"<?php if ($rec172==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec172==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc17" type="text" id="evc17" size="100%"value="<?php echo urlencode($evc172);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte18)){ echo urlencode($conte18);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec18" id="rec18">
           <option value="0"<?php if ($rec182==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec182==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc18" type="text" id="evc18" size="100%"value="<?php echo urlencode($evc182);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte19)){ echo urlencode($conte19);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec19" id="rec19">
           <option value="0"<?php if ($rec192==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec192==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc19" type="text" id="evc19" size="100%"value="<?php echo urlencode($evc192);?>"></td>
       </tr>
       <tr>
         <td><?php if(isset($conte20)){ echo urlencode($conte20);} else {echo "Este bloque de contenidos no existe";} ;?></td>
         <td><select name="rec20" id="rec20">
           <option value="0"<?php if ($rec202==0){ echo "selected";}?>>NO</option>
           <option value="1"<?php if ($rec202==1){ echo "selected";}?>>SI</option>
         </select></td>
         <td><input name="evc20" type="text" id="evc20" size="100%"value="<?php echo urlencode($evc202);?>"></td>
       </tr>
     </table></div>
     <p align="center"><strong>ORGANIZACI&Oacute;N DEL PROCESO DE ENSE&Ntilde;ANZA-APRENDIZAJE</strong></p>
     <p align="left">ACTIVIDADES INDIVIDUALES A REALIZAR PARA SUPERAR LA EVALUACI&Oacute;N NEGATIVA:</p>
     <p align="left">
       <label>
       <textarea name="ACTIVIDADES" cols="100%" rows="20" id="ACTIVIDADES"><?php 
if(isset($actividades2)){$actividadesdef=urlencode($actividades2);}
if(!isset($actividades2)){$actividadesdef=urlencode($activ);}
echo $actividadesdef;?></textarea>
       </label>
</p>
     <p align="left">COMPETENCIAS</p>
     <table width="100%" border="1">
       <tr>
         <td>1. Competencia ling&uuml;&iacute;stica  </td>
         <td><label>
           <select name="C1" id="C1">
             <option value="1"<?php if ($comp12==1){ echo "selected";}?>>ALCANZADA</option>
             <option value="0"<?php if ($comp12==0){ echo "selected";}?>>NO ALCANZADA</option>
           </select>
         </label></td>
       </tr>
       <tr>
         <td>2. Competencia matem&aacute;tica </td>
         <td><select name="C2" id="C2">
           <option value="1"<?php if ($comp22==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp22==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>3. Competencia en conocimiento del medio f&iacute;sico </td>
         <td><select name="C3" id="C3">
           <option value="1"<?php if ($comp32==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp32==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>4. Competencia para el tratamiento y la informaci&oacute;n digital </td>
         <td><select name="C4" id="C4">
           <option value="1"<?php if ($comp42==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp42==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>5. Competencia social y ciudadana </td>
         <td><select name="C5" id="C5">
           <option value="1"<?php if ($comp52==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp52==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>6. Competencia cultural y art&iacute;stica </td>
         <td><select name="C6" id="C6">
           <option value="1"<?php if ($comp62==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp62==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>7. Competencia para aprender a aprender </td>
         <td><select name="C7" id="C7">
           <option value="1"<?php if ($comp72==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp72==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>8. Competencia en autonom&iacute;a e iniciativa personal </td>
         <td><select name="C8" id="C8">
           <option value="1"<?php if ($comp82==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp82==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
       <tr>
         <td>9. Competencia emocional </td>
         <td><select name="C9" id="C9">
           <option value="1"<?php if ($comp92==1){ echo "selected";}?>>ALCANZADA</option>
           <option value="0"<?php if ($comp92==0){ echo "selected";}?>>NO ALCANZADA</option>
         </select></td>
       </tr>
     </table>
     <p align="left">CALIFICACI&Oacute;N DEL PLAN DE TRABAJO INDIVIDUALIZADO:</p>
     <p align="left">
       <label>
       <select name="CALIFICAPTI" id="CALIFICAPTI" >
         <option value="1"<?php if ($calificapti2==1){ echo "selected";}?>>1</option>
         <option value="2"<?php if ($calificapti2==2){ echo "selected";}?>>2</option>
         <option value="3"<?php if ($calificapti2==3){ echo "selected";}?>>3</option>
         <option value="4"<?php if ($calificapti2==4){ echo "selected";}?>>4</option>
         <option value="5"<?php if ($calificapti2==5){ echo "selected";}?>>5</option>
         <option value="6"<?php if ($calificapti2==6){ echo "selected";}?>>6</option>
         <option value="7"<?php if ($calificapti2==7){ echo "selected";}?>>7</option>
         <option value="8"<?php if ($calificapti2==8){ echo "selected";}?>>8</option>
         <option value="9"<?php if ($calificapti2==9){ echo "selected";}?>>9</option>
         <option value="10"<?php if ($calificapti2==10){ echo "selected";}?>>10</option>
       </select>
       </label>
</p>
     <p align="left">&nbsp;</p>
     <p align="left">OBSERVACIONES:</p>
     <p align="left">
       <label>
       <textarea name="OBSERVACIONES" cols="100%" rows="3" id="OBSERVACIONES"><?php echo urlencode($observaciones2);?></textarea>
       </label>
</p>
     <p align="center">&nbsp;</p>
     <p><input name="alumno" type="hidden" value="<?php echo $alumno;?>" />
  <input name="nombrealumno" type="hidden" id="nombrealumno" value="<?php echo urlencode($nombrealumno); ?>" />
<p><input name="grupo" type="hidden" value="<?php echo $grupo;?>" />
<p><input name="materia" type="hidden" value="<?php echo $materia;?>" />
<p><input name="curso" type="hidden" value="<?php echo $curso;}?>" />
  <label for="Submit"></label>
  <input type="submit" name="Submit" value="ENVIAR" id="Submit" />
</p>
</fieldset>
</form>
</body>
</html>

