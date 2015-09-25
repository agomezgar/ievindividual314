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
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engaÃƒÂ±ar";die;}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INFORME DEL ALUMNO</title>
<style type="text/css">
<!--
.Estilo1 {font-size: 9px}
-->
</style>
</head>
<?php
   include("conectarse.php");
   include("../config.php");
   $link=Conectarse();
  $alumno=$_POST['alumno'];
  $grupo=$_POST['grupo'];

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
<body>
<table width="100%" border="0" align="center">
  <tr>
    <td>
      <div align="center">
        <input type="button" name="Submit2" value="GRABAR DATOS" onClick="window.location.href='grabargrupo.php'"/>
      </div>
    </td>
    <td><div align="center">
    </div></td>
    <td><div align="center">
      <input type="button" name="Submit23" value="IMPRIMIR INFORMES DE UN GRUPO" onClick="window.location.href='grupoasignaturatodo.php'"/>
    </div></td>
  </tr>
</table>
<p><img src="../LOGO.jpg" width="100%" height="115" /></p>
<table width="50%" border="1" align="center">
  <tr>
    <td><div align="center">
      <p><strong>CURSO <?echo $curso;?></strong></p>
      <p><strong>GRUPO: <?php echo $grupo;?></strong></p>
      <p><strong>INFORME DE EVALUACI&Oacute;N INDIVIDUALIZADO </strong></p>
      <p align="left"><strong>ALUMNO/A:<?PHP echo $row3['apellidos'].",".$row3['nombre'];?> &nbsp;</strong></p>
    </div></td>
  </tr>
</table>
<p>
<?php $result3=mysql_query("select * from informeindividual where id=$alumno",$link);
while($comprueba= mysql_fetch_array($result3)) {
$d=$comprueba['id'];}
if (!isset($d)){echo "En este momento no constan medidas de ampliacion y/o refuerzo"; $destino="grabarinforme.php";}
if (isset($d)){echo "Ya se ha rellenado un informe sobre la evaluacion del alumno; rellenar este informe supone introducir cambios ";$destino="actualizarinforme.php";}


mysql_free_result($result3);
?>
<p>
<fieldset><legend><strong>DATOS PERSONALES</strong></legend>
      <table width="100%" border="1">
        <tr>
          <td colspan="7"><div align="center"><strong>DATOS PERSONALES DEL ALUMNO </strong></div></td>
        </tr>
        <tr>
          <td width="26%"><strong>CENTRO</strong></td>
          <td colspan="2"><strong>LOCALIDAD</strong></td>
          <td width="22%"><strong>CURSO</strong></td>
          <td width="11%" colspan="3"><strong>FECHA ACTUAL </strong></td>
        </tr>
        <tr>
          <td>IES EDUARDO VALENCIA </td>
          <td colspan="2">CALZADA DE CALATRAVA (CIUDAD REAL) </td>
      
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
          <td><?php echo $nombre; ?>&nbsp;</td>
          <td colspan="6"><?php echo $apellidos; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>FECHA DE NACIMIENTO </strong></td>
          <td width="41%" ><strong>PROFESOR/-A TUTOR/-A </strong></td>
          <td colspan="2" ><strong>NIVEL-GRUPO</strong></td>
        </tr>
        <tr>
          <td><?php echo $fecha; ?>&nbsp;</td>
          <td ><input name="profesortutor" type="text" id="profesortutor" size="50"></td>
          <td width="41%" ><?php echo $grupo; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>DIRECCI&Oacute;N</strong></td>
          <td ><strong>TEL&Eacute;FONO</strong></td>
          <td ><strong>PADRES/TUTORES LEGALES </strong></td>
        </tr>
        <tr>
          <td rowspan="2"><?php echo $dom.", ".$loc.", ".$prov; ?>&nbsp;</td>
          <td ><?php echo $tf; ?>&nbsp;</td>
          <td ><?php echo $apelpadre.", ".$nombrepadre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td ><?php echo $tf2; ?>&nbsp;</td>
          <td ><?php echo $apelmadre.", ".$nombremadre; ?>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp; </p>
</fieldset>
<form id="form1" name="form1" method="post" action="<?php echo $destino; ?>">
<fieldset>
<legend><strong>DATOS DE LA HISTORIA PERSONAL/ESCOLAR </strong></legend>
     <?php
	    $result3 = mysql_query("SELECT * FROM informeindividual WHERE id='$alumno'",$link);

