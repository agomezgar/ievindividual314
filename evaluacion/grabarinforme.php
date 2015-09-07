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
$grupo=$_POST['grupo'];
$curso=$_POST['grupo'];
$curso1rep=$_POST['curso1rep'];
$anyo1rep=$_POST['anyo1rep'];
$curso2rep=$_POST['curso2rep'];
$anyo2rep=$_POST['anyo2rep'];
$neg34=$_POST['neg34'];
$neg34areas=$_POST['neg34areas'];
$acneaesino=$_POST['acneaesino'];
$acneaefecha=$_POST['acenaefecha'];
$acneaeareasasociadas=$_POST['acneaeareasasociadas'];
$absentismosino=$_POST['absentismosino'];
$causasabsentismo=$_POST['causasabsentismo'];
$diversificacionsino=$_POST['diversificacionsino'];
$observacioneshistorial=$_POST['observacioneshistorial'];

$calificacionlengua=$_POST['calificacionlengua'];
$ptilengua=$_POST['ptilengua'];
$ref1lengua=$_POST['ref1lengua'];
$ref2lengua=$_POST['ref2lengua'];
$ref3lengua=$_POST['ref3lengua'];
$ref4lengua=$_POST['ref4lengua'];
$ref5lengua=$_POST['ref5lengua'];
$ref6lengua=$_POST['ref6lengua'];
$ncclengua=$_POST['ncclengua'];

$calificacioningles=$_POST['calificacioningles'];
$ptiingles=$_POST['ptiingles'];
$ref1ingles=$_POST['ref1ingles'];
$ref2ingles=$_POST['ref2ingles'];
$ref3ingles=$_POST['ref3ingles'];
$ref4ingles=$_POST['ref4ingles'];
$ref5ingles=$_POST['ref5ingles'];
$ref6ingles=$_POST['ref6ingles'];
$nccingles=$_POST['nccingles'];

$calificacionfrances=$_POST['calificacionfrances'];
$ptifrances=$_POST['ptifrances'];
$ref1frances=$_POST['ref1frances'];
$ref2frances=$_POST['ref2frances'];
$ref3frances=$_POST['ref3frances'];
$ref4frances=$_POST['ref4frances'];
$ref5frances=$_POST['ref5frances'];
$ref6frances=$_POST['ref6frances'];
$nccfrances=$_POST['nccfrances'];

$calificacionmatematicas=$_POST['calificacionmatematicas'];
$ptimatematicas=$_POST['ptimatematicas'];
$ref1matematicas=$_POST['ref1matematicas'];
$ref2matematicas=$_POST['ref2matematicas'];
$ref3matematicas=$_POST['ref3matematicas'];
$ref4matematicas=$_POST['ref4matematicas'];
$ref5matematicas=$_POST['ref5matematicas'];
$ref6matematicas=$_POST['ref6matematicas'];
$nccmatematicas=$_POST['nccmatematicas'];

$calificacionsociales=$_POST['calificacionsociales'];
$ptisociales=$_POST['ptisociales'];
$ref1sociales=$_POST['ref1sociales'];
$ref2sociales=$_POST['ref2sociales'];
$ref3sociales=$_POST['ref3sociales'];
$ref4sociales=$_POST['ref4sociales'];
$ref5sociales=$_POST['ref5sociales'];
$ref6sociales=$_POST['ref6sociales'];
$nccsociales=$_POST['nccsociales'];

$calificacionbiologia=$_POST['calificacionbiologia'];
$ptibiologia=$_POST['ptibiologia'];
$ref1biologia=$_POST['ref1biologia'];
$ref2biologia=$_POST['ref2biologia'];
$ref3biologia=$_POST['ref3biologia'];
$ref4biologia=$_POST['ref4biologia'];
$ref5biologia=$_POST['ref5biologia'];
$ref6biologia=$_POST['ref6biologia'];
$nccbiologia=$_POST['nccbiologia'];

