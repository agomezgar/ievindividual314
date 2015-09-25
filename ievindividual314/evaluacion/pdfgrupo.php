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
<?php require ('fpdf.php');
$grupo=$_POST['grupo'];
include('../config.php');
function Conectarse()
{require ('../config.php');
   if (!($link=mysql_connect($servidor,$usuario,$contra)))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db($base,$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}

function fecha(){
$dia=date(d);
$m=date(m);
$anyo=date(Y);
switch ($m){
case 1:
$mes="enero";
break;
case 2:
$mes="febrero";
break;
case 3:
$mes="marzo";
break;
case 4:
$mes="abril";
break;
case 5:
$mes="mayo";
break;
case 6:
$mes="junio";
break;
case 7:
$mes="julio";
break;
case 8:
$mes="agosto";
break;
case 9:
$mes="septiembre";
break;
case 10:
$mes="octubre";
break;
case 11:
$mes="noviembre";
break;
case 12:
$mes="diciembre";
break;
}
$fechafinal=$dia." de ".$mes." de ".$anyo;
return $fechafinal;
}
function pti($ptiasignatura) {
if ($ptiasignatura=="si"){
$ptitexto="SÍ"; }
else {$ptitexto="NO";}
return $ptitexto;
}
function ncc($necesidad){
if ($necesidad=="1"){
$nccfinal="PRIMERO";
}
elseif ($necesidad=="2"){
$nccfinal="SEGUNDO";
}
elseif ($necesidad=="3"){
$nccfinal="TERCERO";
}
elseif ($necesidad=="4"){
$nccfinal="CUARTO";
}
else {$nccfinal="No consta";}
return $nccfinal;
}
function califica($nota)
{
if (($nota=="1")||($nota=="2")||($nota=="3")||($nota=="4")){
$notaletra="Insuficiente";
}
elseif ($nota=="5") {
$notaletra="Suficiente";
}
elseif ($nota=="6") {
$notaletra="Bien";
}
elseif (($nota=="7")||($nota=="8")) {
$notaletra="Notable";
}

elseif(($nota=="9")||($nota=="10")) {
$notaletra="Sobresaliente";
}
else {
$notaletra="Sin matrícula";
}
return $notaletra;
}
function refuerzo($ref) {
if ($ref=="on"){
$contestacion="X";}
else {$contestacion="";}
return $contestacion;
}
class PDF extends FPDF
{


//Pie de página
function Footer()
{require ("../config.php");
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,$direccion,0,0,'C');
}
}

$pdf=new PDF;
$link=Conectarse();

$fechactual= date(d."-".m."-".Y); 
$firma=$nombrecentro;
 $result = mysql_query("SELECT alumno FROM matriculas WHERE grupo='$grupo'",$link);

