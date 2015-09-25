<?php 
require ('fpdf.php');
require ("config.php");
   require("conectarse.php");
session_start();

  $link=Conectarse();
  $grupo=$_SESSION["nombregrupo"];
/*




echo "trabajando... ";

echo $grupo;
";
;
*/
 $result = mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo'",$link);

 $numeroInformes=  mysql_num_rows($result);

//INICIAMOS INFORME
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Image('logoies.jpg',10,10);
$pdf->SETXY(30,10);
$pdf->Multicell(140,15,utf8_decode('EVALUACIÓN INICIAL. GRUPO: ').$grupo."\n",0,'C',0);
$pdf->Cell(100,0,utf8_decode('Número de informes: '.$numeroInformes));

//EL GRUPO CONOCE LAS NORMAS
 $datoConoceNormas=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND conocenormas='No'",$link);
 $noConoceNormas=  mysql_num_rows($datoConoceNormas);
$conoceNormas=$numeroInformes-$noConoceNormas;
$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('El grupo conoce las normas: '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$textoConoceNormas="Sí:".round(($conoceNormas/$numeroInformes)*100,2)."% (".$conoceNormas." respuestas)";
$textoNoConoceNormas="No: ".round(($noConoceNormas/$numeroInformes)*100,2)."% (".$noConoceNormas." respuestas)";
$pdf->Cell(80,0,  utf8_decode($textoConoceNormas));

$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);

$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($conoceNormas/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoNoConoceNormas));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($noConoceNormas/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);
//$pdf->Multicell(160,5,  utf8_decode($textoConoceNormas),1,'L',0);
;
$pdf->Ln(5);
//EL GRUPO CUMPLE LAS NORMAS
 $datoCumpleNormas=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND respetanormas='No'",$link);
 $noCumpleNormas=  mysql_num_rows($datoCumpleNormas);
$cumpleNormas=$numeroInformes-$noCumpleNormas;
/*
$textoCumpleNormas="El grupo cumple las normas: "."\n Sí:".(($cumpleNormas/$numeroInformes)*100)."% (".$cumpleNormas." respuestas)"."\n"."No: ".(($noCumpleNormas/$numeroInformes)*100)."% (".$noCumpleNormas." respuestas)";
//$pdf->SETXY(10,45);
$pdf->Ln(5);
$pdf->Multicell(160,5,  utf8_decode($textoCumpleNormas),1,'L',0);
*/
$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('El grupo cumple las normas: '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$textoCumpleNormas="Sí:".round(($cumpleNormas/$numeroInformes)*100,2)."% (".$cumpleNormas." respuestas)";
$textoNoCumpleNormas="No: ".round(($noCumpleNormas/$numeroInformes)*100,2)."% (".$noCumpleNormas." respuestas)";
$pdf->Cell(80,0,  utf8_decode($textoCumpleNormas));

$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);

$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($cumpleNormas/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoNoCumpleNormas));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($noCumpleNormas/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);
//EL GRUPO ES HOMOGENEO O HETEROGENEO
 $datoHomogeneo=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND homogeneo='homogeneo'",$link);
 $homogeneo=  mysql_num_rows($datoHomogeneo);
$heterogeneo=$numeroInformes-$homogeneo;
/*
$textoHomogeneo="El grupo es: "."\n Homogéneo:".(($homogeneo/$numeroInformes)*100)."% (".$homogeneo." respuestas)"."\n"."Heterogéneo: ".(($heterogeneo/$numeroInformes)*100)."% (".$heterogeneo." respuestas)";
//$pdf->SETXY(10,60);
$pdf->Ln(5);
$pdf->Multicell(160,5,  utf8_decode($textoHomogeneo),1,'L',0);
*/
$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('El grupo es: '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$textoHomogeneo="Homogéneo :".round(($homogeneo/$numeroInformes)*100,2)."% (".$homogeneo." respuestas)";
$textoHeterogeneo="Heterogéneo: ".round(($heterogeneo/$numeroInformes)*100,2)."% (".$heterogeneo." respuestas)";
$pdf->Cell(80,0,  utf8_decode($textoHomogeneo));

$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);

