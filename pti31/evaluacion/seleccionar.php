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
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\">";}
?>
<html>
<head>
<title>¿Qué necesitas?</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p><img src="logo.jpg" width="100%" height="115"></p>
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
<p>&nbsp;</p>
<p><a href="../evaluacion1/evaluacion/grupoasignaturatodo.php"></a></p>
<p>&nbsp;</p>
</body>
</html>