while($row = mysql_fetch_array($result)) {
$nene=mysql_query("SELECT * FROM alumnos WHERE alumno=$row[alumno] ORDER BY apellidos");
while($nene2=mysql_fetch_array($nene)){


$nombrealumno=$nene2['apellidos'].",".$nene2['nombre'];
$nombre=$nene2['nombre'];
$apellidos=$nene2['apellidos'];
$fecha=$nene2['fecha'];
$dom=$nene2['dom'];
$loc=$nene2['loc'];
$prov=$nene2['prov'];
$tf=$nene2['tf'];
$tf2=$nene2['b']; 
$apelpadre=$nene2['padre'];
$nombrepadre=$nene2['g'];
$apelmadre=$nene2['madre'];
$nombremadre=$nene2['h'];
$alumno=$nene2['alumno'];


 $result4=mysql_query("select * from informeindividual where id='$alumno'",$link);
while($row4 = mysql_fetch_array($result4)) {
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

$calificacionciudadania=$row4['calificacionciudadania'];
$pticiudadania=$row4['pticiudadania'];
$ref1ciudadania=$row4['ref1ciudadania'];
$ref2ciudadania=$row4['ref2ciudadania'];
$ref3ciudadania=$row4['ref3ciudadania'];
$ref4ciudadania=$row4['ref4ciudadania'];
$ref5ciudadania=$row4['ref5ciudadania'];
$ref6ciudadania=$row4['ref6ciudadania'];
$nccciudadania=$row4['nccciudadania'];


$calificacionetica=$row4['calificacionetica'];
$ptietica=$row4['ptietica'];
$ref1etica=$row4['ref1etica'];
$ref2etica=$row4['ref2etica'];
$ref3etica=$row4['ref3etica'];
$ref4etica=$row4['ref4etica'];
$ref5etica=$row4['ref5etica'];
$ref6etica=$row4['ref6etica'];
$nccetica=$row4['nccetica'];

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
$tutores=$apelpadre.", ".$nombrepadre." y ".$apelmadre.",".$nombremadre;
$direccion= $dom.", ".$loc.", ".$prov;
$pdf->Addpage();
$pdf->SetFont('Arial','B',6);
$pdf->Image('logoclm.jpg',10,10);

$pdf->SetLineWidth(1);
$pdf->Cell(130,10,'');

$pdf->SetFillColor(150,150,150);
$pdf->Cell(80,10,'Delegación Provincial de Educación y Ciencia');
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'');
$pdf->Cell(100,10,'INFORME DE EVALUACIÓN INDIVIDUALIZADO');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(180,5,'DATOS PERSONALES DEL ALUMNO',1,1,'C',1);
$pdf->Cell(50,5,'CENTRO',1,0,'C',1);
$pdf->Cell(50,5,'LOCALIDAD',1,0,'C',1);
$pdf->Cell(40,5,'CURSO',1,0,'C',1);
$pdf->Cell(40,5,'FECHA ACTUAL',1,1,'C',1);
$pdf->Cell(50,5,'IES Eduardo Valencia',1,0,'C',0);
$pdf->Cell(50,5,'Calzada de Calatrava (Ciudad Real)',1,0,'C',0);
$pdf->Cell(40,5,$grupo,1,0,'C',0);
$pdf->Cell(40,5,$fechactual,1,1,'C',0);
$pdf->Cell(100,5,'DIRECCIÓN DEL CENTRO',1,0,'C',1);
$pdf->Cell(80,5,'TELÉFONO',1,1,'C',1);
$pdf->Cell(100,5,'C/Cervantes, 166',1,0,'C',0);
$pdf->Cell(80,5,'(926)875346',1,1,'C',0);
$pdf->Cell(100,5,'NOMBRE DEL ALUMNO',1,0,'C',1);
$pdf->Cell(80,5,'APELLIDOS',1,1,'C',1);
$pdf->Cell(100,5,$nombre,1,0,'C',0);
$pdf->Cell(80,5,$apellidos,1,1,'C',0);
$pdf->Cell(80,5,'FECHA DE NACIMIENTO',1,0,'C',1);
$pdf->Cell(100,5,'PADRES/TUTORES LEGALES',1,1,'C',1);
$pdf->Cell(80,10,$fecha,1,0,'C',0);
$pdf->Cell(100,10,$tutores,1,1,'C',0);
$pdf->Cell(100,5,'DIRECCIÓN',1,0,'C',1);
$pdf->Cell(80,5,'TELÉFONOS',1,1,'C',1);
$pdf->Cell(100,15,$direccion,1,0,L,0);
$pdf->Cell(80,15,$tf."/".$tf2,1,1,C,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);


$pdf->Cell(180,5,'DATOS DE LA HISTORIA PERSONAL ESCOLAR',1,1,'C',1,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,5,'REPETICIONES:',1,0,'C',1);
$pdf->SetFont('Arial','',8);
if ($curso1rep=="0"&$curso2rep=="0"){
$pdf->Cell(140,5,'El alumno no ha repetido ningún curso',1,1,'C',0,0);}
else
{
if ($curso2rep=="0"){$pdf->Cell(140,5,'El alumno repitió el curso: '.$curso1rep.' en el año: '.$anyo1rep,1,1,'C',0,0);}
else
	{$pdf->Cell(140,5,'El alumno repitió el curso: '.$curso1rep.' en el año: '.$anyo1rep.' y el curso: '.$curso2rep.' en el año: '.$anyo2rep,1,1,'C',0,0);
	}}
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(40,5,'PROMOCIÓN DE 3º A 4º:',1,0,'C',1);
	$pdf->SetFont('Arial','',8);
if ($neg34areas==""){
$suspensos="El alumno/-a no tiene asignaturas pendientes de cursos anteriores";
}
else {
$suspensos="El alumno/-a tiene pendientes asignaturas en cursos anteriores: ".$neg34areas;
}
$pdf->Multicell(140,5,$suspensos,1,L,0);
if($acneaesino=="si"){
$totalacneae="El alumno/-a presenta Necesidades Específicas de Apoyo Educativo";
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,5,'ACNEAE',1,0,'C',1);
	$pdf->SetFont('Arial','',8);
$pdf->Multicell (160,5,$totalacneae,1,L,0);
}
else {
$totalacneae="No se han detectado Necesidades Específicas de Apoyo Educativo en el alumno/-a";
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,5,'ACNEAE',1,0,'C',1);
	$pdf->SetFont('Arial','',8);
$pdf->Multicell (160,5,$totalacneae,1,L,0);
}
if ($absentismosino=="si"){
$totalabsentismo="El alumno/-a ha presentado problemas serios de absentismo: ".$causasabsentismo;
}
else {
$totalabsentismo="El alumno/-a no ha presentado problemas serios de absentismo en su paso por la ESO";

	}
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(180,5,'ABSENTISMO',1,1,'C',1);
	$pdf->SetFont('Arial','',8);
