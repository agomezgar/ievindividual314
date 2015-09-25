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
<?php session_start();
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";die;}
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IMPRESION DE FORMULARIOS</title></head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td>
      <div align="center">
        <input type="button" name="Submit2" value="GRABAR DATOS" onClick="window.location.href='grabargrupo.php'"/>
      </div>
    </td>
    <td><div align="center">
      <input type="button" name="Submit22" value="IMPRIMIR INFORME INDIVIDUAL" onClick="window.location.href='imprimeindividualgrupo.php'"/>
    </div></td>
    <td><div align="center">
      <input type="button" name="Submit23" value="IMPRIMIR INFORMES DE UN GRUPO" onClick="window.location.href='grupoasignaturatodo.php'"/>
    </div></td>
  </tr>
</table>
<div align="center">
  <?php
   include("conectarse.php");
   require ("../config.php");
   $link=Conectarse();
  $alumno=$_POST['alumno'];
  $grupo=$_POST['grupo'];

         $result2 = mysql_query("SELECT * FROM $grupo WHERE alumno='$alumno'",$link);

while($row3 = mysql_fetch_array($result2)) {
$nombrealumno=$row3['apellidos'].",".$row3['nombre'];
$fechanacimiento=$row3['fecha'];
$domicilio=$row3['loc'];
$dni=$row3['dni'];
?>
  <img src="../LOGO.jpg" width="50%" height="115" />
</div>
<table width="50%" border="1" align="center">
  <tr>
    <td><div align="center">
      <p><strong>CURSO 2007/08</strong></p>
      <p><strong><?php echo $grupo;?></strong></p>
      <p><strong>INFORME DE LA <?php echo $evaluacion; ?> EVALUACI&Oacute;N</strong></p>
      <p align="left"><strong>ALUMNO/A:<?PHP echo $row3['apellidos'].",".$row3['nombre'];?> &nbsp;</strong></p>
    </div></td>
  </tr>
</table>
<p>
<fieldset><legend><strong>DATOS PERSONALES</strong></legend>
      <p>
        <?php

echo "DNI: ".$row3['dni']."<p>";
echo "Fecha de nacimiento: ".$row3['fecha']."<p>";
echo "domicilio: ".$row3['loc']."<p>";
  }
  mysql_free_result($result2);


  
    $result4=mysql_query("select * from informe1eval where id='$alumno'",$link);
while($row4 = mysql_fetch_array($result4)) {


$m1=$row4['m1'];
$m2=$row4['m2'];
$m3=$row4['m3'];
$m4=$row4['m4'];
$m5=$row4['m5'];
$m6=$row4['m6'];
$m7=$row4['m7'];
$m8=$row4['m8'];
$ob=$row4['ob'];

}
$items=mysql_query("select * from tablaitems where id=1",$link);
while ($item=mysql_fetch_array($items)){
$item1=$item['item1'];
$item2=$item['item2'];
$item3=$item['item3'];
$item4=$item['item4'];
$item5=$item['item5'];
$item6=$item['item6'];
$item7=$item['item7'];
}
?>
      </p>
      <p>&nbsp; </p>
</fieldset>
<form id="form1" name="form1" method="post" action="pdfindividual.php">
<fieldset>
<legend><strong>MEDIDAS DE AMPLIACI&Oacute;N Y REFUERZO</strong></legend>

<?php 

if ($m1==1) {echo $item1."</p>";}
if ($m2==1) {echo $item2."</p>";}
if ($m3==1) {echo $item3."</p>";}
if ($m4==1) {echo $item4."</p>";}
if ($m5==1) {echo $item5."</p>";}
if ($m6==1) {echo $item6."</p>";}
if ($m7==1) {echo $item7."</p>";}
?>

<fieldset><legend>OTRAS MEDIDAS</legend>
<?php echo $m8;?></fieldset>
</fieldset>
<fieldset>
<legend><strong>INFORMACI&Oacute;N COMPLEMENTARIA SOBRE LOS OBJETIVOS, CONTENIDOS Y CRITERIOS DE EVALUACI&Oacute;N DESARROLLADOS EN EL TRIMESTRE</strong></legend>
<fieldset><legend>OBSERVACIONES</legend>
<p>&nbsp;</p>
<?php echo $ob; ?>
</fieldset></p>
<p>.
  <label for="Submit"></label>
  <input name="grupo" type="hidden" value="<?php echo $grupo; ?>" />
  <input name="nombrealumno" type="hidden" value="<?php echo $nombrealumno; ?>" />
  <input name="dni" type="hidden" value="<?php echo $dni; ?>" />
   <input name="domicilio" type="hidden" value="<?php echo $domicilio; ?>" />
  <input name="fechanacimiento" type="hidden" value="<?php echo $fechanacimiento; ?>" />
  <input name="dni" type="hidden" value="<?php echo $dni; ?>" />
   <input name="m1" type="hidden" value="<?php echo $m1; ?>" />
    <input name="m2" type="hidden" value="<?php echo $m2; ?>" />
	 <input name="m3" type="hidden" value="<?php echo $m3; ?>" />
	  <input name="m4" type="hidden" value="<?php echo $m4; ?>" />
	   <input name="m5" type="hidden" value="<?php echo $m5; ?>" />
	    <input name="m6" type="hidden" value="<?php echo $m6; ?>" />
		 <input name="m7" type="hidden" value="<?php echo $m7; ?>" />
		  <input name="m8" type="hidden" value="<?php echo $m8; ?>" />
		  <input name="ob" type="hidden" value="<?php echo $ob; ?>" />
  <label for="label"></label>
  <input type="submit" name="Submit2" value="PDF" id="label" />
</fieldset>
</form>
</body>
</html>