$calificacionfisica=$_POST['calificacionfisica'];
$ptifisica=$_POST['ptifisica'];
$ref1fisica=$_POST['ref1fisica'];
$ref2fisica=$_POST['ref2fisica'];
$ref3fisica=$_POST['ref3fisica'];
$ref4fisica=$_POST['ref4fisica'];
$ref5fisica=$_POST['ref5fisica'];
$ref6fisica=$_POST['ref6fisica'];
$nccfisica=$_POST['nccfisica'];

$calificaciongimnasia=$_POST['calificaciongimnasia'];
$ptigimnasia=$_POST['ptigimnasia'];
$ref1gimnasia=$_POST['ref1gimnasia'];
$ref2gimnasia=$_POST['ref2gimnasia'];
$ref3gimnasia=$_POST['ref3gimnasia'];
$ref4gimnasia=$_POST['ref4gimnasia'];
$ref5gimnasia=$_POST['ref5gimnasia'];
$ref6gimnasia=$_POST['ref6gimnasia'];
$nccgimnasia=$_POST['nccgimnasia'];

$calificacionplastica=$_POST['calificacionplastica'];
$ptiplastica=$_POST['ptiplastica'];
$ref1plastica=$_POST['ref1plastica'];
$ref2plastica=$_POST['ref2plastica'];
$ref3plastica=$_POST['ref3plastica'];
$ref4plastica=$_POST['ref4plastica'];
$ref5plastica=$_POST['ref5plastica'];
$ref6plastica=$_POST['ref6plastica'];
$nccplastica=$_POST['nccplastica'];

$calificaciongriego=$_POST['calificaciongriego'];
$ptigriego=$_POST['ptigriego'];
$ref1griego=$_POST['ref1griego'];
$ref2griego=$_POST['ref2griego'];
$ref3griego=$_POST['ref3griego'];
$ref4griego=$_POST['ref4griego'];
$ref5griego=$_POST['ref5griego'];
$ref6griego=$_POST['ref6griego'];
$nccgriego=$_POST['nccgriego'];

$calificacionmusica=$_POST['calificacionmusica'];
$ptimusica=$_POST['ptimusica'];
$ref1musica=$_POST['ref1musica'];
$ref2musica=$_POST['ref2musica'];
$ref3musica=$_POST['ref3musica'];
$ref4musica=$_POST['ref4musica'];
$ref5musica=$_POST['ref5musica'];
$ref6musica=$_POST['ref6musica'];
$nccmusica=$_POST['nccmusica'];

$calificaciontecnologia=$_POST['calificaciontecnologia'];
$ptitecnologia=$_POST['ptitecnologia'];
$ref1tecnologia=$_POST['ref1tecnologia'];
$ref2tecnologia=$_POST['ref2tecnologia'];
$ref3tecnologia=$_POST['ref3tecnologia'];
$ref4tecnologia=$_POST['ref4tecnologia'];
$ref5tecnologia=$_POST['ref5tecnologia'];
$ref6tecnologia=$_POST['ref6tecnologia'];
$ncctecnologia=$_POST['ncctecnologia'];

$calificacionreligion=$_POST['calificacionreligion'];
$ptireligion=$_POST['ptireligion'];
$ref1religion=$_POST['ref1religion'];
$ref2religion=$_POST['ref2religion'];
$ref3religion=$_POST['ref3religion'];
$ref4religion=$_POST['ref4religion'];
$ref5religion=$_POST['ref5religion'];
$ref6religion=$_POST['ref6religion'];
$nccreligion=$_POST['nccreligion'];

$calificacionciudadania=$_POST['calificacionciudadania'];
$pticiudadania=$_POST['pticiudadania'];
$ref1ciudadania=$_POST['ref1ciudadania'];
$ref2ciudadania=$_POST['ref2ciudadania'];
$ref3ciudadania=$_POST['ref3ciudadania'];
$ref4ciudadania=$_POST['ref4ciudadania'];
$ref5ciudadania=$_POST['ref5ciudadania'];
$ref6ciudadania=$_POST['ref6ciudadania'];
$nccciudadania=$_POST['nccciudadania'];