$pdf->Multicell (180,5,$totalabsentismo,1,L,0);
if($diversificacionsino=="si") {
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(180,5,'DIVERSIFICACIÓN CURRICULAR',1,1,'C',1);
	$pdf->SetFont('Arial','',8);
$pdf->Multicell (180,5,"El alumno proviene de un Programa de Diversificación Curricular",1,L,0);
}
else {
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(180,5,'DIVERSIFICACIÓN CURRICULAR',1,1,'C',1);
	$pdf->SetFont('Arial','',8);
$pdf->Multicell (180,5,"El alumno NO proviene de un Programa de Diversificación Curricular",1,L,0);
}
$pdf->SetFont('Arial','B',8);
	$pdf->Cell(180,5,'OTRAS OBSERVACIONES DE INTERÉS',1,1,'C',1);
$pdf->SetFont('Arial','',8);
$pdf->Multicell (180,5,$observacioneshistorial,1,L,0);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
	$pdf->Cell(180,5,'GRADO DE CONSECUCIÓN DE LAS COMPETENCIAS BÁSICAS',1,1,'C',1);
	$actualy=$pdf->GetY();
	$pdf->SetFont('Arial','',8);
	$pdf->Multicell (95,5,"- COMPETENCIA LINGÜISTICA \n - COMPETENCIA MATEMÁTICA \n- COMPETENCIA EN EL CONOCIMIENTO Y LA INTERACCIÓN CON EL MUNDO FÍSICO \n- COMPETENCIA CULTURAL Y ARTÍSTICA \n- COMPETENCIA DIGITAL Y TRATAMIENTO DE LA INFORMACIÓN \n- COMPETENCIA SOCIAL Y CIUDADANA
 - COMPETENCIA PARA APRENDER A APRENDER \n - COMPETENCIA EN AUTONOMÍA E INICIATIVA PERSONAL \n - COMPETENCIA EMOCIONAL ",1,L,0);
$pdf->SetXY(105,$actualy);
$pdf->Multicell(85,5,"En función de las calificaciones recogidas en el boletín de notas que acompaña a este informe se considerará el siguiente baremo: \n - Calificación de SOBRESALIENTE y NOTABLE: ha superado ampliamente las competencias básicas.\n - Calificación de BIEN y SUFICIENTE: ha superado suficientemente las competencias básicas. \n - Calificación de INSUFICIENTE: no ha superado las competencias básicas.\n ",1,L,0);
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
$pdf->Cell(200,10,'Alumno: '.$nombrealumno,0,0,'C',0);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,25,'MATERIAS',1,0,'C',1);
$pdf->Cell(30,25,'EVALUACIÓN',1,0,'C',1);
$pdf->Cell(20,25,'PTI SÍ/NO',1,0,'C',1);
$pdf->Cell(20,25,'NCC',1,0,'C',1);
$pdf->SetFont('Arial','B',5);
$pdf->Multicell(60,5,"REFUERZO Y/O AMPLIACIÓN \n 1. Refuerzo ordinario dentro del aula   4. Pedagogía Terapeútica\n 2. Apoyo ordinario fuera del aula          5. Inmersión lingüística \n 3. Audición y Lenguaje                           6. Otros",1,'L',1);
$nuevay=$pdf->GetY();
$yfinal=$nuevay;
$pdf->SetXY(140,$yfinal);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,'1',1,0,'C',1);
$pdf->Cell(10,5,'2',1,0,'C',1);
$pdf->Cell(10,5,'3',1,0,'C',1);
$pdf->Cell(10,5,'4',1,0,'C',1);
$pdf->Cell(10,5,'5',1,0,'C',1);
$pdf->Cell(10,5,'6',1,1,'C',1);




