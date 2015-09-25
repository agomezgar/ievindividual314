<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <?php 
session_start();
   require("conectarse.php");
   $link=Conectarse();
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\">";}
$clase=$_POST["grupo"];
echo $clase."<p>";
   $buscaGrupo= mysql_query("SELECT * FROM gruposinf WHERE id=$clase",$link);

while($grupoSeleccionado = mysql_fetch_array($buscaGrupo)) {
    $nombreClase=$grupoSeleccionado["nombre"];

}
?>
<script type="text/javascript">
    function verificar(form){
    if (document.forms[0].elements['materia'].value==='') {
        alert('Necesita introducir una materia');
        return false;
    }
        if (document.forms[0].elements['conoceNormas'].value==='') {
        alert('¿Considera que el grupo conoce las normas?');
        return false;
    }
        if (document.forms[0].elements['respetaNormas'].value==='') {
        alert('¿Considera que el grupo respeta las normas?');
        return false;
    }
        if (document.forms[0].elements['homoHetero'].value==='') {
        alert('No ha indicado si considera al grupo homogéneo o heterogéneo');
        return false;
    }
        if (document.forms[0].elements['nivelAcademico'].value==='') {
        alert('Indique el nivel academico que considera en el grupo...');
        return false;
    }
        if (document.forms[0].elements['climaAula'].value==='') {
        alert('Indique el clima que detecta en el aula');
        return false;
    }
        if (document.forms[0].elements['actitudAlumnoProfesor'].value==='') {
        alert('Indique la actitud del grupo hacia Vd.');
        return false;
    }
        if (document.forms[0].elements['actitudAlumnoAlumno'].value==='') {
        alert('Indique la actitud que los alumnos mantienen entre ellos');
        return false;
    }
    }
</script>
        <title>Grupo a evaluar: <?php echo $nombreClase; ?></title>
    </head>
    <body>
          <form onsubmit= "return verificar(this);" id="formularioGeneral" name="formularioGeneral" method="post" action="procesaFormularioGeneral.php">


        <?php
   /*     		
 echo "nombre: ".$_SESSION["nombre"];
   
     echo "Eres tutor de: ".$_SESSION["tutoria"];
   if ($nombreClase==$_SESSION["tutoria"]){
       echo "Eres tutor de este grupo";
       $_SESSION["tutor"]=true;
   }else{
       echo "No eres tutor de este grupo";
       $_SESSION["tutor"]=false;
   }
        echo $_SESSION["tutor"];
    
    */
        ?>
    
       <h1>Grupo: <?php echo $_SESSION["nombregrupo"]; ?></h1>
  
        <table width="50%" border="1" align="center">
  <tr>
    <td><div align="center">
      <p><strong>CURSO: <?php echo $curso;?></strong></p>
      <p><strong><?php echo $nombreClase;?></strong></p>
      <p><strong>Datos generales del grupo</strong></p>
      <?php if ($_SESSION["tutor"]==true){
          echo"<p><strong>Eres tutor de este grupo. Tienes privilegios
              especiales</strong></p>";
      }
          ?>

     
    </td>
  </tr>
        </table>
       <table width="50%" border="1" align="center">
      <tr><td><strong>Materia: </strong></td><td>
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
  </select>
    </td></tr>


<tr><td><strong>Conoce normas b&aacute;sicas: </strong></td><td><select name="conoceNormas">
<option value="">Seleccione s&iacute; o no</option>
<option>S&iacute;</option>
<option>No</option>
</select></td></tr>
<tr><td><strong>Respeta normas b&aacute;sicas: </strong></td><td><select name="respetaNormas">
<option value="">Seleccione s&iacute; o no</option>
<option>S&iacute;</option>
<option>No</option>
</select></td></tr>
<tr><td><strong>HOMOGENEIDAD/HETEROGENEIDAD DEL GRUPO: </strong></td><td><select name="homoHetero">
<option value="">Seleccione una opci&oacute;n</option>
<option value="homogeneo">El grupo es HOMOG&Eacute;NEO</option>
<option value="heterogeneo">El grupo es HETEROG&Eacute;NEO</option>
</select></td></tr>
<tr><td><strong>Nivel acad&eacute;mico general apreciado en el grupo: </strong></td><td><select name="nivelAcademico">
<option value="">Seleccione una opci&oacute;n</option>
<option>Muy alto</option>
<option>Alto</option>
<option>Medio</option>
<option>Bajo</option>
<option>Muy bajo</option>
</select></td></tr>
<tr><td><strong>El clima en el aula es: </strong></td><td><select name="climaAula">
<option value="">Seleccione una opci&oacute;n</option>
<option>Bueno</option>
<option>Regular</option>
<option>Malo</option>
</select></td></tr>
<tr><td><strong>La actitud del alumnado hacia  el profesor/asignatura es: </strong></td><td><select name="actitudAlumnoProfesor">
<option value="">Seleccione una opci&oacute;n</option>
<option>Buena</option>
<option>Regular</option>
<option>Mala</option>
</select></td></tr>
<tr><td><strong>La actitud entre los alumnos es: </strong></td><td><select name="actitudAlumnoAlumno">
<option value="">Seleccione una opci&oacute;n</option>
<option>Buena</option>
<option>Regular</option>
<option>Mala</option>
</select></td></tr>

</table>
  
     <p align="center">  
     <input type="submit" value="Grabar datos generales" >
     </p>
     <p align="center">
<a href='formularioIndividual.php'>Pincha aqu&iacute; para a&ntilde;adir anotaciones individuales sobre alguno o varios alumnos.</a></td></tr>

</p>
    </body>
</html>
