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
<html>
 <head>
  <script language="JavaScript">

   function abreSinNavegacion(){
    open('seleccionar.php', '', 'location=no,menubar=no,status=no,toolbar=yes,resize=yes,scrollbars=yes,width=800,height=600');

   }


  </script>
 </head>
 <body onLoad="abreSinNavegacion()">
 <?php
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
 ?>
 </body>
</html> 