$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($homogeneo/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoHeterogeneo));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($heterogeneo/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);

//NIVEL ACADEMICO DEL GRUPO
 $datoNivelAcademicoMuyAlto=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND nivelacademico='Muy alto'",$link);
 $nivelAcademicoMuyAlto=  mysql_num_rows($datoNivelAcademicoMuyAlto);
  $datoNivelAcademicoAlto=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND nivelacademico='Alto'",$link);
 $nivelAcademicoAlto=  mysql_num_rows($datoNivelAcademicoAlto);
   $datoNivelAcademicoMedio=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND nivelacademico='Medio'",$link);
 $nivelAcademicoMedio=  mysql_num_rows($datoNivelAcademicoMedio);
    $datoNivelAcademicoBajo=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND nivelacademico='Bajo'",$link);
 $nivelAcademicoBajo=  mysql_num_rows($datoNivelAcademicoBajo);
    $datoNivelAcademicoMuyBajo=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND nivelacademico='Muy bajo'",$link);
 $nivelAcademicoMuyBajo=  mysql_num_rows($datoNivelAcademicoMuyBajo);
/*
 $textoNivelAcademico="Nivel académico del grupo: "."\n Muy alto:".(($nivelAcademicoMuyAlto/$numeroInformes)*100).
        "% (".$nivelAcademicoMuyAlto." respuestas)"."\n".
        "Alto: ".(($nivelAcademicoAlto/$numeroInformes)*100)."% (".$nivelAcademicoAlto." respuestas)\n".
        "Medio: ".(($nivelAcademicoMedio/$numeroInformes)*100)."% (".$nivelAcademicoMedio." respuestas)\n".
        "Bajo: ".(($nivelAcademicoBajo/$numeroInformes)*100)."% (".$nivelAcademicoBajo." respuestas)\n".
        "Muy bajo: ".(($nivelAcademicoMuyBajo/$numeroInformes)*100)."% (".$nivelAcademicoMuyBajo." respuestas)\n";
//$pdf->SETXY(10,75);
$pdf->Ln(5);
 $pdf->Multicell(160,5,  utf8_decode($textoNivelAcademico),1,'L',0);
*/
 $pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('Nivel académico del grupo: '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$textoNivelMuyAlto="Muy alto:".round(($nivelAcademicoMuyAlto/$numeroInformes)*100,2)."% (".$nivelAcademicoMuyAlto." respuestas)";
$textoNivelAlto="Alto:".round(($nivelAcademicoAlto/$numeroInformes)*100,2)."% (".$nivelAcademicoAlto." respuestas)";
$textoNivelMedio="Medio:".round(($nivelAcademicoMedio/$numeroInformes)*100,2)."% (".$nivelAcademicoMedio." respuestas)";
$textoNivelBajo="Bajo:".round(($nivelAcademicoBajo/$numeroInformes)*100,2)."% (".$nivelAcademicoBajo." respuestas)";
$textoNivelMuyBajo="Muy bajo:".round(($nivelAcademicoMuyBajo/$numeroInformes)*100,2)."% (".$nivelAcademicoMuyBajo." respuestas)";


$pdf->Cell(80,0,  utf8_decode($textoNivelMuyAlto));

$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);

$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($nivelAcademicoMuyAlto/$numeroInformes)*100,3 ,FD);