while($row4 = mysql_fetch_array($result3)) {
$curso=$row4['curso'];
$curso1rep=$row4['curso1rep'];
$anyo1rep=$row4['anyo1rep'];
$curso2rep=$row4['curso2rep'];
$anyo2rep=$row4['anyo2rep'];
$neg34=$row4['neg34'];
$neg34areas=$row4['neg34areas'];
$acneaesino=$row4['acneaesino'];
$acneaefecha=$row4['acneaefecha'];
$acneaeareasasociadas=$row4['acneaeareasasociadas'];
$absentismosino=$row4['absentismosino'];
$causasabsentismo=$row4['causasabsentismo'];
$diversificacionsino=$row4['diversificacionsino'];
$observacioneshistorial=$row4['observacioneshistorial'];


$calificacionlengua=$row4['calificacionlengua'];
$ptilengua=$row4['ptilengua'];
$ref1lengua=$row4['ref1lengua'];
$ref2lengua=$row4['ref2lengua'];
$ref3lengua=$row4['ref3lengua'];
$ref4lengua=$row4['ref4lengua'];
$ref5lengua=$row4['ref5lengua'];
$ref6lengua=$row4['ref6lengua'];
$ncclengua=$row4['ncclengua'];


$calificacioningles=$row4['calificacioningles'];
$ptiingles=$row4['ptiingles'];
$ref1ingles=$row4['ref1ingles'];
$ref2ingles=$row4['ref2ingles'];
$ref3ingles=$row4['ref3ingles'];
$ref4ingles=$row4['ref4ingles'];
$ref5ingles=$row4['ref5ingles'];
$ref6ingles=$row4['ref6ingles'];
$nccingles=$row4['nccingles'];



$calificacionfrances=$row4['calificacionfrances'];
$ptifrances=$row4['ptifrances'];
$ref1frances=$row4['ref1frances'];
$ref2frances=$row4['ref2frances'];
$ref3frances=$row4['ref3frances'];
$ref4frances=$row4['ref4frances'];
$ref5frances=$row4['ref5frances'];
$ref6frances=$row4['ref6frances'];
$nccfrances=$row4['nccfrances'];



$calificacionmatematicas=$row4['calificacionmatematicas'];
$ptimatematicas=$row4['ptimatematicas'];
$ref1matematicas=$row4['ref1matematicas'];
$ref2matematicas=$row4['ref2matematicas'];
$ref3matematicas=$row4['ref3matematicas'];
$ref4matematicas=$row4['ref4matematicas'];
$ref5matematicas=$row4['ref5matematicas'];
$ref6matematicas=$row4['ref6matematicas'];
$nccmatematicas=$row4['nccmatematicas'];



$calificacionsociales=$row4['calificacionsociales'];
$ptisociales=$row4['ptisociales'];
$ref1sociales=$row4['ref1sociales'];
$ref2sociales=$row4['ref2sociales'];
$ref3sociales=$row4['ref3sociales'];
$ref4sociales=$row4['ref4sociales'];
$ref5sociales=$row4['ref5sociales'];
$ref6sociales=$row4['ref6sociales'];
$nccsociales=$row4['nccsociales'];



$calificacionbiologia=$row4['calificacionbiologia'];
$ptibiologia=$row4['ptibiologia'];
$ref1biologia=$row4['ref1biologia'];
$ref2biologia=$row4['ref2biologia'];
$ref3biologia=$row4['ref3biologia'];
$ref4biologia=$row4['ref4biologia'];
$ref5biologia=$row4['ref5biologia'];
$ref6biologia=$row4['ref6biologia'];
$nccbiologia=$row4['nccbiologia'];



$calificacionfisica=$row4['calificacionfisica'];
$ptifisica=$row4['ptifisica'];
$ref1fisica=$row4['ref1fisica'];
$ref2fisica=$row4['ref2fisica'];
$ref3fisica=$row4['ref3fisica'];
$ref4fisica=$row4['ref4fisica'];
$ref5fisica=$row4['ref5fisica'];
$ref6fisica=$row4['ref6fisica'];
$nccfisica=$row4['nccfisica'];



$calificaciongimnasia=$row4['calificaciongimnasia'];
$ptigimnasia=$row4['ptigimnasia'];
$ref1gimnasia=$row4['ref1gimnasia'];
$ref2gimnasia=$row4['ref2gimnasia'];
$ref3gimnasia=$row4['ref3gimnasia'];
$ref4gimnasia=$row4['ref4gimnasia'];
$ref5gimnasia=$row4['ref5gimnasia'];
$ref6gimnasia=$row4['ref6gimnasia'];
$nccgimnasia=$row4['nccgimnasia'];



$calificacionplastica=$row4['calificacionplastica'];
$ptiplastica=$row4['ptiplastica'];
$ref1plastica=$row4['ref1plastica'];
$ref2plastica=$row4['ref2plastica'];
$ref3plastica=$row4['ref3plastica'];
$ref4plastica=$row4['ref4plastica'];
$ref5plastica=$row4['ref5plastica'];
$ref6plastica=$row4['ref6plastica'];
$nccplastica=$row4['nccplastica'];



$calificaciongriego=$row4['calificaciongriego'];
$ptigriego=$row4['ptigriego'];
$ref1griego=$row4['ref1griego'];
$ref2griego=$row4['ref2griego'];
$ref3griego=$row4['ref3griego'];
$ref4griego=$row4['ref4griego'];
$ref5griego=$row4['ref5griego'];
$ref6griego=$row4['ref6griego'];
$nccgriego=$row4['nccgriego'];



$calificacionmusica=$row4['calificacionmusica'];
$ptimusica=$row4['ptimusica'];
$ref1musica=$row4['ref1musica'];
$ref2musica=$row4['ref2musica'];
$ref3musica=$row4['ref3musica'];
$ref4musica=$row4['ref4musica'];
$ref5musica=$row4['ref5musica'];
$ref6musica=$row4['ref6musica'];
$nccmusica=$row4['nccmusica'];



$calificaciontecnologia=$row4['calificaciontecnologia'];
$ptitecnologia=$row4['ptitecnologia'];
$ref1tecnologia=$row4['ref1tecnologia'];
$ref2tecnologia=$row4['ref2tecnologia'];
$ref3tecnologia=$row4['ref3tecnologia'];
$ref4tecnologia=$row4['ref4tecnologia'];
$ref5tecnologia=$row4['ref5tecnologia'];
$ref6tecnologia=$row4['ref6tecnologia'];
$ncctecnologia=$row4['ncctecnologia'];



$calificacionreligion=$row4['calificacionreligion'];
$ptireligion=$row4['ptireligion'];
$ref1religion=$row4['ref1religion'];
$ref2religion=$row4['ref2religion'];
$ref3religion=$row4['ref3religion'];
$ref4religion=$row4['ref4religion'];
$ref5religion=$row4['ref5religion'];
$ref6religion=$row4['ref6religion'];
$nccreligion=$row4['nccreligion'];

$calificacionetica=$row4['calificacionetica'];
$ptietica=$row4['ptietica'];
$ref1etica=$row4['ref1etica'];
$ref2etica=$row4['ref2etica'];
$ref3etica=$row4['ref3etica'];
$ref4etica=$row4['ref4etica'];
$ref5etica=$row4['ref5etica'];
$ref6etica=$row4['ref6etica'];
$nccetica=$row4['nccetica'];

$calificacionciudadania=$row4['calificacionciudadania'];
$pticiudadania=$row4['pticiudadania'];
$ref1ciudadania=$row4['ref1ciudadania'];
$ref2ciudadania=$row4['ref2ciudadania'];
$ref3ciudadania=$row4['ref3ciudadania'];
$ref4ciudadania=$row4['ref4ciudadania'];
$ref5ciudadania=$row4['ref5ciudadania'];
$ref6ciudadania=$row4['ref6ciudadania'];
$nccciudadania=$row4['nccciudadania'];

$obsrend1=$row4['obsrend1'];
$obsrend2=$row4['obsrend2'];
$obsrend3=$row4['obsrend3'];
$obsrend4=$row4['obsrend4'];
$obsrend5=$row4['obsrend5'];
$obsrend6=$row4['obsrend6'];
$obsrend7=$row4['obsrend7'];
$obscomp1=$row4['obscomp1'];
$obscomp2=$row4['obscomp2'];
$obscomp3=$row4['obscomp3'];
$obscomp4=$row4['obscomp4'];
$obscomp5=$row4['obscomp5'];
$obscomp6=$row4['obscomp6'];
$obscomp7=$row4['obscomp7'];
$obscomp8=$row4['obscomp8'];

}
?>
</fieldset>
<fieldset>
  Repiti&oacute; por primera vez  el curso:
  <select name="curso1rep">
    <option value="0">NO HA REPETIDO NINGUN CURSO</option>
    <option value="PRIMERO" <?php if ($curso1rep=="PRIMERO"){echo "selected";} ?>>PRIMERO</option>
    <option value="SEGUNDO"  <?php if ($curso1rep=="SEGUNDO"){echo "selected";} ?>>SEGUNDO</option>
    <option value="TERCERO"  <?php if ($curso1rep=="TERCERO"){echo "selected";} ?>>TERCERO</option>
    <option value="CUARTO"  <?php if ($curso1rep=="CUARTO"){echo "selected";} ?>>CUARTO</option>
  </select>
  en el a&ntilde;o:
  <input name="anyo1rep" type="text" id="anyo1rep" value="<?php echo $anyo1rep; ?>">
  </fieldset>