$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,'LENGUA CASTELLANA Y LITERATURA',1,0,L,0);
$pdf->Cell(30,5,$calificacionlengua.":".califica($calificacionlengua),1,0,L,0);
$pdf->Cell(20,5,pti($ptilengua),1,0,C,0);
$pdf->Cell(20,5,ncc($ncclengua),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref1lengua),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2lengua),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3lengua),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4lengua),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5lengua),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6lengua),1,1,C,0);



$pdf->Cell(60,5,'INGLÉS',1,0,L,0);
$pdf->Cell(30,5,$calificacioningles.":".califica($calificacioningles),1,0,L,0);
$pdf->Cell(20,5,pti($ptiingles),1,0,C,0);
$pdf->Cell(20,5,ncc($nccingles),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1ingles),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2ingles),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3ingles),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4ingles),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5ingles),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6ingles),1,1,C,0);


$pdf->Cell(60,5,'FRANCÉS',1,0,L,0);
$pdf->Cell(30,5,$calificacionfrances.":".califica($calificacionfrances),1,0,L,0);
$pdf->Cell(20,5,pti($ptifrances),1,0,C,0);
$pdf->Cell(20,5,ncc($nccfrances),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1frances),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2frances),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3frances),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4frances),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5frances),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6frances),1,1,C,0);


$pdf->Cell(60,5,'MATEMÁTICAS',1,0,L,0);
$pdf->Cell(30,5,$calificacionmatematicas.":".califica($calificacionmatematicas),1,0,L,0);
$pdf->Cell(20,5,pti($ptimatematicas),1,0,C,0);
$pdf->Cell(20,5,ncc($nccmatematicas),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1matematicas),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2matematicas),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3matematicas),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4matematicas),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5matematicas),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6matematicas),1,1,C,0);


$pdf->Cell(60,5,'CCSS, GEOGRAFIA, HISTORIA',1,0,L,0);
$pdf->Cell(30,5,$calificacionsociales.":".califica($calificacionsociales),1,0,L,0);
$pdf->Cell(20,5,pti($ptisociales),1,0,C,0);
$pdf->Cell(20,5,ncc($nccsociales),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1sociales),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2sociales),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3sociales),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4sociales),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5sociales),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6sociales),1,1,C,0);



$pdf->Cell(60,5,'BIOLOGÍA',1,0,L,0);
$pdf->Cell(30,5,$calificacionbiologia.":".califica($calificacionbiologia),1,0,L,0);
$pdf->Cell(20,5,pti($ptibiologia),1,0,C,0);
$pdf->Cell(20,5,ncc($nccbiologia),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1biologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2biologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3biologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4biologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5biologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6biologia),1,1,C,0);



