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
   include("conectarse.php");
   include ("../config.php");


   $link=Conectarse();


$crealumnos="CREATE TABLE IF NOT EXISTS alumnos(
`alumno` varchar( 6 ) NOT NULL ,
`apellidos` text NOT NULL ,
`nombre` text NOT NULL ,
`sexo` text NOT NULL ,
`dni` varchar( 8 ) NOT NULL ,
`nie` varchar( 8 ) NOT NULL ,
`fecha` text NOT NULL ,
`locnac` text NOT NULL ,
`provnac` text NOT NULL ,
`correspondencia` text NOT NULL ,

`dom` text NOT NULL ,
`loc` text NOT NULL ,
`prov` text NOT NULL ,
`tf` text NOT NULL ,
`movil` text NOT NULL ,
`cp` varchar( 6 ) NOT NULL ,
`apellidospadre` text NOT NULL ,
`dnipadre` text NOT NULL ,
`apellidosmadre` text NOT NULL ,
`dnimadre` text NOT NULL ,
`pais` text NOT NULL ,
`nacion` text NOT NULL ,
`emailalumno` varchar( 20 ) NOT NULL ,
`emailtutor2` varchar( 20 ) NOT NULL ,
`emailtutor1` varchar( 20 ) NOT NULL ,
`tftutor1` varchar( 20 ) NOT NULL ,
`tftutor2` varchar( 20 ) NOT NULL ,
`moviltutor1` varchar( 20 ) NOT NULL ,
`moviltutor2` varchar( 20 ) NOT NULL ,
`apellido1` text NOT NULL,
`apellido2` text NOT NULL,
`tipodom` varchar(20) NOT NULL,
`ntutor1` text NOT NULL,
`ntutor2` text NOT NULL,
PRIMARY KEY ( `alumno` )
) ";
mysql_query($crealumnos,$link) or die ("ALGO FALLÓ
");

$creamatriculas="CREATE TABLE IF NOT EXISTS matriculas(
`alumno` varchar( 6 ) NOT NULL ,
`apellidos` text NOT NULL ,
`nombre` text NOT NULL ,
`matricula` varchar( 8 ) NOT NULL ,
`etapa` varchar( 4 ) NOT NULL ,
`anno` varchar( 4 ) NOT NULL ,
`tipo` varchar( 2 ) NOT NULL ,
`estudios` text NOT NULL ,
`grupo` text NOT NULL ,
`repetidor` text NOT NULL ,
`fechamatricula` text NOT NULL ,
`centro` varchar( 10 ) NOT NULL ,
`procedencia` varchar( 10 ) NOT NULL ,
`estadomatricula` text NOT NULL ,
`fecharesmatricula` text NOT NULL ,
`numexpcentro` varchar( 5) NOT NULL ,

PRIMARY KEY ( `alumno` )
) ";
mysql_query($creamatriculas,$link) or die ("ALGO FALLÓ
");

$tablapti="CREATE TABLE IF NOT EXISTS pti(
 `ORDEN` INT( 7 ) NOT NULL AUTO_INCREMENT ,
 `id` TEXT NOT NULL  ,
`idalumno` INT(7) NOT NULL,
`NOMBRE` TEXT NOT NULL,
`CURSO` TEXT NOT NULL ,
`TUTOR` TEXT NOT NULL ,
`MATERIA` TEXT NOT NULL ,
`CALIFICACION` INT( 2 ) NOT NULL ,
`PROFESOR` TEXT NOT NULL ,
`ACNEE` VARCHAR( 2 ) NOT NULL ,
`OBJETOR` VARCHAR( 2 ) NOT NULL ,
`ACNEAE` VARCHAR( 2 ) NOT NULL ,
`DIVER` VARCHAR( 2 ) NOT NULL ,
`ABSEN` VARCHAR( 2 ) NOT NULL ,
`TARDE` VARCHAR( 2 ) NOT NULL ,
`INTERC` VARCHAR( 2 ) NOT NULL ,
`VAGO` VARCHAR( 2 ) NOT NULL ,
`DIFICULTADES` VARCHAR( 2 ) NOT NULL ,
`OTRO` TEXT NOT NULL ,
`ACTIVIDADES` TEXT NOT NULL ,
`rec1` VARCHAR( 2 ) NOT NULL ,
`rec2` VARCHAR( 2 ) NOT NULL ,
`rec3` VARCHAR( 2 ) NOT NULL ,
`rec4` VARCHAR( 2 ) NOT NULL ,
`rec5` VARCHAR( 2 ) NOT NULL ,
`rec6` VARCHAR( 2 ) NOT NULL ,
`rec7` VARCHAR( 2 ) NOT NULL ,
`rec8` VARCHAR( 2 ) NOT NULL ,
`rec9` VARCHAR( 2 ) NOT NULL ,
`rec10` VARCHAR( 2 ) NOT NULL ,
`rec11` VARCHAR( 2 ) NOT NULL ,
`rec12` VARCHAR( 2 ) NOT NULL ,
`rec13` VARCHAR( 2 ) NOT NULL ,
`rec14` VARCHAR( 2 ) NOT NULL ,
`rec15` VARCHAR( 2 ) NOT NULL ,
`rec16` VARCHAR( 2 ) NOT NULL ,
`rec17` VARCHAR( 2 ) NOT NULL ,
`rec18` VARCHAR( 2 ) NOT NULL ,
`rec19` VARCHAR( 2 ) NOT NULL ,
`rec20` VARCHAR( 2 ) NOT NULL ,
`evc1` TEXT NOT NULL ,
`evc2` TEXT NOT NULL ,
`evc3` TEXT NOT NULL ,
`evc4` TEXT NOT NULL ,
`evc5` TEXT NOT NULL ,
`evc6` TEXT NOT NULL ,
`evc7` TEXT NOT NULL ,
`evc8` TEXT NOT NULL ,
`evc9` TEXT NOT NULL ,
`evc10` TEXT NOT NULL ,
`evc11` TEXT NOT NULL ,
`evc12` TEXT NOT NULL ,
`evc13` TEXT NOT NULL ,
`evc14` TEXT NOT NULL ,
`evc15` TEXT NOT NULL ,
`evc16` TEXT NOT NULL ,
`evc17` TEXT NOT NULL ,
`evc18` TEXT NOT NULL ,
`evc19` TEXT NOT NULL ,
`evc20` TEXT NOT NULL ,
`COMP1` VARCHAR( 2 ) NOT NULL ,
`COMP2` VARCHAR( 2 ) NOT NULL ,
`COMP3` VARCHAR( 2 ) NOT NULL ,
`COMP4` VARCHAR( 2 ) NOT NULL ,
`COMP5` VARCHAR( 2 ) NOT NULL ,
`COMP6` VARCHAR( 2 ) NOT NULL ,
`COMP7` VARCHAR( 2 ) NOT NULL ,
`COMP8` VARCHAR( 2 ) NOT NULL ,
`COMP9` VARCHAR( 2 ) NOT NULL ,
`CALIFICAPTI` INT( 2 ) NOT NULL ,
`OBSERVACIONES` TEXT NOT NULL ,

PRIMARY KEY ( `ORDEN` ) )";
mysql_query($tablapti,$link);
$tablamaterias="CREATE TABLE IF NOT EXISTS materias(
 `id` INT( 2 ) NOT NULL AUTO_INCREMENT ,
