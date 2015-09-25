<?php
session_start();
   include("conectarse.php");
   $link=Conectarse();
   if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\">";}
   $grupo=$_SESSION["nombregrupo"];
   $materia=$_POST["materia"];
   $nombre=$_SESSION["nombre"];
   $fecha= date('l jS \of F Y ');
   $conoceNormas=$_POST['conoceNormas'];
   $respetaNormas=$_POST['respetaNormas'];
   $homogeneo=$_POST['homoHetero'];
   $nivelAcademico=$_POST['nivelAcademico'];
   $climaenAula=$_POST['climaAula'];
   $actitudAlumnoProfesor=$_POST['actitudAlumnoProfesor'];
   $actitudAlumnoAlumno=$_POST['actitudAlumnoAlumno'];
   $otros=$_POST['otros'];
   $comprueba=  mysql_query("SELECT * FROM evaluaciongeneral WHERE (grupo='$grupo' AND materia='$materia')",$link);
   while ($consulta=  mysql_fetch_array($comprueba)){
       $evaluacionExiste=$consulta["id"];
       
   }
   if (isset($evaluacionExiste)){
      //die("Ya se habia grabado un informe de evaluacion para este grupo y esta materia...");

      
       mysql_query("UPDATE evaluaciongeneral SET grupo='$grupo',profesor='$nombre',materia='$materia',fecha='$fecha',conocenormas='$conoceNormas',
        respetanormas='$respetaNormas',homogeneo='$homogeneo',nivelacademico='$nivelAcademico',climaenaula='$climaenAula',
            actitudalumnoprofesor='$actitudAlumnoProfesor',actitudentrealumnos='$actitudAlumnoAlumno',
                otros='$otros' WHERE id='$evaluacionExiste'",$link) or die ("Error para id: ".$evaluacionExiste.mysql_error());
mysql_free_result;
   
        
   }else{
       echo "Procediendo a grabar un informe de evaluacion...";
        $sql = "INSERT INTO evaluaciongeneral ( `grupo`, `profesor`, `materia`, `fecha`, `conocenormas`, 
     `respetanormas`, `homogeneo`, `nivelacademico`, `climaenaula`, 
     `actitudalumnoprofesor`, `actitudentrealumnos`, `otros`) VALUES ('$grupo','$nombre','$materia',
         '$fecha','$conoceNormas','$respetaNormas','$homogeneo','$nivelAcademico','$climaenAula','$actitudAlumnoProfesor',
             '$actitudAlumnoAlumno','$otros')";
      
   
 mysql_query($sql, $link) or die(mysql_error()); 
   
 mysql_free_result;
   }

echo "<meta http-equiv=\"refresh\" content=\"0;URL=gracias.php\">";
  
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
