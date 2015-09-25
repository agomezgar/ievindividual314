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
require('fpdf.php');
include("../config.php");
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
$grupo=$_POST['grupo'];
$alumno=$_POST['nombrealumno'];
$dni=$_POST['dni'];
$domicilio=$_POST['domicilio'];
$fechanacimiento=$_POST['fechanacimiento'];
$m1=$_POST['m1'];
$m2=$_POST['m2'];
$m3=$_POST['m3'];
$m4=$_POST['m4'];
$m5=$_POST['m5'];
$m6=$_POST['m6'];
$m7=$_POST['m7'];
$m8=$_POST['m8'];
$ob=$_POST['ob'];
$link=Conectarse();
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
if ($grupo=='1esoa'){$grupobien='1º ESO A';}
if ($grupo=='1esob'){$grupobien='1º ESO B';}
if ($grupo=='1esoc'){$grupobien='1º ESO C';}
if ($grupo=='2esoa'){$grupobien='2º ESO A';}
if ($grupo=='2esob'){$grupobien='2º ESO B';}
if ($grupo=='2esoc'){$grupobien='2º ESO C';}
if ($grupo=='3esoa'){$grupobien='3º ESO A';}
if ($grupo=='3esob'){$grupobien='3º ESO B';}
if ($grupo=='3esoc'){$grupobien='3º ESO C';}
if ($grupo=='3diver'){$grupobien='3º ESO DIVERSIFICACIÓN';}
if ($grupo=='4esoa'){$grupobien='4º ESO A';}
if ($grupo=='4esob'){$grupobien='4º ESO B';}
if ($grupo=='4esoc'){$grupobien='4º ESO C';}
if ($grupo=='4esod'){$grupobien='4º ESO D';}
if ($grupo=='4diver'){$grupobien='4º ESO DIVERSIFICACIÓN';}
$encabezamiento='CURSO 2007/08'."\n".$grupo."\n".'INFORME DE LA PRIMERA EVALUACIÓN';
class PDF extends FPDF
{
//Cabecera de página
function Header()
{
$alumno=$_POST['nombrealumno'];
    //Logo
    $this->Image('logoclm.jpg',10,8,33);
    //Arial bold 15
    $this->SetFont('Arial','B',12);
    //Movernos a la derecha
    $this->Cell(50);
    //Título
	$this->SetFillColor(150,150,150);
    $this->Cell(130,10,'ALUMNO/-A:'.$alumno,0,0,'',1);
    //Salto de línea
    $this->Ln(20);
}

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
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('logoclm.jpg',10,10);

$pdf->SetLineWidth(1);
$pdf->Cell(50,10,'');
$pdf->SetFillColor(150,150,150);
$pdf->Multicell(120,10,$encabezamiento,1,'C',1,1);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,5,'A. GRADO DE CONSECUCIÓN DE OBJETIVOS Y COMPETENCIAS BÁSICAS.',1,'C',1,1);
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Multicell(180,5,'En función de las calificaciones recogidas en el boletín de notas que acompaña a este informe se considerará el siguiente baremo:'."\n".'·Calificación de SOBRESALIENTE y NOTABLE: ha superado ampliamente los objetivos y competencias básicas según los criterios de evaluación programados.'."\n".'·Calificación de BIEN y SUFICIENTE: ha superado suficientemente los objetivos y competencias básicas según los criterios de evaluación programados.'."\n".'·Calificación de INSUFICIENTE: no ha superado los objetivos y competencias básicas según los criterios de evaluación programados');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,5,'B. MEDIDAS DE AMPLIACIÓN Y REFUERZO',1,'C',1,1);
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
if ($m1==1) {$pdf->Cell(180,5,$item1,0,1);}
if ($m2==1) {$pdf->Cell(180,5,$item2,0,1);}
if ($m3==1) {$pdf->Cell(180,5,$item3,0,1);}
if ($m4==1) {$pdf->Cell(180,5,$item4,0,1);}
if ($m5==1) {$pdf->Cell(180,5,$item5,0,1);}
if ($m6==1) {$pdf->Cell(180,5,$item6,0,1);}
if ($m7==1) {$pdf->Cell(180,5,$item7,0,1);}
if (!($m1==1|$m2==1|$m3==1|$m4==1|$m5==1|$m6==1|$m6==1|$m7==1)) {$pdf->Cell(180,10,'La junta de evaluación no ha considerado necesarias medidas de ampliación y refuerzo',0,1);}
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,5,'OTRAS MEDIDAS DE AMPLIACIÓN Y REFUERZO',0,1);
$pdf->SetFont('Arial','',10);
if ($m8=='') {$pdf->Cell(180,5,'No se consideran necesarias otras medidas de ampliación y refuerzo',0,1);}else{
$pdf->Multicell(180,5,$m8,0,1);}
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Multicell(180,5,'C. INFORMACIÓN COMPLEMENTARIA SOBRE LOS OBJETIVOS, CONTENIDOS Y CRITERIOS DE EVALUACIÓN DESARROLLADOS EN EL TRIMESTRE',1,1,1);
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Multicell(180,5,'La programación de objetivos, contenidos y criterios de evaluación trabajados en el trimestre, en cada una de las materias, están a disposición de las familias en la secretaría del centro, en tutoría, en la página web del instituto, en los tablones de información del IES...');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180,5,'OBSERVACIONES',0,1);
$pdf->SetFont('Arial','',10);
if ($ob=='') {$pdf->Cell(180,5,'No hay observaciones',0,1);}else{
$pdf->Multicell(180,5,$ob,0,1);}
$pdf->Ln(15);
$pdf->Cell(120,5);
$pdf->Cell(60,5,'El tutor/-a:____________________________');
$pdf-> Output();



      ?>