<fieldset>
  Repiti&oacute; por segunda vez el curso:  
  <select name="curso2rep">
    <option value="0">NO HA REPETIDO UN SEGUNDO CURSO</option>
    <option value="PRIMERO" <?php if ($curso2rep=="PRIMERO"){echo "selected";} ?>>PRIMERO</option>
    <option value="SEGUNDO"  <?php if ($curso2rep=="SEGUNDO"){echo "selected";} ?>>SEGUNDO</option>
    <option value="TERCERO"  <?php if ($curso2rep=="TERCERO"){echo "selected";} ?>>TERCERO</option>
    <option value="CUARTO"  <?php if ($curso2rep=="CUARTO"){echo "selected";} ?>>CUARTO</option>
  </select>
  en el a&ntilde;o:
  <input name="anyo2rep" type="text" id="anyo2rep" value="<?php echo $anyo2rep; ?>">
  </fieldset>
<fieldset>
<p>
   El alumno tiene las siguientes &aacute;reas pendientes (especificar curso):
  <input name="neg34areas" type="text" id="neg34areas" size="25" value="<?php echo $neg34areas; ?>"> 
<p>
    El alumno presenta Necesidades Espec&iacute;ficas de Apoyo Educativo: 
    <select name="acneaesino" id="acneaesino">
      <option value=" "> </option>
      <option value="si"<?php if($acneaesino==si){echo"selected";} ?>>S&Iacute;</option>
      <option value="no"<?php if($acneaesino==no){echo"selected";} ?>>NO</option>
    </select>
<p>

<p>
  Absentismo.
  <select name="absentismosino" id="absentismosino">
    <option value=" "> </option>
    <option value="si" <?php if($absentismosino=="si"){echo "selected";}?>>S&Iacute;</option>
    <option value="no"<?php if($absentismosino=="no"){echo "selected";}?>>NO</option>
  </select> 
  Especificar frecuencia y causas: </p>
<p>
    <textarea name="causasabsentismo" cols="100%" rows="4" id="causasabsentismo"><?php echo $causasabsentismo; ?></textarea>
<p>
  Diversificaci&oacute;n curricular   
  <select name="diversificacionsino" id="diversificacionsino">
    <option value=" "> </option>
    <option value="si" <?php if($diversificacionsino=="si"){echo "selected";}?>>S&Iacute;</option>
    <option value="no"<?php if($diversificacionsino=="no"){echo "selected";}?>>NO</option>
  </select> </p>
<p>
 <p><strong>OTRAS OBSERVACIONES DE INTER&Eacute;S</strong></p>
 <p>
    <textarea name="observacioneshistorial" cols="100%" rows="3" id="observacioneshistorial"><?php echo $observacioneshistorial; ?></textarea>
  </p>
 
 </p>
