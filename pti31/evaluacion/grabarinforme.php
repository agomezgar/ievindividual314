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
   $link=Conectarse();

$id=$_POST['alumno'];
$alumno=$_POST['nombrealumno'];
$materia=$_POST['materia'];
$curso=$_POST['curso'];
$calificacion=$_POST['calificacion'];
$idfinal=$id.$materia.$curso;
$grupo=$_POST['grupo'];
$tutor=$_POST['tutor'];
$profesor=$_POST['profesor'];
$curso=$_POST['curso'];
$acnee=$_POST['ACNEE'];
$objetor=$_POST['OBJETOR'];
$acneae=$_POST['ACNEAE'];
$diver=$_POST['DIVER'];
$absen=$_POST['ABSEN'];
$tarde=$_POST['TARDE'];
$interc=$_POST['INTERC'];
$vago=$_POST['VAGO'];
$dific=$_POST['DIFICULTADES'];
$otro=$_POST['OTRO'];
$rec1=$_POST['rec1'];
$rec2=$_POST['rec2'];
$rec3=$_POST['rec3'];
$rec4=$_POST['rec4'];
$rec5=$_POST['rec5'];
$rec6=$_POST['rec6'];
$rec7=$_POST['rec7'];
$rec8=$_POST['rec8'];
$rec9=$_POST['rec9'];
$rec10=$_POST['rec10'];
$rec11=$_POST['rec11'];
$rec12=$_POST['rec12'];
$rec13=$_POST['rec13'];
$rec14=$_POST['rec14'];
$rec15=$_POST['rec15'];
$rec16=$_POST['rec16'];
$rec17=$_POST['rec17'];
$rec18=$_POST['rec18'];
$rec19=$_POST['rec19'];
$rec20=$_POST['rec20'];
$evc1=$_POST['evc1'];
$evc2=$_POST['evc2'];
$evc3=$_POST['evc3'];
$evc4=$_POST['evc4'];
$evc5=$_POST['evc5'];
$evc6=$_POST['evc6'];
$evc7=$_POST['evc7'];
$evc8=$_POST['evc8'];
$evc9=$_POST['evc9'];
$evc10=$_POST['evc10'];
$evc11=$_POST['evc11'];
$evc12=$_POST['evc12'];
$evc13=$_POST['evc13'];
$evc14=$_POST['evc14'];
$evc15=$_POST['evc15'];
$evc16=$_POST['evc16'];
$evc17=$_POST['evc17'];
$evc18=$_POST['evc18'];
$evc19=$_POST['evc19'];
$evc20=$_POST['evc20'];
$actividades=$_POST['ACTIVIDADES'];
$c1=$_POST['C1'];
$c2=$_POST['C2'];
$c3=$_POST['C3'];
$c4=$_POST['C4'];
$c5=$_POST['C5'];
$c6=$_POST['C6'];
$c7=$_POST['C7'];
$c8=$_POST['C8'];
$c9=$_POST['C9'];
$c10=$_POST['C10'];
$c11=$_POST['C11'];
$c12=$_POST['C12'];

$calificapti=$_POST['CALIFICAPTI'];
$observaciones=$_POST['OBSERVACIONES'];




mysql_query("insert into pti(id,idalumno,NOMBRE,CURSO,TUTOR,MATERIA,CALIFICACION,PROFESOR,ACNEE,OBJETOR,ACNEAE,DIVER,ABSEN,TARDE,INTERC,VAGO,DIFICULTADES,OTRO,ACTIVIDADES,rec1,rec2,rec3,rec4,rec5,rec6,rec7,rec8,rec9,rec10,rec11,rec12,rec13,rec14,rec15,rec16,rec17,rec18,rec19,rec20,evc1,evc2,evc3,evc4,evc5,evc6,evc7,evc8,evc9,evc10,evc11,evc12,evc13,evc14,evc15,evc16,evc17,evc18,evc19,evc20,COMP1,COMP2,COMP3,COMP4,COMP5,COMP6,COMP7,COMP8,COMP9,CALIFICAPTI,OBSERVACIONES)values('$idfinal','$id','$alumno','$curso','$tutor','$materia','$calificacion','$profesor','$acnee','$objetor','$acneae','$diver','$absen','$tarde','$interc','$vago','$dific','$otro','$actividades','$rec1','$rec2','$rec3','$rec4','$rec5','$rec6','$rec7','$rec8','$rec9','$rec10','$rec11','$rec12','$rec13','$rec14','$rec15','$rec16','$rec17','$rec18','$rec19','$rec20','$evc1','$evc2','$evc3','$evc4','$evc5','$evc6','$evc7','$evc8','$evc9','$evc10','$evc11','$evc12','$evc13','$evc14','$evc15','$evc16','$evc17','$evc18','$evc19','$evc20','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9','$calificapti','$observaciones')",$link)or die (mysql_error());
mysql_free_result;
echo "<meta http-equiv=\"refresh\" content=\"0;URL=grabargrupo.php\">";
?>
