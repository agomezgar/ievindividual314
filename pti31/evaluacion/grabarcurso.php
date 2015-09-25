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


      <?php
   require("conectarse.php");
   $link=Conectarse();

  $grupo=$_POST['grupo'];
$alumno=$_POST['alumno'];
$materia=$_POST['materia'];

   ?>

      <select name="CURSO" id="CURSO" onChange="validarcurso()">
 
	
         <option value=""></option>
         <option value="PRIMEROSEC">PRIMERO DE SECUNDARIA</option> 
         <option value="SEGUNDOSEC">SEGUNDO DE SECUNDARIA</option> 
         <option value="TERCEROSEC">TERCERO DE SECUNDARIA</option> 
	 <option value="CUARTOSEC">CUARTO DE SECUNDARIA</option>	
<option value="PCPI">PCPI</option>
 <option value="PRIMEROPRIM">PRIMERO DE PRIMARIA</option>	
 <option value="SEGUNDOPRIM">SEGUNDO DE PRIMARIA</option>
 <option value="TERCEROPRIM">TERCERO DE PRIMARIA</option>
 <option value="CUARTOPRIM">CUARTO DE PRIMARIA</option>
 <option value="QUINTOPRIM">QUINTO DE PRIMARIA</option>
 <option value="SEXTOPRIM">SEXTO DE PRIMARIA</option>
       </select>


