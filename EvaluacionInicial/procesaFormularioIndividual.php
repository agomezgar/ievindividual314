<?php
session_start();
   include("conectarse.php");
   $link=Conectarse();
   if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\">";}
   $clase=$_SESSION["nombregrupo"];
  $materia=$_POST["materia"];
   $profesor=$_SESSION["nombre"];
   $fecha= date('l jS \of F Y ');

    $result = mysql_query("SELECT alumno FROM matriculas WHERE grupo='$clase'",$link);
while($row = mysql_fetch_array($result)) {
    $idalumno=$row["alumno"];
$alumnado=mysql_query("SELECT * FROM alumnos WHERE alumno='$idalumno'",$link);
    while($row2=  mysql_fetch_array($alumnado)){
        $nombre=$row2["nombre"];
        $apellidos=$row2["apellidos"];
        $texto=$_POST[$idalumno];
        if ($texto!=''){
          
                      $sql = "INSERT INTO notasindividuales ( `idalumno`, `nombre`, `apellidos`, `grupo`, `profesor`, 
     `materia`, `texto`, `fecha`) VALUES ('$idalumno','$nombre','$apellidos',
         '$clase','$profesor','$materia','$texto','$fecha')";
      
   
 mysql_query($sql, $link) or die(mysql_error()); 
   
 mysql_free_result;
   }
        }
        }


   
echo "<meta http-equiv=\"refresh\" content=\"0;URL=gracias.php\">";
  



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