`nombre` TEXT NOT NULL,
 `materia` TEXT NOT NULL  ,
PRIMARY KEY ( `id` ) )";
$vaciamaterias="TRUNCATE TABLE  materias";
mysql_query($vaciamaterias,$link);
mysql_query($tablamaterias,$link);
	mysql_query("insert into materias(nombre,materia)values('Educación Física','EDFISICA'),('Educación Plástica','DIBUJO'),('Tecnología','TECNOLOGIA'),('Matemáticas','MATEMATICAS'),('Francés','FRANCES'),('Lengua y Literatura','LENGUA'),('Cultura Clásica','CCLASICA'),('Inglés','INGLES'),('Geografía e Historia','SOCIALES'),('Ciencias Naturales','NATURALES'),('Religión','RELIGION'),('Filosofía','FILOSOFIA'),('Educación para la Ciudadanía','CIUDADANIA'),('Música','MUSICAC')",$link)or die (mysql_error());
$grupos="gruposinf";
$creargrupos="CREATE TABLE IF NOT EXISTS $grupos(
id int(2)unsigned NOT NULL auto_increment,
`nombre` text NOT NULL ,
PRIMARY KEY ( `id` )
)";
mysql_query($creargrupos,$link);
mysql_free_result;
$claves="claves";
$crearclaves="CREATE TABLE IF NOT EXISTS $claves(
id int(2)unsigned NOT NULL auto_increment,
`nombre` text NOT NULL ,`contra` text NOT NULL,
PRIMARY KEY ( `id` )
)";
mysql_query($crearclaves,$link);
$usuario2=md5($usuario);
$contra2=md5($contra);
mysql_query("insert into claves (nombre,contra) values ('$usuario2','$contra2')",$link);
mysql_free_result;
echo "<meta http-equiv=\"refresh\" content=\"0;URL=elige.php\">";
?>
