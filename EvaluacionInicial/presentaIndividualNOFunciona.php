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
   $listaAlumnado=array();
 $result = mysql_query("SELECT * FROM matriculas WHERE grupo='$grupo'",$link);
while($row = mysql_fetch_array($result)) {
    $idalumno=$row["alumno"];
   
     $nombreapellidos=mysql_query("SELECT * FROM alumnos WHERE alumno='$idalumno'",$link);
     while($averiguanombre=  mysql_fetch_array($nombreapellidos)){
       $nombre=$averiguanombre["nombre"];
    $apellidos=$averiguanombre["apellidos"];
   $nombreCompleto=$apellidos.", ".$nombre;
$listaAlumnado[$nombreCompleto]=$idalumno;
     }
}
     ksort($listaAlumnado);
/*
$notas=mysql_query("SELECT * FROM notasindividuales WHERE idalumno='$idalumno'",$link);


while($notasindividuales=  mysql_fetch_array($notas)){

 */
       $pdf->AddPage();
     $pdf->Image('logoies.jpg',10,10);
$pdf->SETXY(30,30);
     foreach($listaAlumnado as $nombreAlumno=>$matriculaAlumno)
     {
   
 $notas=mysql_query("SELECT * FROM notasindividuales WHERE idalumno='$matriculaAlumno'ORDER BY materia,fecha",$link);
 
   
  
while($notasindividuales=  mysql_fetch_array($notas)){
  
$texto='';
      $pdf->SetFont('Arial','B',16);
$pdf->Multicell(160,10,'ALUMNO: '.$nombreAlumno."\n",1,'C',0);
 $pdf->SetFont('Arial','',12);
  
    
    $texto=$texto."Materia: ";
         
    $texto=$texto.$notasindividuales["materia"]."\n";

     $texto=$texto.utf8_decode("Apreciación: ");
    
      $texto=$texto.$notasindividuales["texto"]."\n";
    
      
     
    $pdf->Multicell(160,10,  $texto,0,'L',0);
    
}

     }
     
     $file = basename(tempnam('.', 'tmp'));
rename($file, $file.'.pdf');
$file .= '.pdf';
//Guardar el PDF en un fichero
$pdf->Output($file, 'F');

//Redirección
header('Location: '.$file);

?>