$pdf->Cell(60,5,'FÍSICA Y QUÍMICA',1,0,L,0);
$pdf->Cell(30,5,$calificacionfisica.":".califica($calificacionfisica),1,0,L,0);
$pdf->Cell(20,5,pti($ptifisica),1,0,C,0);
$pdf->Cell(20,5,ncc($nccfisica),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1fisica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2fisica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3fisica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4fisica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5fisica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6fisica),1,1,C,0);



$pdf->Cell(60,5,'EDUCACIÓN FÍSICA',1,0,L,0);
$pdf->Cell(30,5,$calificaciongimnasia.":".califica($calificaciongimnasia),1,0,L,0);
$pdf->Cell(20,5,pti($ptigimnasia),1,0,C,0);
$pdf->Cell(20,5,ncc($nccgimnasia),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1gimnasia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2gimnasia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3gimnasia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4gimnasia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5gimnasia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6gimnasia),1,1,C,0);



$pdf->Cell(60,5,'EDUCACIÓN PLÁSTICA',1,0,L,0);
$pdf->Cell(30,5,$calificacionplastica.":".califica($calificacionplastica),1,0,L,0);
$pdf->Cell(20,5,pti($ptiplastica),1,0,C,0);
$pdf->Cell(20,5,ncc($nccplastica),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1plastica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2plastica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3plastica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4plastica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5plastica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6plastica),1,1,C,0);



$pdf->Cell(60,5,'CULTURA CLÁSICA',1,0,L,0);
$pdf->Cell(30,5,$calificaciongriego.":".califica($calificaciongriego),1,0,L,0);
$pdf->Cell(20,5,pti($ptigriego),1,0,C,0);
$pdf->Cell(20,5,ncc($nccgriego),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1griego),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2griego),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3griego),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4griego),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5griego),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6griego),1,1,C,0);



$pdf->Cell(60,5,'MÚSICA',1,0,L,0);
$pdf->Cell(30,5,$calificacionmusica.":".califica($calificacionmusica),1,0,L,0);
$pdf->Cell(20,5,pti($ptimusica),1,0,C,0);
$pdf->Cell(20,5,ncc($nccmusica),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1musica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2musica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3musica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4musica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5musica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6musica),1,1,C,0);



$pdf->Cell(60,5,'TECNOLOGÍA',1,0,L,0);
$pdf->Cell(30,5,$calificaciontecnologia.":".califica($calificaciontecnologia),1,0,L,0);
$pdf->Cell(20,5,pti($ptitecnologia),1,0,C,0);
$pdf->Cell(20,5,ncc($ncctecnologia),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1tecnologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2tecnologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3tecnologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4tecnologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5tecnologia),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6tecnologia),1,1,C,0);



$pdf->Cell(60,5,'RELIGIÓN/ALTERNATIVA',1,0,L,0);
$pdf->Cell(30,5,$calificacionreligion.":".califica($calificacionreligion),1,0,L,0);
$pdf->Cell(20,5,pti($ptireligion),1,0,C,0);
$pdf->Cell(20,5,ncc($nccreligion),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1religion),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2religion),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3religion),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4religion),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5religion),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6religion),1,1,C,0);



$pdf->Cell(60,5,'INFORMÁTICA',1,0,L,0);
$pdf->Cell(30,5,$calificacionciudadania.":".califica($calificacionciudadania),1,0,L,0);
$pdf->Cell(20,5,pti($pticiudadania),1,0,C,0);
$pdf->Cell(20,5,ncc($nccciudadania),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1ciudadania),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2ciudadania),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3ciudadania),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4ciudadania),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5ciudadania),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6ciudadania),1,1,C,0);