</fieldset>
<fieldset><legend>EVALUACIÓN POR MATERIAS</legend>
<table width="100%"  border="1" cellspacing="1">
  <tr>
    <td>MATERIA</td>
    <td>CALIFICACI&Oacute;N</td>
    <td>PTI</td>
    <td colspan="6"><h1 class="Estilo1">REFUERZO:</h1>
      <h1 class="Estilo1">1. Refuerzo ordinario dentro del aula</h1>
      <h1 class="Estilo1">2. Apoyo ordinario fuera del aula</h1>
      <h1 class="Estilo1">3. AL</h1>
      <h1 class="Estilo1">4. PT</h1>
      <h1 class="Estilo1">5. Inmersi&oacute;n ling&uuml;&iacute;stica</h1>
      <h1 class="Estilo1">6. Otros  </h1></td>
    <td>NCC (Nivel de Competencia Curricular) </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>CURSO</td>
  </tr>
  <tr>
    <td>LENGUA CASTELLANA Y LITERATURA </td>
    <td><select name="calificacionlengua" id="calificacionlengua">
      <option value="1"<?php if($calificacionlengua==1){echo "selected";}?>>1</option>
      <option value="2"<?php if($calificacionlengua==2){echo "selected";}?>>2</option>
      <option value="3"<?php if($calificacionlengua==3){echo "selected";}?>>3</option>
      <option value="4"<?php if($calificacionlengua==4){echo "selected";}?>>4</option>
      <option value="5"<?php if($calificacionlengua==5){echo "selected";}?>>5</option>
      <option value="6"<?php if($calificacionlengua==6){echo "selected";}?>>6</option>
      <option value="7"<?php if($calificacionlengua==7){echo "selected";}?>>7</option>
      <option value="8"<?php if($calificacionlengua==8){echo "selected";}?>>8</option>
      <option value="9"<?php if($calificacionlengua==9){echo "selected";}?>>9</option>
      <option value="10"<?php if($calificacionlengua==10){echo "selected";}?>>10</option>
 <option value="NO"<?php if($calificacionlengua==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>      <select name="ptilengua" id="ptilengua">
        <option value=" "> </option>
        <option value="si"<?php if($ptilengua=="si"){echo "selected";}else{$ptilengua="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptilengua=="no"){echo "selected";}?>>NO</option>
      </select></td>
    <td><input name="ref1lengua" type="checkbox" id="ref1lengua" <?php if ($ref1lengua=="on") {echo "checked";} ?>></td>
    <td><input name="ref2lengua" type="checkbox" id="ref2lengua" <?php if ($ref2lengua=="on") {echo "checked";} ?>></td>
    <td><input name="ref3lengua" type="checkbox" id="ref3lengua"  <?php if ($ref3lengua=="on") {echo "checked";} ?>></td>
    <td><input name="ref4lengua" type="checkbox" id="ref4lengua"  <?php if ($ref4lengua=="on") {echo "checked";} ?>></td>
    <td><input name="ref5lengua" type="checkbox" id="ref5lengua"  <?php if ($ref5lengua=="on") {echo "checked";} ?>></td>
    <td><input name="ref6lengua" type="checkbox" id="ref6lengua" <?php if ($ref6lengua=="on"){echo "checked";} ?>></td>
    <td><select name="ncclengua">
      <option value=" " selected> </option>
      <option value=1 <?php if($ncclengua==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
      <option value=2 <?php if($ncclengua==2){echo "selected";}?>>SEGUNDO</option>
      <option value=3 <?php if($ncclengua==3){echo "selected";}?>>TERCERO</option>
      <option value=4 <?php if(($ncclengua!=3)&&($ncclengua!=2)&&($ncclengua!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>LENGUA EXTRANJERA (INGL&Eacute;S) </td>
    <td><select name="calificacioningles" id="calificacioningles">
        <option value="1"<?php if($calificacioningles==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacioningles==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacioningles==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacioningles==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacioningles==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacioningles==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacioningles==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacioningles==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacioningles==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacioningles==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacioningles==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptiingles" id="ptiingles">
        <option value=" "> </option>
        <option value="si"<?php if($ptiingles=="si"){echo "selected";}else{$ptiingles="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptiingles=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1ingles" type="checkbox" id="ref1ingles" <?php if ($ref1ingles=="on") {echo "checked";} ?>></td>
    <td><input name="ref2ingles" type="checkbox" id="ref2ingles" <?php if ($ref2ingles=="on") {echo "checked";} ?>></td>
    <td><input name="ref3ingles" type="checkbox" id="ref3ingles"  <?php if ($ref3ingles=="on") {echo "checked";} ?>></td>
    <td><input name="ref4ingles" type="checkbox" id="ref4ingles"  <?php if ($ref4ingles=="on") {echo "checked";} ?>></td>
    <td><input name="ref5ingles" type="checkbox" id="ref5ingles"  <?php if ($ref5ingles=="on") {echo "checked";} ?>></td>
    <td><input name="ref6ingles" type="checkbox" id="ref6ingles" <?php if ($ref6ingles=="on"){echo "checked";} ?>></td>
    <td><select name="nccingles">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccingles==1){ echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccingles==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccingles==3){echo "selected";}?>>TERCERO</option>
        <option  value=4  <?php if(($nccingles!=3)&&($nccingles!=2)&&($nccingles!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>2&ordf; LENGUA EXTRANJERA (FRANC&Eacute;S) </td>
    <td><select name="calificacionfrances" id="calificacionfrances">
        <option value="1"<?php if($calificacionfrances==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionfrances==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionfrances==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionfrances==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionfrances==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionfrances==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionfrances==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionfrances==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionfrances==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionfrances==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionfrances==NO){echo "selected";}?>>NO</option>    
</select></td>
    <td>
      <select name="ptifrances" id="ptifrances">
        <option value=" "> </option>
        <option value="si"<?php if($ptifrances=="si"){echo "selected";}else{$ptifrances="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptifrances=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1frances" type="checkbox" id="ref1frances" <?php if ($ref1frances=="on") {echo "checked";} ?>></td>
    <td><input name="ref2frances" type="checkbox" id="ref2frances" <?php if ($ref2frances=="on") {echo "checked";} ?>></td>
    <td><input name="ref3frances" type="checkbox" id="ref3frances"  <?php if ($ref3frances=="on") {echo "checked";} ?>></td>
    <td><input name="ref4frances" type="checkbox" id="ref4frances"  <?php if ($ref4frances=="on") {echo "checked";} ?>></td>
    <td><input name="ref5frances" type="checkbox" id="ref5frances"  <?php if ($ref5frances=="on") {echo "checked";} ?>></td>
    <td><input name="ref6frances" type="checkbox" id="ref6frances" <?php if ($ref6frances=="on"){echo "checked";} ?>></td>
    <td><select name="nccfrances">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccfrances==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccfrances==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccfrances==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccfrances!=3)&&($nccfrances!=2)&&($nccfrances!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>MATEM&Aacute;TICAS</td>
    <td><select name="calificacionmatematicas" id="calificacionmatematicas">
        <option value="1"<?php if($calificacionmatematicas==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionmatematicas==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionmatematicas==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionmatematicas==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionmatematicas==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionmatematicas==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionmatematicas==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionmatematicas==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionmatematicas==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionmatematicas==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionmatematicas==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptimatematicas" id="ptimatematicas">
        <option value=" "> </option>
        <option value="si"<?php if($ptimatematicas=="si"){echo "selected";}else{$ptimatematicas="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptimatematicas=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1matematicas" type="checkbox" id="ref1matematicas" <?php if ($ref1matematicas=="on") {echo "checked";} ?>></td>
    <td><input name="ref2matematicas" type="checkbox" id="ref2matematicas" <?php if ($ref2matematicas=="on") {echo "checked";} ?>></td>
    <td><input name="ref3matematicas" type="checkbox" id="ref3matematicas"  <?php if ($ref3matematicas=="on") {echo "checked";} ?>></td>
    <td><input name="ref4matematicas" type="checkbox" id="ref4matematicas"  <?php if ($ref4matematicas=="on") {echo "checked";} ?>></td>
    <td><input name="ref5matematicas" type="checkbox" id="ref5matematicas"  <?php if ($ref5matematicas=="on") {echo "checked";} ?>></td>
    <td><input name="ref6matematicas" type="checkbox" id="ref6matematicas" <?php if ($ref6matematicas=="on"){echo "checked";} ?>></td>
    <td><select name="nccmatematicas">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccmatematicas==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccmatematicas==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccmatematicas==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccmatematicas!=3)&&($nccmatematicas!=2)&&($nccmatematicas!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>CIENCIAS SOCIALES, GEOGRAF&Iacute;A, HISTORIA </td>
    <td><select name="calificacionsociales" id="calificacionsociales">
        <option value="1"<?php if($calificacionsociales==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionsociales==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionsociales==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionsociales==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionsociales==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionsociales==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionsociales==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionsociales==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionsociales==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionsociales==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionsociales==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptisociales" id="ptisociales">
        <option value=" "> </option>
        <option value="si"<?php if($ptisociales=="si"){echo "selected";}else{$ptisociales="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptisociales=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1sociales" type="checkbox" id="ref1sociales" <?php if ($ref1sociales=="on") {echo "checked";} ?>></td>
    <td><input name="ref2sociales" type="checkbox" id="ref2sociales" <?php if ($ref2sociales=="on") {echo "checked";} ?>></td>
    <td><input name="ref3sociales" type="checkbox" id="ref3sociales"  <?php if ($ref3sociales=="on") {echo "checked";} ?>></td>
    <td><input name="ref4sociales" type="checkbox" id="ref4sociales"  <?php if ($ref4sociales=="on") {echo "checked";} ?>></td>
    <td><input name="ref5sociales" type="checkbox" id="ref5sociales"  <?php if ($ref5sociales=="on") {echo "checked";} ?>></td>
    <td><input name="ref6sociales" type="checkbox" id="ref6sociales" <?php if ($ref6sociales=="on"){echo "checked";} ?>></td>
    <td><select name="nccsociales">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccsociales==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccsociales==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccsociales==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccsociales!=3)&&($nccsociales!=2)&&($nccsociales!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>BIOLOG&Iacute;A</td>
    <td><select name="calificacionbiologia" id="calificacionbiologia">
        <option value="1"<?php if($calificacionbiologia==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionbiologia==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionbiologia==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionbiologia==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionbiologia==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionbiologia==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionbiologia==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionbiologia==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionbiologia==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionbiologia==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionbiologia==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptibiologia" id="ptibiologia">
        <option value=" "> </option>
        <option value="si"<?php if($ptibiologia=="si"){echo "selected";}else{$ptibiologia="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptibiologia=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1biologia" type="checkbox" id="ref1biologia" <?php if ($ref1biologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref2biologia" type="checkbox" id="ref2biologia" <?php if ($ref2biologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref3biologia" type="checkbox" id="ref3biologia"  <?php if ($ref3biologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref4biologia" type="checkbox" id="ref4biologia"  <?php if ($ref4biologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref5biologia" type="checkbox" id="ref5biologia"  <?php if ($ref5biologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref6biologia" type="checkbox" id="ref6biologia" <?php if ($ref6biologia=="on"){echo "checked";} ?>></td>
    <td><select name="nccbiologia">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccbiologia==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccbiologia==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccbiologia==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccbiologia!=3)&&($nccbiologia!=2)&&($nccbiologia!=1)){echo "selected";}?>>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>F&Iacute;SICA Y QU&Iacute;MICA </td>
    <td><select name="calificacionfisica" id="calificacionfisica">
        <option value="1"<?php if($calificacionfisica==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionfisica==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionfisica==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionfisica==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionfisica==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionfisica==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionfisica==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionfisica==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionfisica==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionfisica==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionfisica==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptifisica" id="ptifisica">
        <option value=" "> </option>
        <option value="si"<?php if($ptifisica=="si"){echo "selected";}else{$ptifisica="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptifisica=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1fisica" type="checkbox" id="ref1fisica" <?php if ($ref1fisica=="on") {echo "checked";} ?>></td>
    <td><input name="ref2fisica" type="checkbox" id="ref2fisica" <?php if ($ref2fisica=="on") {echo "checked";} ?>></td>
    <td><input name="ref3fisica" type="checkbox" id="ref3fisica"  <?php if ($ref3fisica=="on") {echo "checked";} ?>></td>
    <td><input name="ref4fisica" type="checkbox" id="ref4fisica"  <?php if ($ref4fisica=="on") {echo "checked";} ?>></td>
    <td><input name="ref5fisica" type="checkbox" id="ref5fisica"  <?php if ($ref5fisica=="on") {echo "checked";} ?>></td>
    <td><input name="ref6fisica" type="checkbox" id="ref6fisica" <?php if ($ref6fisica=="on"){echo "checked";} ?>></td>
    <td><select name="nccfisica">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccfisica==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccfisica==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccfisica==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccfisica!=3)&&($nccfisica!=2)&&($nccfisica!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>EDUCACI&Oacute;N F&Iacute;SICA </td>
    <td><select name="calificaciongimnasia" id="calificaciongimnasia">
        <option value="1"<?php if($calificaciongimnasia==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificaciongimnasia==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificaciongimnasia==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificaciongimnasia==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificaciongimnasia==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificaciongimnasia==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificaciongimnasia==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificaciongimnasia==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificaciongimnasia==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificaciongimnasia==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificaciongimnasia==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptigimnasia" id="ptigimnasia">
        <option value=" "> </option>
        <option value="si" <?php if($ptigimnasia=="si"){echo "selected";}else{$ptigimnasia="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptigimnasia=="no"){echo "selected";}?>>NO</option>
          </select></td>
    <td><input name="ref1gimnasia" type="checkbox" id="ref1gimnasia" <?php if ($ref1gimnasia=="on") {echo "checked";} ?>></td>
    <td><input name="ref2gimnasia" type="checkbox" id="ref2gimnasia" <?php if ($ref2gimnasia=="on") {echo "checked";} ?>></td>
    <td><input name="ref3gimnasia" type="checkbox" id="ref3gimnasia"  <?php if ($ref3gimnasia=="on") {echo "checked";} ?>></td>
    <td><input name="ref4gimnasia" type="checkbox" id="ref4gimnasia"  <?php if ($ref4gimnasia=="on") {echo "checked";} ?>></td>
    <td><input name="ref5gimnasia" type="checkbox" id="ref5gimnasia"  <?php if ($ref5gimnasia=="on") {echo "checked";} ?>></td>
    <td><input name="ref6gimnasia" type="checkbox" id="ref6gimnasia"  <?php if ($ref6gimnasia=="on") {echo "checked";} ?>></td>
    <td><select name="nccgimnasia">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccgimnasia==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccgimnasia==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccgimnasia==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccgimnasia!=3)&&($nccgimnasia!=2)&&($nccgimnasia!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>EDUCACI&Oacute;N PL&Aacute;STICA Y VISUAL </td>
    <td><select name="calificacionplastica" id="calificacionplastica">
        <option value="1"<?php if($calificacionplastica==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionplastica==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionplastica==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionplastica==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionplastica==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionplastica==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionplastica==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionplastica==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionplastica==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionplastica==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionplastica==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptiplastica" id="ptiplastica">
        <option value=" "> </option>
        <option value="si"<?php if($ptiplastica=="si"){echo "selected";}else{$ptiplastica="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptiplastica=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1plastica" type="checkbox" id="ref1plastica" <?php if ($ref1plastica=="on") {echo "checked";} ?>></td>
    <td><input name="ref2plastica" type="checkbox" id="ref2plastica" <?php if ($ref2plastica=="on") {echo "checked";} ?>></td>
    <td><input name="ref3plastica" type="checkbox" id="ref3plastica"  <?php if ($ref3plastica=="on") {echo "checked";} ?>></td>
    <td><input name="ref4plastica" type="checkbox" id="ref4plastica"  <?php if ($ref4plastica=="on") {echo "checked";} ?>></td>
    <td><input name="ref5plastica" type="checkbox" id="ref5plastica"  <?php if ($ref5plastica=="on") {echo "checked";} ?>></td>
    <td><input name="ref6plastica" type="checkbox" id="ref6plastica" <?php if ($ref6plastica=="on"){echo "checked";} ?>></td>
    <td><select name="nccplastica">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccplastica==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccplastica==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccplastica==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccplastica!=3)&&($nccplastica!=2)&&($nccplastica!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>CULTURA CL&Aacute;SICA </td>
    <td><select name="calificaciongriego" id="calificaciongriego">
        <option value="1"<?php if($calificaciongriego==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificaciongriego==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificaciongriego==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificaciongriego==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificaciongriego==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificaciongriego==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificaciongriego==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificaciongriego==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificaciongriego==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificaciongriego==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificaciongriego==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptigriego" id="ptigriego">
        <option value=" "> </option>
        <option value="si"<?php if($ptigriego=="si"){echo "selected";}else{$ptigriego="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptigriego=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1griego" type="checkbox" id="ref1griego" <?php if ($ref1griego=="on") {echo "checked";} ?>></td>
    <td><input name="ref2griego" type="checkbox" id="ref2griego" <?php if ($ref2griego=="on") {echo "checked";} ?>></td>
    <td><input name="ref3griego" type="checkbox" id="ref3griego"  <?php if ($ref3griego=="on") {echo "checked";} ?>></td>
    <td><input name="ref4griego" type="checkbox" id="ref4griego"  <?php if ($ref4griego=="on") {echo "checked";} ?>></td>
    <td><input name="ref5griego" type="checkbox" id="ref5griego"  <?php if ($ref5griego=="on") {echo "checked";} ?>></td>
    <td><input name="ref6griego" type="checkbox" id="ref6griego" <?php if ($ref6griego=="on"){echo "checked";} ?>></td>
    <td><select name="nccgriego">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccgriego==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccgriego==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccgriego==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccgriego!=3)&&($nccgriego!=2)&&($nccgriego!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>M&Uacute;SICA</td>
    <td><select name="calificacionmusica" id="calificacionmusica">
        <option value="1"<?php if($calificacionmusica==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionmusica==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionmusica==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionmusica==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionmusica==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionmusica==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionmusica==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionmusica==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionmusica==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionmusica==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionmusica==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptimusica" id="ptimusica">
        <option value=" "> </option>
        <option value="si"<?php if($ptimusica=="si"){echo "selected";}else{$ptimusica="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptimusica=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1musica" type="checkbox" id="ref1musica" <?php if ($ref1musica=="on") {echo "checked";} ?>></td>
    <td><input name="ref2musica" type="checkbox" id="ref2musica" <?php if ($ref2musica=="on") {echo "checked";} ?>></td>
    <td><input name="ref3musica" type="checkbox" id="ref3musica"  <?php if ($ref3musica=="on") {echo "checked";} ?>></td>
    <td><input name="ref4musica" type="checkbox" id="ref4musica"  <?php if ($ref4musica=="on") {echo "checked";} ?>></td>
    <td><input name="ref5musica" type="checkbox" id="ref5musica"  <?php if ($ref5musica=="on") {echo "checked";} ?>></td>
    <td><input name="ref6musica" type="checkbox" id="ref6musica" <?php if ($ref6musica=="on"){echo "checked";} ?>></td>
    <td><select name="nccmusica">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccmusica==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccmusica==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccmusica==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccmusica!=3)&&($nccmusica!=2)&&($nccmusica!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>TECNOLOG&Iacute;A</td>
    <td><select name="calificaciontecnologia" id="calificaciontecnologia">
        <option value="1"<?php if($calificaciontecnologia==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificaciontecnologia==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificaciontecnologia==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificaciontecnologia==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificaciontecnologia==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificaciontecnologia==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificaciontecnologia==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificaciontecnologia==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificaciontecnologia==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificaciontecnologia==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificaciontecnologia==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptitecnologia" id="ptitecnologia">
        <option value=" "> </option>
        <option value="si"<?php if($ptitecnologia=="si"){echo "selected";}else{$ptitecnologia="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptitecnologia=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1tecnologia" type="checkbox" id="ref1tecnologia" <?php if ($ref1tecnologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref2tecnologia" type="checkbox" id="ref2tecnologia" <?php if ($ref2tecnologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref3tecnologia" type="checkbox" id="ref3tecnologia"  <?php if ($ref3tecnologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref4tecnologia" type="checkbox" id="ref4tecnologia"  <?php if ($ref4tecnologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref5tecnologia" type="checkbox" id="ref5tecnologia"  <?php if ($ref5tecnologia=="on") {echo "checked";} ?>></td>
    <td><input name="ref6tecnologia" type="checkbox" id="ref6tecnologia" <?php if ($ref6tecnologia=="on"){echo "checked";} ?>></td>
    <td><select name="ncctecnologia">
        <option value=" " selected> </option>
        <option value=1 <?php if($ncctecnologia==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($ncctecnologia==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($ncctecnologia==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($ncctecnologia!=3)&&($ncctecnologia!=2)&&($ncctecnologia!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>RELIGI&Oacute;N</td>
    <td><select name="calificacionreligion" id="calificacionreligion">
        <option value="1"<?php if($calificacionreligion==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionreligion==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionreligion==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionreligion==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionreligion==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionreligion==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionreligion==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionreligion==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionreligion==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionreligion==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionreligion==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptireligion" id="ptireligion">
        <option value=" "> </option>
        <option value="si"<?php if($ptireligion=="si"){echo "selected";}else{$ptireligion="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptireligion=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1religion" type="checkbox" id="ref1religion" <?php if ($ref1religion=="on") {echo "checked";} ?>></td>
    <td><input name="ref2religion" type="checkbox" id="ref2religion" <?php if ($ref2religion=="on") {echo "checked";} ?>></td>
    <td><input name="ref3religion" type="checkbox" id="ref3religion"  <?php if ($ref3religion=="on") {echo "checked";} ?>></td>
    <td><input name="ref4religion" type="checkbox" id="ref4religion"  <?php if ($ref4religion=="on") {echo "checked";} ?>></td>
    <td><input name="ref5religion" type="checkbox" id="ref5religion"  <?php if ($ref5religion=="on") {echo "checked";} ?>></td>
    <td><input name="ref6religion" type="checkbox" id="ref6religion" <?php if ($ref6religion=="on"){echo "checked";} ?>></td>
    <td><select name="nccreligion">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccreligion==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccreligion==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccreligion==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccreligion!=3)&&($nccreligion!=2)&&($nccreligion!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
  <tr>
    <td>INFORMATICA</td>
    <td><select name="calificacionciudadania" id="calificacionciudadania">
        <option value="1"<?php if($calificacionciudadania==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionciudadania==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionciudadania==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionciudadania==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionciudadania==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionciudadania==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionciudadania==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionciudadania==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionciudadania==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionciudadania==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionciudadania==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="pticiudadania" id="pticiudadania">
        <option value=" "> </option>
        <option value="si"<?php if($pticiudadania=="si"){echo "selected";}else{$pticiudadania="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($pticiudadania=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1ciudadania" type="checkbox" id="ref1ciudadania" <?php if ($ref1ciudadania=="on") {echo "checked";} ?>></td>
    <td><input name="ref2ciudadania" type="checkbox" id="ref2ciudadania" <?php if ($ref2ciudadania=="on") {echo "checked";} ?>></td>
    <td><input name="ref3ciudadania" type="checkbox" id="ref3ciudadania"  <?php if ($ref3ciudadania=="on") {echo "checked";} ?>></td>
    <td><input name="ref4ciudadania" type="checkbox" id="ref4ciudadania"  <?php if ($ref4ciudadania=="on") {echo "checked";} ?>></td>
    <td><input name="ref5ciudadania" type="checkbox" id="ref5ciudadania"  <?php if ($ref5ciudadania=="on") {echo "checked";} ?>></td>
    <td><input name="ref6ciudadania" type="checkbox" id="ref6ciudadania" <?php if ($ref6ciudadania=="on"){echo "checked";} ?>></td>
    <td><select name="nccciudadania">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccciudadania==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccciudadania==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccciudadania==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccciudadania!=3)&&($nccciudadania!=2)&&($nccciudadania!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
<td>ETICA</td>
    <td><select name="calificacionetica" id="calificacionetica">
        <option value="1"<?php if($calificacionetica==1){echo "selected";}?>>1</option>
        <option value="2"<?php if($calificacionetica==2){echo "selected";}?>>2</option>
        <option value="3"<?php if($calificacionetica==3){echo "selected";}?>>3</option>
        <option value="4"<?php if($calificacionetica==4){echo "selected";}?>>4</option>
        <option value="5"<?php if($calificacionetica==5){echo "selected";}?>>5</option>
        <option value="6"<?php if($calificacionetica==6){echo "selected";}?>>6</option>
        <option value="7"<?php if($calificacionetica==7){echo "selected";}?>>7</option>
        <option value="8"<?php if($calificacionetica==8){echo "selected";}?>>8</option>
        <option value="9"<?php if($calificacionetica==9){echo "selected";}?>>9</option>
        <option value="10"<?php if($calificacionetica==10){echo "selected";}?>>10</option>
<option value="NO"<?php if($calificacionetica==NO){echo "selected";}?>>NO</option>
    </select></td>
    <td>
      <select name="ptietica" id="ptietica">
        <option value=" "> </option>
        <option value="si"<?php if($ptietica=="si"){echo "selected";}else{$ptietica="no";}?>>S&Iacute;</option>
        <option value="no"<?php if($ptietica=="no"){echo "selected";}?>>NO</option>
    </select></td>
    <td><input name="ref1etica" type="checkbox" id="ref1etica" <?php if ($ref1etica=="on") {echo "checked";} ?>></td>
    <td><input name="ref2etica" type="checkbox" id="ref2etica" <?php if ($ref2etica=="on") {echo "checked";} ?>></td>
    <td><input name="ref3etica" type="checkbox" id="ref3etica"  <?php if ($ref3etica=="on") {echo "checked";} ?>></td>
    <td><input name="ref4etica" type="checkbox" id="ref4etica"  <?php if ($ref4etica=="on") {echo "checked";} ?>></td>
    <td><input name="ref5etica" type="checkbox" id="ref5etica"  <?php if ($ref5etica=="on") {echo "checked";} ?>></td>
    <td><input name="ref6etica" type="checkbox" id="ref6etica" <?php if ($ref6etica=="on"){echo "checked";} ?>></td>
    <td><select name="nccetica">
        <option value=" " selected> </option>
        <option value=1 <?php if($nccetica==1){echo "selected";}?>>PRIMERO O INFERIOR</option>
        <option value=2 <?php if($nccetica==2){echo "selected";}?>>SEGUNDO</option>
        <option value=3 <?php if($nccetica==3){echo "selected";}?>>TERCERO</option>
        <option value=4 <?php if(($nccetica!=3)&&($nccetica!=2)&&($nccetica!=1)){echo "selected";}?>>CUARTO O SUPERIOR</option>
    </select></td>
  </tr>
</table>
</fieldset><fieldset><legend>RENDIMIENTO</legend>
<p>
  <input name="obsrend1" type="checkbox" id="obsrend1" <?php if ($obsrend1=="on"){echo "checked";}?>> 
  El alumno/-a tiene mucho inter&eacute;s y trabaja con esfuerzo y motivaci&oacute;n</p>
<p>
  <input name="obsrend2" type="checkbox" id="obsrend2" <?php if ($obsrend2=="on"){echo "checked";}?>> 
  En general tiene inter&eacute;s y se esfuerza por sacar adelante sus estudios</p>
<p>
  <input name="obsrend3" type="checkbox" id="obsrend3" <?php if ($obsrend3=="on"){echo "checked";}?>> 
  Aunque tiene inter&eacute;s y motivaci&oacute;n podr&iacute;a esforzarse un poco m&aacute;s </p>
<p>
  <input name="obsrend4" type="checkbox" id="obsrend4" <?php if ($obsrend4=="on"){echo "checked";}?>> 
  El rendimiento ha ido aumentando a lo largo del curso</p>
<p>
  <input name="obsrend5" type="checkbox" id="obsrend5" <?php if ($obsrend5=="on"){echo "checked";}?>> 
  El rendimiento ha ido bajando a lo largo del curso</p>
<p>
  <input name="obsrend6" type="checkbox" id="obsrend6" <?php if ($obsrend6=="on"){echo "checked";}?>> 
  El alumno/-a no est&aacute; nada motivado, no tiene inter&eacute;s y no se esfuerza para superar el curso</p>
<p>
  <input name="obsrend7" type="checkbox" id="obsrend7" <?php if ($obsrend7=="on"){echo "checked";}?>> 
  Falta a clase mucho y eso repercute en su rendimiento</p>
</fieldset>
<fieldset><legend>COMPORTAMIENTO</legend>

</fieldset>
<fieldset>
<p>
  <input name="obscomp1" type="checkbox" id="obscomp1" <?php if ($obscomp1=="on"){echo "checked";}?>> 
  Muy buen comportamiento y actitud en clase</p>
<p>
  <input name="obscomp2" type="checkbox" id="obscomp2" <?php if ($obscomp2=="on"){echo "checked";}?>> 
  Aunque es un poco hablador/-a, en general manifiesta buen comportamiento</p>
<p>
  <input name="obscomp3" type="checkbox" id="obscomp3" <?php if ($obscomp3=="on"){echo "checked";}?>> 
  En general manifiesta buen comportamiento aunque en ocasiones es necesario llamarle la atenci&oacute;n </p>
<p>
  <input name="obscomp4" type="checkbox" id="obscomp4" <?php if ($obscomp4=="on"){echo "checked";}?>> 
  Aunque empez&oacute; mal su comportamiento ha ido mejorando progresivamente a lo largo del curso </p>
<p>
  <input name="obscomp5" type="checkbox" id="obscomp5" <?php if ($obscomp5=="on"){echo "checked";}?>> 
  Su comportamiento ha ido empeorando progresivamente desde el comienzo del curso</p>
<p>
  <input name="obscomp6" type="checkbox" id="obscomp6" <?php if ($obscomp6=="on"){echo "checked";}?>> 
  Se le han abierto varios partes de incidencia a lo largo del curso </p>
<p>
  <input name="obscomp7" type="checkbox" id="obscomp7" <?php if ($obscomp7=="on"){echo "checked";}?>> 
  Ha sido necesario expulsarle por mala conducta</p>
<p>
  <input name="obscomp8" type="checkbox" id="obscomp8" <?php if ($obscomp8=="on"){echo "checked";}?>> 
  Se le ha abierto un expediente disciplinario
  </p>
<p><input name="alumno" type="hidden" value="<?php echo $alumno;?>" />
  <input name="nombrealumno" type="hidden" id="nombrealumno" value="<?php echo $nombrealumno; ?>" />
<p><input name="grupo" type="hidden" value="<?php echo $grupo;}?>" />
  <label for="Submit"></label>
  <input type="submit" name="Submit" value="ENVIAR" id="Submit" />
</p>
</fieldset>
</form>
</body>
</html>