$calificacionetica=$_POST['calificacionetica'];
$ptietica=$_POST['ptietica'];
$ref1etica=$_POST['ref1etica'];
$ref2etica=$_POST['ref2etica'];
$ref3etica=$_POST['ref3etica'];
$ref4etica=$_POST['ref4etica'];
$ref5etica=$_POST['ref5etica'];
$ref6etica=$_POST['ref6etica'];
$nccetica=$_POST['nccetica'];

$obsrend1=$_POST['obsrend1'];
$obsrend2=$_POST['obsrend2'];
$obsrend3=$_POST['obsrend3'];
$obsrend4=$_POST['obsrend4'];
$obsrend5=$_POST['obsrend5'];
$obsrend6=$_POST['obsrend6'];
$obsrend7=$_POST['obsrend7'];

$obscomp1=$_POST['obscomp1'];
$obscomp2=$_POST['obscomp2'];
$obscomp3=$_POST['obscomp3'];
$obscomp4=$_POST['obscomp4'];
$obscomp5=$_POST['obscomp5'];
$obscomp6=$_POST['obscomp6'];
$obscomp7=$_POST['obscomp7'];
$obscomp8=$_POST['obscomp8'];
mysql_query("insert into informeindividual(id,grupo,alumno,curso,curso1rep,anyo1rep,curso2rep,anyo2rep,neg34,neg34areas,acneaesino,acneaefecha,acneaeareasasociadas,absentismosino,causasabsentismo,diversificacionsino,observacioneshistorial,calificacionlengua,ptilengua,ref1lengua,ref2lengua,ref3lengua,ref4lengua,ref5lengua,ref6lengua,ncclengua,calificacioningles,ptiingles,ref1ingles,ref2ingles,ref3ingles,ref4ingles,ref5ingles,ref6ingles,nccingles,calificacionfrances,ptifrances,ref1frances,ref2frances,ref3frances,ref4frances,ref5frances,ref6frances,nccfrances,calificacionmatematicas,ptimatematicas,ref1matematicas,ref2matematicas,ref3matematicas,ref4matematicas,ref5matematicas,ref6matematicas,nccmatematicas,calificacionsociales,ptisociales,ref1sociales,ref2sociales,ref3sociales,ref4sociales,ref5sociales,ref6sociales,nccsociales,calificacionbiologia,ptibiologia,ref1biologia,ref2biologia,ref3biologia,ref4biologia,ref5biologia,ref6biologia,nccbiologia,calificacionfisica,ptifisica,ref1fisica,ref2fisica,ref3fisica,ref4fisica,ref5fisica,ref6fisica,nccfisica,calificaciongimnasia,ptigimnasia,ref1gimnasia,ref2gimnasia,ref3gimnasia,ref4gimnasia,ref5gimnasia,ref6gimnasia,nccgimnasia,calificacionplastica,ptiplastica,ref1plastica,ref2plastica,ref3plastica,ref4plastica,ref5plastica,ref6plastica,nccplastica,calificaciongriego,ptigriego,ref1griego,ref2griego,ref3griego,ref4griego,ref5griego,ref6griego,nccgriego,calificacionmusica,ptimusica,ref1musica,ref2musica,ref3musica,ref4musica,ref5musica,ref6musica,nccmusica,calificaciontecnologia,ptitecnologia,ref1tecnologia,ref2tecnologia,ref3tecnologia,ref4tecnologia,ref5tecnologia,ref6tecnologia,ncctecnologia,calificacionreligion,ptireligion,ref1religion,ref2religion,ref3religion,ref4religion,ref5religion,ref6religion,nccreligion,calificacionciudadania,pticiudadania,ref1ciudadania,ref2ciudadania,ref3ciudadania,ref4ciudadania,ref5ciudadania,ref6ciudadania,nccciudadania,calificacionetica,ptietica,ref1etica,ref2etica,ref3etica,ref4etica,ref5etica,ref6etica,nccetica,obsrend1,obsrend2,obsrend3,obsrend4,obsrend5,obsrend6,obsrend7,obscomp1,obscomp2,obscomp3,obscomp4,obscomp5,obscomp6,obscomp7,obscomp8)values('$id','$grupo','$alumno','$curso','$curso1rep','$anyo1rep','$curso2rep','$anyo2rep','$neg34','$neg34areas','$acneaesino','$acneaefecha','$acneaeareasasociadas','$absentismosino','$causasabsentismo','$diversificacionsino','$observacioneshistorial','$calificacionlengua','$ptilengua','$ref1lengua','$ref2lengua','$ref3lengua','$ref4lengua','$ref5lengua','$ref6lengua','$ncclengua','$calificacioningles','$ptiingles','$ref1ingles','$ref2ingles','$ref3ingles','$ref4ingles','$ref5ingles','$ref6ingles','$nccingles','$calificacionfrances','$ptifrances','$ref1frances','$ref2frances','$ref3frances','$ref4frances','$ref5frances','$ref6frances','$nccfrances','$calificacionmatematicas','$ptimatematicas','$ref1matematicas','$ref2matematicas','$ref3matematicas','$ref4matematicas','$ref5matematicas','$ref6matematicas','$nccmatematicas','$calificacionsociales','$ptisociales','$ref1sociales','$ref2sociales','$ref3sociales','$ref4sociales','$ref5sociales','$ref6sociales','$nccsociales','$calificacionbiologia','$ptibiologia','$ref1biologia','$ref2biologia','$ref3biologia','$ref4biologia','$ref5biologia','$ref6biologia','$nccbiologia','$calificacionfisica','$ptifisica','$ref1fisica','$ref2fisica','$ref3fisica','$ref4fisica','$ref5fisica','$ref6fisica','$nccfisica','$calificaciongimnasia','$ptigimnasia','$ref1gimnasia','$ref2gimnasia','$ref3gimnasia','$ref4gimnasia','$ref5gimnasia','$ref6gimnasia','$nccgimnasia','$calificacionplastica','$ptiplastica','$ref1plastica','$ref2plastica','$ref3plastica','$ref4plastica','$ref5plastica','$ref6plastica','$nccplastica','$calificaciongriego','$ptigriego','$ref1griego','$ref2griego','$ref3griego','$ref4griego','$ref5griego','$ref6griego','$nccgriego','$calificacionmusica','$ptimusica','$ref1musica','$ref2musica','$ref3musica','$ref4musica','$ref5musica','$ref6musica','$nccmusica','$calificaciontecnologia','$ptitecnologia','$ref1tecnologia','$ref2tecnologia','$ref3tecnologia','$ref4tecnologia','$ref5tecnologia','$ref6tecnologia','$ncctecnologia','$calificacionreligion','$ptireligion','$ref1religion','$ref2religion','$ref3religion','$ref4religion','$ref5religion','$ref6religion','$nccreligion','$calificacionciudadania','$pticiudadania','$ref1ciudadania','$ref2ciudadania','$ref3ciudadania','$ref4ciudadania','$ref5ciudadania','$ref6ciudadania','$nccciudadania','$calificacionetica','$ptietica','$ref1etica','$ref2etica','$ref3etica','$ref4etica','$ref5etica','$ref6etica','$nccetica','$obsrend1','$obsrend2','$obsrend3','$obsrend4','$obsrend5','$obsrend6','$obsrend7','$obscomp1','$obscomp2','$obscomp3','$obscomp4','$obscomp5','$obscomp6','$obscomp7','$obscomp8')",$link)or die (mysql_error());
mysql_free_result;
echo "<meta http-equiv=\"refresh\" content=\"0;URL=grabargrupo.php\">";
?>