$pdf->Cell(60,5,'ÉTICA',1,0,L,0);
$pdf->Cell(30,5,$calificacionetica.":".califica($calificacionetica),1,0,L,0);
$pdf->Cell(20,5,pti($ptietica),1,0,C,0);
$pdf->Cell(20,5,ncc($nccetica),1,0,'C',0);
$pdf->Cell(10,5,refuerzo($ref1etica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref2etica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref3etica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref4etica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref5etica),1,0,C,0);
$pdf->Cell(10,5,refuerzo($ref6etica),1,1,C,0);

$pdf->Ln(5);
$pdf->SetFont('Arial','',5);
$pdf->Multicell(180,5,"PTI: Plan de Trabajo Individual \n NCC: Nivel de Competencia Curricular",0); 
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,5,'OTROS DATOS DE INTERÉS',1,1,L,1);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(180,5,'RENDIMIENTO',1,1,L,1);
$pdf->SetFont('Arial','',8);
if ($obsrend1=="on"){
$obs1="El alumno/-a tiene mucho interés y trabaja con esfuerzo y motivación \n";
}else{$obs1='';}
if ($obsrend2=="on"){
$obs2="En general tiene interés y se esfuerza por sacar adelante sus estudios \n";
}else{$obs2='';}
if ($obsrend3=="on"){
$obs3="Aunque tiene interés y motivación podría esforzarse un poco más \n";
}else{$obs3='';}
if ($obsrend4=="on"){
$obs4="El rendimiento ha ido aumentando a lo largo del curso \n";
}else{$obs4='';}
if ($obsrend5=="on"){
$obs5="El rendimiento ha ido bajando a lo largo del curso \n";
}else{$obs5='';}
if($obsrend6=="on"){
$obs6="El alumno/-a no está nada motivado, no tiene interés y no se esfuerza para superar el curso \n";
}else{$obs6='';}
if ($obsrend7=="on"){
$obs7="Falta a clase mucho y eso repercute en su rendimiento \n";
}else{$obs7='';}
$observacionestexto=$obs1.$obs2.$obs3.$obs4.$obs5.$obs6.$obs7;
$pdf->Multicell(180,5,$observacionestexto,1); 
$pdf->Ln(5);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(180,5,'COMPORTAMIENTO',1,1,1,1);

$pdf->SetFont('Arial','',8);
if ($obscomp1=="on"){
$obse1="Muy buen comportamiento y actitud en clase \n";
}else{$obse1='';}
if ($obscomp2=="on"){
$obse2="Aunque es un poco hablador/-a, en general manifiesta buen comportamiento \n";
}else{$obse2='';}
if ($obscomp3=="on"){
$obse3="En general manifiesta buen comportamiento aunque en ocasiones es necesario llamarle la atención \n";
}else{$obse3='';}
if ($obscomp4=="on"){
$obse4="Aunque empezó mal su comportamiento ha ido mejorando progresivamente a lo largo del curso\n";
}else{$obse4='';}
if ($obscomp5=="on"){
$obse5="Su comportamiento ha ido empeorando progresivamente desde el comienzo del curso \n";
}else{$obse5='';}
if($obscomp6=="on"){
$obse6="Se le han abierto varios partes de incidencia a lo largo del curso \n";
}else{$obse6='';}
if ($obscomp7=="on"){
$obse7="Ha sido necesario expulsarle por mala conducta \n";
}else{$obse7='';}
if ($obscomp8=="on"){
$obse8="Se le ha abierto un expediente disciplinario \n";
}else{$obse8='';}
$observacionestexto2=$obse1.$obse2.$obse3.$obse4.$obse5.$obse6.$obse7.$obse8;
$pdf->Multicell(180,5,$observacionestexto2,1); 

$pdf->SetXY(40,220);
$pdf->Cell(20,5,'EL DIRECTOR/-A');

$pdf->SetXY(120,220);
$pdf->Cell(20,5,'EL TUTOR/-A',0);

$pdf->SetXY(40,230);
$pdf->Cell(40,15,'',1);

$pdf->SetXY(120,230);
$pdf->Cell(40,15,'',1);
$pdf->SetXY(60,250);
$pdf->Cell(150,5,$firma.', a '.fecha());

}}
$pdf->Output();
?>
