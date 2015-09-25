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
<?php session_start();
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";die;}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DATOS DE ALUMNO</title>
<script>function enviar(){
document.claves.submit();
}
</script>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td>
      <div align="center">
        <input type="button" name="Submit2" value="GRABAR PTI" onClick="window.location.href='grabargrupo.php'"/>
      </div>
    </td>
    <td><div align="center">
    </div></td>
    <td><div align="center">
      <input type="button" name="Submit23" value="CONSULTAR PTI DE ALUMNO INDIVIDUAL" onClick="window.location.href='ptiporalumnogrupo.php'"/>
    </div></td>
    <td><div align="center">
      <input type="button" name="Submit24" value="CONSULTAR PTI POR GRUPOS" onClick="window.location.href='ptiporgrupogrupo.php'"/>
    </div></td>
    <td><div align="center">
      <input type="button" name="Submit25" value="CONSULTAR PTI POR MATERIAS" onClick="window.location.href='ptipormateriamateria.php'"/>
    </div></td>
  </tr>
</table>
<p><img src="../LOGO.jpg" width="100%" height="115" />
<form id="form1" name="claves" method="post" action="ptiporalumnopdf.php">
 
    <p>
      <?php
   include("conectarse.php");
   $link=Conectarse();

  $grupo=$_POST['grupo'];



   ?>
      ALUMNO:
      <select name="alumno" id="alumno" onChange="enviar()">
	  <option value=""></option>
        <?php
$ordenando=mysql_query("SELECT * FROM alumnos ORDER BY apellidos");
while($ordenado=mysql_fetch_array($ordenando)){


 $result = mysql_query("SELECT alumno FROM matriculas WHERE grupo='$grupo'",$link);

while($row = mysql_fetch_array($result)) {
if ($row[alumno]==$ordenado[alumno]){
$nene=mysql_query("SELECT * FROM alumnos WHERE alumno=$row[alumno] ORDER BY apellidos");
while($nene2=mysql_fetch_array($nene)){
?>
        <option value="<?php echo $nene2['alumno'];?>"><?php echo $nene2['apellidos'].','.$nene2['nombre']; ?></option>
      
  <?php 
  }}}}
  mysql_free_result;
?>
      </select>
</p>
<input name="grupo" type="hidden" value="<?php echo $grupo;?>" />

</p>

</form>
</body>
</html>