$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoNivelAlto));
$pdf->SetFillColor(0,0,255);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($nivelAcademicoAlto/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoNivelMedio));
$pdf->SetFillColor(0,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($nivelAcademicoMedio/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoNivelBajo));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($nivelAcademicoBajo/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
$pdf->Cell(80,0,  utf8_decode($textoNivelMuyBajo));
$pdf->SetFillColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($nivelAcademicoMuyBajo/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
//CLIMA EN EL AULA
 $datoClimaAulaBueno=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND climaenaula='Bueno'",$link);
 $climaAulaBueno=  mysql_num_rows($datoClimaAulaBueno);
  $datoClimaAulaRegular=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND climaenaula='Regular'",$link);
 $climaAulaRegular=  mysql_num_rows($datoClimaAulaRegular);
   $datoClimaAulaMalo=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND climaenaula='Malo'",$link);
  $climaAulaMalo=  mysql_num_rows($datoClimaAulaMalo);
  $textoClimaBueno="Bueno:".round(($climaAulaBueno/$numeroInformes)*100,2)."% (".$climaAulaBueno." respuestas)";
$textoClimaRegular="Regular:".round(($climaAulaRegular/$numeroInformes)*100,2)."% (".$climaAulaRegular." respuestas)";
$textoClimaMalo="Malo:".round(($climaAulaMalo/$numeroInformes)*100,2)."% (".$climaAulaMalo." respuestas)";

 $pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('El clima en el aula es : '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
  /*
  $textoClimaAula="El clima en el aula es: "."\n Bueno:".(($climaAulaBueno/$numeroInformes)*100).
        "% (".$climaAulaBueno." respuestas)"."\n".
        "Regular: ".(($climaAulaRegular/$numeroInformes)*100)."% (".$climaAulaRegular." respuestas)\n".
        "Malo: ".(($climaAulaMalo/$numeroInformes)*100)."% (".$climaAulaMalo." respuestas)\n";
//$pdf->SETXY(10,105);
$pdf->Ln(5);
 $pdf->Multicell(160,5,  utf8_decode($textoClimaAula),1,'L',0);
*/
   $pdf->Cell(80,0,  utf8_decode($textoClimaBueno));
$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($climaAulaBueno/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
   $pdf->Cell(80,0,  utf8_decode($textoClimaRegular));
$pdf->SetFillColor(255,255,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($climaAulaRegular/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);   
   $pdf->Cell(80,0,  utf8_decode($textoClimaMalo));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($climaAulaMalo/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);

//RESPETO DEL ALUMNADO HACIA EL PROFESOR
 $datoActitudAlumnoProfesorBuena=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudalumnoprofesor='Buena'",$link);
 $actitudAlumnoProfesorBuena=  mysql_num_rows($datoActitudAlumnoProfesorBuena);
 $datoActitudAlumnoProfesorRegular=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudalumnoprofesor='Regular'",$link);
 $actitudAlumnoProfesorRegular=  mysql_num_rows($datoActitudAlumnoProfesorRegular);
  $datoActitudAlumnoProfesorMala=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudalumnoprofesor='Mala'",$link);
 $actitudAlumnoProfesorMala=  mysql_num_rows($datoActitudAlumnoProfesorMala);
 
 /*
 $textoActitudAlumnoProfesor="La actitud del alumno hacia el profesor es: "."\n Buena:".(($actitudAlumnoProfesorBuena/$numeroInformes)*100).
        "% (".$actitudAlumnoProfesorBuena." respuestas)"."\n".
        "Regular: ".(($actitudAlumnoProfesorRegular/$numeroInformes)*100)."% (".$actitudAlumnoProfesorRegular." respuestas)\n".
        "Mala: ".(($actitudAlumnoProfesorMala/$numeroInformes)*100)."% (".$actitudAlumnoProfesorMala." respuestas)\n";
//$pdf->SETXY(10,125);
$pdf->Ln(5);
 $pdf->Multicell(160,5,  utf8_decode($textoActitudAlumnoProfesor),1,'L',0);
*/
 
  $pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('La actitud del alumno hacia el profesor es: '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
   $textoActitudAlumnoProfesorBuena="Buena:".round(($actitudAlumnoProfesorBuena/$numeroInformes)*100,2)."% (".$actitudAlumnoProfesorBuena." respuestas)";
$textoActitudAlumnoProfesorRegular="Regular:".round(($actitudAlumnoProfesorRegular/$numeroInformes)*100,2)."% (".$actitudAlumnoProfesorRegular." respuestas)";
$textoActitudAlumnoProfesorMala="Mala:".round(($actitudAlumnoProfesorMala/$numeroInformes)*100,2)."% (".$actitudAlumnoProfesorMala." respuestas)";

   $pdf->Cell(80,0,  utf8_decode($textoActitudAlumnoProfesorBuena));
$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($actitudAlumnoProfesorBuena/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
   $pdf->Cell(80,0,  utf8_decode($textoActitudAlumnoProfesorRegular));
$pdf->SetFillColor(255,255,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($actitudAlumnoProfesorRegular/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);   
   $pdf->Cell(80,0,  utf8_decode($textoActitudAlumnoProfesorMala));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($actitudAlumnoProfesorMala/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
//ACTITUD ENTRE ALUMNOS
 $datoActitudAlumnoAlumnoBuena=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudentrealumnos='Buena'",$link);
 $actitudAlumnoAlumnoBuena=  mysql_num_rows($datoActitudAlumnoAlumnoBuena);
 $datoActitudAlumnoAlumnoRegular=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudentrealumnos='Regular'",$link);
 $actitudAlumnoAlumnoRegular=  mysql_num_rows($datoActitudAlumnoAlumnoRegular);
  $datoActitudAlumnoAlumnoMala=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudentrealumnos='Mala'",$link);
 $actitudAlumnoAlumnoMala=  mysql_num_rows($datoActitudAlumnoAlumnoMala);
 $pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('La actitud del alumnado hacia sus compañeros es: '));
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
   $textoActitudAlumnoAlumnoBuena="Buena:".round(($actitudAlumnoAlumnoBuena/$numeroInformes)*100,2)."% (".$actitudAlumnoProfesorBuena." respuestas)";
$textoActitudAlumnolumnoRegular="Regular:".round(($actitudAlumnoAlumnoRegular/$numeroInformes)*100,2)."% (".$actitudAlumnoProfesorRegular." respuestas)";
$textoActitudAlumnoAlumnoMala="Mala:".round(($actitudAlumnoAlumnoMala/$numeroInformes)*100,2)."% (".$actitudAlumnoProfesorMala." respuestas)";

 /*
 $textoActitudAlumnoAlumno="La actitud del alumnado entre compañeros es: "."\n Buena:".(($actitudAlumnoAlumnoBuena/$numeroInformes)*100).
        "% (".$actitudAlumnoAlumnoBuena." respuestas)"."\n".
        "Regular: ".(($actitudAlumnoAlumnoRegular/$numeroInformes)*100)."% (".$actitudAlumnoAlumnoRegular." respuestas)\n".
        "Mala: ".(($actitudAlumnoAlumnoMala/$numeroInformes)*100)."% (".$actitudAlumnoAlumnoMala." respuestas)\n";
//$pdf->SETXY(10,145);
  * 
  */
/*
 $pdf->Ln(5);
 
 $pdf->Multicell(160,5,  utf8_decode($textoActitudAlumnoAlumno),1,'L',0);
 * */
   $pdf->Cell(80,0,  utf8_decode($textoActitudAlumnoAlumnoBuena));
$pdf->SetFillColor(0,255,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($actitudAlumnoAlumnoBuena/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);
   $pdf->Cell(80,0,  utf8_decode($textoActitudAlumnoAlumnoRegular));
$pdf->SetFillColor(255,255,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($actitudAlumnoAlumnoRegular/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5);   
   $pdf->Cell(80,0,  utf8_decode($textoActitudAlumnoAlumnoMala));
$pdf->SetFillColor(255,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect($pdf->GetX(),$pdf->GetY()-2, ($actitudAlumnoAlumnoMala/$numeroInformes)*100,3 ,FD);
$pdf->Ln(5); 

$file = basename(tempnam('.', 'tmp'));
rename($file, $file.'.pdf');
$file .= '.pdf';
//Guardar el PDF en un fichero
$pdf->Output($file, 'F');

//Redirección
header('Location: '.$file);

?>