<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
       <script type="text/javascript">
    function verificar(form){
    if (document.forms[0].elements['materia'].value=='') {
        alert('Necesita introducir una materia');
        return false;
    }
  
    }
</script>
    <?php 
session_start();
   require("conectarse.php");
   $link=Conectarse();
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\">";}
$clase=$_SESSION["nombregrupo"];
//echo $clase."<p>";

?>

        <title>Apreciaciones individuales sobre el alumnado de <?php echo $clase; ?></title>
    </head>
    <body>
          <form onsubmit= "return verificar(this);"id="formularioIndividual" name="formularioIndividual" method="post" action="procesaFormularioIndividual.php">


        <?php
        		
// echo "nombre: ".$_SESSION["nombre"];
   if ($_SESSION["tutoria"]==="no"){
   echo "No eres tutor de ning&uacute;n grupo.";
   $_SESSION["tutor"]=false;
   }
 else{
   if ($clase==$_SESSION["tutoria"]){
       echo "Eres tutor de este grupo";
       $_SESSION["tutor"]=true;
   }else{
       echo "No eres tutor de este grupo";
       $_SESSION["tutor"]=false;
   }
 }
      //  echo $_SESSION["tutor"];
        ?>
        <h1>Grupo: <?php echo $_SESSION["nombregrupo"]; ?></h1>
        <table width="50%" border="1" align="center">
  <tr>
    <td><div align="center">
      <p><strong>CURSO: <?php echo $curso;?></strong></p>
      <p><strong><?php echo $clase;?></strong></p>
      <p><strong>Datos generales del grupo</strong></p>
      <p><strong><strong>Materia: </strong>
 <select name="materia" id="materia" >
  <option value=""> </option>

        <?php 
		
   $result = mysql_query("SELECT * FROM materias order by nombre",$link);

while($row = mysql_fetch_array($result)) {
?>
        <option value="<?php echo $row['materia'];?>"><?php echo $row['nombre']; ?></option>
      
  <?php 
  }
  mysql_free_result;
?>
  </select></strong></p>
      <?php if ($_SESSION["tutor"]==true){
          echo"<p><strong>Eres tutor de este grupo. Tienes privilegios
              especiales</strong></p>";
      }
          ?>

     
    </td>
  </tr>
   
        </table>
        <table width="50%" border="1" align="center">
     
<?php
//Recorremos la tabla de matriculas quedándonas con las de los alumnos del grupo
 $result2 = mysql_query("SELECT alumno FROM matriculas WHERE grupo='$clase'",$link);
//Creo un array llamado $listaAlumnado de tipo clave (nombre)=>valor (matricula)
 $listaAlumnado=array();

while($row = mysql_fetch_array($result2)) {
    $alumno=$row["alumno"];
    //Recorremos la tabla de alumnos con las matrículas que hemos seleccionado
    //para quedarnos con sus nombres y apellidos
$alumnado=mysql_query("SELECT * FROM alumnos WHERE alumno='$alumno'",$link);
    
while($row2=  mysql_fetch_array($alumnado)){
//Insertamos en el array clave/valor nombre completo y número de matrícula
    $nombreCompleto=$row2["apellidos"].", ".$row2["nombre"];
    $listaAlumnado[$nombreCompleto]=$alumno;
    }

}
    ksort($listaAlumnado);
    




    
foreach($listaAlumnado as $alumnoActual=>$matriculaActual){
   
       echo "<tr><td>".$alumnoActual."</td><td><textarea name='$matriculaActual' cols='60%' rows='3' id='$matriculaActual'></textarea></td></tr>";
    
       
}
     
    ?>

    
       </table>

</p>
   <p align="center">  
     <input type="submit" value="Grabar datos individuales" >
     </p>
    </form>
    </body>
</html>
