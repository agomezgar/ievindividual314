<?php 
require ('fpdf.php');
require ("config.php");
   require("conectarse.php");
session_start();

  $link=Conectarse();
  $grupo=$_SESSION["nombregrupo"];
  $pdf = new FPDF();
/*




echo "trabajando... ";

echo $grupo;
";
;
*/
 $result = mysql_query("SELECT * FROM matriculas WHERE grupo='$grupo'",$link);
while($row = mysql_fetch_array($result)) {
    $idalumno=$row["alumno"];
     $pdf->AddPage();
     $nombreapellidos=mysql_query("SELECT * FROM alumnos WHERE alumno='$idalumno'",$link);
     while($averiguanombre=  mysql_fetch_array($nombreapellidos)){
       $nombre=$averiguanombre["nombre"];
    $apellidos=$averiguanombre["apellidos"];
    $pdf->SetFont('Arial','B',16);
$pdf->Multicell(160,5,'ALUMNO: '.$apellidos.', '.$nombre."\n",1,'C',0);
$notas=mysql_query("SELECT * FROM notasindividuales WHERE idalumno='$idalumno'",$link);
 

while($notasindividuales=  mysql_fetch_array($notas)){
    
    $texto="";
    $texto=$texto."Materia: ".$notasindividuales["materia"]."\n".
            utf8_decode("Apreciación: ").
            "\n".$notasindividuales["texto"]."\n Fecha: ".$notasindividuales["fecha"];
    $pdf->Multicell(160,5,  $texto,1,'L',0);
}
    
}

}
/*
//INICIAMOS INFORME

$pdf->AddPage();
$pdf->SETXY(10,10);
$pdf->SetFont('Arial','B',16);
$pdf->Multicell(160,5,utf8_decode('EVALUACIÓN INICIAL. GRUPO:').$grupo."\n",1,'C',0);
$pdf->Cell(80,10,utf8_decode('Número de informes: '.$numeroInformes));

//EL GRUPO CONOCE LAS NORMAS
 $datoConoceNormas=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND conocenormas='No'",$link);
 $noConoceNormas=  mysql_num_rows($datoConoceNormas);
$conoceNormas=$numeroInformes-$noConoceNormas;
$pdf->SetFont('Arial','B',12);
$textoConoceNormas="El grupo conoce las normas: "."\n Sí:".(($conoceNormas/$numeroInformes)*100)."% (".$conoceNormas." respuestas)"."\n"."No: ".(($noConoceNormas/$numeroInformes)*100)."% (".$noConoceNormas." respuestas)";
$pdf->SETXY(10,30);
$pdf->Multicell(160,5,  utf8_decode($textoConoceNormas),1,'L',0);

//EL GRUPO CUMPLE LAS NORMAS
 $datoCumpleNormas=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND respetanormas='No'",$link);
 $noCumpleNormas=  mysql_num_rows($datoCumpleNormas);
$cumpleNormas=$numeroInformes-$noCumpleNormas;
$textoCumpleNormas="El grupo cumple las normas: "."\n Sí:".(($cumpleNormas/$numeroInformes)*100)."% (".$cumpleNormas." respuestas)"."\n"."No: ".(($noCumpleNormas/$numeroInformes)*100)."% (".$noCumpleNormas." respuestas)";
$pdf->SETXY(10,45);
$pdf->Multicell(160,5,  utf8_decode($textoCumpleNormas),1,'L',0);


//EL GRUPO ES HOMOGENEO O HETEROGENEO
 $datoHomogeneo=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND homogeneo='homogeneo'",$link);
 $homogeneo=  mysql_num_rows($datoHomogeneo);
$heterogeneo=$numeroInformes-$homogeneo;
$textoHomogeneo="El grupo es: "."\n Homogéneo:".(($homogeneo/$numeroInformes)*100)."% (".$homogeneo." respuestas)"."\n"."Heterogéneo: ".(($heterogeneo/$numeroInformes)*100)."% (".$heterogeneo." respuestas)";
$pdf->SETXY(10,60);
$pdf->Multicell(160,5,  utf8_decode($textoHomogeneo),1,'L',0);


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

 $textoNivelAcademico="Nivel académico del grupo: "."\n Muy alto:".(($nivelAcademicoMuyAlto/$numeroInformes)*100).
        "% (".$nivelAcademicoMuyAlto." respuestas)"."\n".
        "Alto: ".(($nivelAcademicoAlto/$numeroInformes)*100)."% (".$nivelAcademicoAlto." respuestas)\n".
        "Medio: ".(($nivelAcademicoMedio/$numeroInformes)*100)."% (".$nivelAcademicoMedio." respuestas)\n".
        "Bajo: ".(($nivelAcademicoBajo/$numeroInformes)*100)."% (".$nivelAcademicoBajo." respuestas)\n".
        "Muy bajo: ".(($nivelAcademicoMuyBajo/$numeroInformes)*100)."% (".$nivelAcademicoMuyBajo." respuestas)\n";
$pdf->SETXY(10,75);
$pdf->Multicell(160,5,  utf8_decode($textoNivelAcademico),1,'L',0);

//CLIMA EN EL AULA
 $datoClimaAulaBueno=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND climaenaula='Bueno'",$link);
 $climaAulaBueno=  mysql_num_rows($datoClimaAulaBueno);
  $datoClimaAulaRegular=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND climaenaula='Regular'",$link);
 $climaAulaRegular=  mysql_num_rows($datoClimaAulaRegular);
   $datoClimaAulaMalo=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND climaenaula='Malo'",$link);
  $climaAulaMalo=  mysql_num_rows($datoClimaAulaMalo);
 $textoClimaAula="El clima en el aula es: "."\n Bueno:".(($climaAulaBueno/$numeroInformes)*100).
        "% (".$climaAulaBueno." respuestas)"."\n".
        "Regular: ".(($climaAulaRegular/$numeroInformes)*100)."% (".$climaAulaRegular." respuestas)\n".
        "Malo: ".(($climaAulaMalo/$numeroInformes)*100)."% (".$climaAulaMalo." respuestas)\n";
$pdf->SETXY(10,105);
$pdf->Multicell(160,5,  utf8_decode($textoClimaAula),1,'L',0);

//RESPETO DEL ALUMNADO HACIA EL PROFESOR
 $datoActitudAlumnoProfesorBuena=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudalumnoprofesor='Buena'",$link);
 $actitudAlumnoProfesorBuena=  mysql_num_rows($datoActitudAlumnoProfesorBuena);
 $datoActitudAlumnoProfesorRegular=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudalumnoprofesor='Regular'",$link);
 $actitudAlumnoProfesorRegular=  mysql_num_rows($datoActitudAlumnoProfesorRegular);
  $datoActitudAlumnoProfesorMala=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudalumnoprofesor='Mala'",$link);
 $actitudAlumnoProfesorMala=  mysql_num_rows($datoActitudAlumnoProfesorMala);
 $textoActitudAlumnoProfesor="La actitud del alumno hacia el profesor es: "."\n Buena:".(($actitudAlumnoProfesorBuena/$numeroInformes)*100).
        "% (".$actitudAlumnoProfesorBuena." respuestas)"."\n".
        "Regular: ".(($actitudAlumnoProfesorRegular/$numeroInformes)*100)."% (".$actitudAlumnoProfesorRegular." respuestas)\n".
        "Mala: ".(($actitudAlumnoProfesorMala/$numeroInformes)*100)."% (".$actitudAlumnoProfesorMala." respuestas)\n";
$pdf->SETXY(10,125);
$pdf->Multicell(160,5,  utf8_decode($textoActitudAlumnoProfesor),1,'L',0);

//ACTITUD ENTRE ALUMNOS
 $datoActitudAlumnoAlumnoBuena=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudentrealumnos='Buena'",$link);
 $actitudAlumnoAlumnoBuena=  mysql_num_rows($datoActitudAlumnoAlumnoBuena);
 $datoActitudAlumnoAlumnoRegular=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudentrealumnos='Regular'",$link);
 $actitudAlumnoAlumnoRegular=  mysql_num_rows($datoActitudAlumnoAlumnoRegular);
  $datoActitudAlumnoAlumnoMala=mysql_query("SELECT * FROM evaluaciongeneral WHERE grupo='$grupo' AND actitudentrealumnos='Mala'",$link);
 $actitudAlumnoAlumnoMala=  mysql_num_rows($datoActitudAlumnoAlumnoMala);
 $textoActitudAlumnoAlumno="La actitud del alumnado entre compañeros es: "."\n Buena:".(($actitudAlumnoAlumnoBuena/$numeroInformes)*100).
        "% (".$actitudAlumnoAlumnoBuena." respuestas)"."\n".
        "Regular: ".(($actitudAlumnoAlumnoRegular/$numeroInformes)*100)."% (".$actitudAlumnoAlumnoRegular." respuestas)\n".
        "Mala: ".(($actitudAlumnoAlumnoMala/$numeroInformes)*100)."% (".$actitudAlumnoAlumnoMala." respuestas)\n";
$pdf->SETXY(10,145);
$pdf->Multicell(160,5,  utf8_decode($textoActitudAlumnoAlumno),1,'L',0);
 * 
 */
$file = basename(tempnam('.', 'tmp'));
rename($file, $file.'.pdf');
$file .= '.pdf';
//Guardar el PDF en un fichero
$pdf->Output($file, 'F');

//Redirección
header('Location: '.$file);

?>