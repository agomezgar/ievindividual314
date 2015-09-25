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

   $buscaGrupo= mysql_query("SELECT * FROM gruposinf WHERE id=$clase",$link);

while($grupoSeleccionado = mysql_fetch_array($buscaGrupo)) {
    $nombreClase=$grupoSeleccionado["nombre"];
$_SESSION["nombregrupo"]=$nombreClase;
if (($_SESSION["tutoria"]==$nombreClase)||($_SESSION["tutoria"]==="administrador")){
    $_SESSION["tutor"]="true";
  //  echo "Eres tutor de este grupo";
}else{
    //echo "No eres tutor de este grupo";
    $_SESSION["tutor"]="false";
}
}
?>
        <title>Elija opci&oacute;n</title>

    </head>
    <body>
        <h1>Grupo elegido:
            <?php echo $_SESSION["nombregrupo"];
        ?>
        <p> Deseo: </h1>
                <table width="50%" border="0" align="center">
  <tr>
    <td><a href='formularioGeneral.php'>Realizar la evaluaci&oacute;n del grupo en general</a></td>
  
    <td><a href='presentaGeneral.php'>Ver los datos generales recopilados para este grupo</a></td>
        
  </tr>
       <?php if ($_SESSION["tutor"]=="true"){
         echo"<tr><td><a href='presentaIndividual.php'>Acceder a apreciaciones individuales de los alumnos</a></td></tr>";
}
?>
</table>
        <?php
        // put your code here
        ?>
    </body>
</html>
