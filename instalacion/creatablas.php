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
<<<<<<< HEAD
 * a la comunidad, pero SIN NINGUNA GARANTIA, ¡RECLAMACIONES, AL MAESTRO 
=======
 * a la comunidad, pero SIN NINGUNA GARANTIA, Â¡RECLAMACIONES, AL MAESTRO 
>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
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
<<<<<<< HEAD
=======

>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
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
<<<<<<< HEAD
`cp` varchar( 6 ) NOT NULL ,
`padre` text NOT NULL ,
`dnipadre` text NOT NULL ,
`madre` text NOT NULL ,
`dnimadre` text NOT NULL ,
`pais` text NOT NULL ,
`nacion` text NOT NULL ,
`a` varchar( 20 ) NOT NULL ,
`b` varchar( 20 ) NOT NULL ,
`c` varchar( 20 ) NOT NULL ,
`d` varchar( 20 ) NOT NULL ,
`e` varchar( 20 ) NOT NULL ,
`f` varchar( 20 ) NOT NULL ,
`g` varchar( 20 ) NOT NULL ,
`h` varchar( 20 ) NOT NULL ,
PRIMARY KEY ( `alumno` )
) ";
mysql_query($crealumnos,$link) or die ("ALGO FALLÓ
");
$creanotas="CREATE TABLE IF NOT EXISTS `notas` (
`MATRICULA` varchar( 7 ) DEFAULT NULL ,
`ANNO` int( 4 ) DEFAULT NULL ,
`CURSO` varchar( 52 ) DEFAULT NULL ,
`EVALUACION` varchar( 19 ) DEFAULT NULL ,
`SESION` varchar( 10 ) DEFAULT NULL ,
`MATERIA` varchar( 74 ) DEFAULT NULL ,
`CL_MATERIA` int( 5 ) DEFAULT NULL ,
`SUBGRUPO` varchar( 11 ) DEFAULT NULL ,
`NOTA` varchar( 16 ) DEFAULT NULL ,
`CODIGONOTA` int( 3 ) DEFAULT NULL ,
`OPCION` varchar( 36 ) DEFAULT NULL ,
`X_OFERTAMATRIG` int( 6 ) DEFAULT NULL ,
`X_CONVCENTRO` int( 5 ) DEFAULT NULL ,
`X_MATMATRICULA` int( 8 ) DEFAULT NULL
) 

";
mysql_query($creanotas,$link) or die ("ALGO FALLÓ AL CREAR LA TABLA DE NOTAS");
$creamatriculas="CREATE TABLE IF NOT EXISTS matriculas(
`alumno` varchar( 6 ) NOT NULL ,
=======
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
mysql_query($crealumnos,$link) or die ("ALGO FALLÃ“
");

$creamatriculas="CREATE TABLE IF NOT EXISTS matriculas(
`alumno` varchar( 6 ) NOT NULL ,
`apellidos` text NOT NULL ,
`nombre` text NOT NULL ,
>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
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
<<<<<<< HEAD
=======
`fecharesmatricula` text NOT NULL ,
>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
`numexpcentro` varchar( 5) NOT NULL ,

PRIMARY KEY ( `alumno` )
) ";
<<<<<<< HEAD
mysql_query($creamatriculas,$link) or die ("ALGO FALLÓ
");

=======
mysql_query($creamatriculas,$link) or die ("ALGO FALLÃ“
");

$creanotas="CREATE TABLE IF NOT EXISTS `notas` (
`MATRICULA` varchar( 7 ) DEFAULT NULL ,
`ANNO` int( 4 ) DEFAULT NULL ,
`CURSO` varchar( 52 ) DEFAULT NULL ,
`EVALUACION` varchar( 19 ) DEFAULT NULL ,
`SESION` varchar( 10 ) DEFAULT NULL ,
`MATERIA` varchar( 74 ) DEFAULT NULL ,
`CL_MATERIA` int( 5 ) DEFAULT NULL ,
`SUBGRUPO` varchar( 11 ) DEFAULT NULL ,
`NOTA` varchar( 16 ) DEFAULT NULL ,
`CODIGONOTA` int( 3 ) DEFAULT NULL ,
`OPCION` varchar( 36 ) DEFAULT NULL ,
`X_OFERTAMATRIG` int( 6 ) DEFAULT NULL ,
`X_CONVCENTRO` int( 5 ) DEFAULT NULL ,
`X_MATMATRICULA` int( 8 ) DEFAULT NULL
) 

";
mysql_query($creanotas,$link) or die ("ALGO FALLÃ“ AL CREAR LA TABLA DE NOTAS");


>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
	$tablainformes1="CREATE TABLE IF NOT EXISTS informeindividual(
`id` int( 6 ) NOT NULL ,
`grupo` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`alumno` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`curso` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`curso1rep` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`anyo1rep` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`curso2rep` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`anyo2rep` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`neg34` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`neg34areas` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`acneaesino` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`acneaefecha` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`acneaeareasasociadas` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`absentismosino` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`causasabsentismo` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`diversificacionsino` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`observacioneshistorial` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,


`calificacionlengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptilengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1lengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2lengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3lengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4lengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5lengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6lengua` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ncclengua` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacioningles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptiingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1ingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2ingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3ingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4ingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5ingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6ingles` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccingles` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionfrances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptifrances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1frances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2frances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3frances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4frances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5frances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6frances` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccfrances` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionmatematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptimatematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1matematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2matematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3matematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4matematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5matematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6matematicas` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccmatematicas` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,


`calificacionsociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptisociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1sociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2sociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3sociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4sociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5sociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6sociales` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccsociales` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionbiologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptibiologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1biologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2biologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3biologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4biologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5biologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6biologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccbiologia` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionfisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptifisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1fisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2fisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3fisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4fisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5fisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6fisica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccfisica` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificaciongimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptigimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1gimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2gimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3gimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4gimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5gimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6gimnasia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccgimnasia` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionplastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptiplastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1plastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2plastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3plastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4plastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5plastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6plastica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccplastica` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificaciongriego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptigriego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1griego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2griego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3griego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4griego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5griego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6griego` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccgriego` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionmusica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptimusica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1musica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2musica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3musica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4musica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5musica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6musica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccmusica` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificaciontecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptitecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1tecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2tecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3tecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4tecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5tecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6tecnologia` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ncctecnologia` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionreligion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ptireligion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1religion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2religion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3religion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4religion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5religion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6religion` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccreligion` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`calificacionciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`pticiudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1ciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2ciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3ciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4ciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5ciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6ciudadania` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccciudadania` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
<<<<<<< HEAD
`calificacionetica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
=======

`calificacionetica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
`ptietica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref1etica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref2etica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref3etica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref4etica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref5etica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`ref6etica` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`nccetica` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

`obsrend1` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend2` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend3` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend4` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend5` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend6` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend7` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp1` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp2` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp3` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp4` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp5` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp6` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp7` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp8` varchar( 2 ) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,

PRIMARY KEY ( `id` )
) ";
mysql_query($tablainformes1,$link);




$tablaobsrendimiento="CREATE TABLE IF NOT EXISTS tablaobsrendimiento(
`id` int( 2 ) NOT NULL auto_increment,
`obsrend1` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend2` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend3` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend4` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend5` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend6` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obsrend7` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
PRIMARY KEY ( `id` )
) ";
mysql_free_result;
mysql_query($tablaobsrendimiento,$link);


<<<<<<< HEAD
mysql_query("insert into tablaobsrendimiento(obsrend1,obsrend2,obsrend3,obsrend4,obsrend5,obsrend6,obsrend7) values ('El alumno/-a tiene mucho interes y trabaja con esfuerzo y motivacion','En general tiene interes y se esfuerza por sacar adelante sus estudios','Aunque tiene interes y motivación podría esforzarse un poco mas','El rendimiento ha ido aumentando a lo largo del curso','El rendimiento ha ido bajando a lo largo del curso','El alumno/-a no esta nada motivado, no tiene interes y no se esfuerza para superar el curso','Falta mucho a clase y eso repercute en su rendimiento')",$link);
=======
mysql_query("insert into tablaobsrendimiento(obsrend1,obsrend2,obsrend3,obsrend4,obsrend5,obsrend6,obsrend7) values ('El alumno/-a tiene mucho interes y trabaja con esfuerzo y motivacion','En general tiene interes y se esfuerza por sacar adelante sus estudios','Aunque tiene interes y motivaciÃ³n podrÃ­a esforzarse un poco mas','El rendimiento ha ido aumentando a lo largo del curso','El rendimiento ha ido bajando a lo largo del curso','El alumno/-a no esta nada motivado, no tiene interes y no se esfuerza para superar el curso','Falta mucho a clase y eso repercute en su rendimiento')",$link);
>>>>>>> 480b51ee08177c67223b0285bc7a9b8be282b380
mysql_free_result;



$tablaobscomportamiento="CREATE TABLE IF NOT EXISTS tablaobscomportamiento(
`id` int( 2 ) NOT NULL auto_increment,
`obscomp1` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp2` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp3` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp4` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp5` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp6` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp7` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
`obscomp8` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL ,
PRIMARY KEY ( `id` )
) ";
mysql_free_result;
mysql_query($tablaobscomportamiento,$link);


mysql_query("insert into tablaobscomportamiento(obscomp1,obscomp2,obscomp3,obscomp4,obscomp5,obscomp6,obscomp7,obscomp8) values ('Muy buen comportamiento y actitud en clase','Aunque es un poco hablador/-a, en general manifiesta buen comportamiento','En general manifiesta buen comortamiento aunque en ocasiones es necesario llamarle la atencion','Aunque empezo mal su comportamiento ha ido mejorando progresivamente a lo largo del curso','Su comportamiento ha ido empeorando progresivamente desde el comienzo del curso','Se le han abierto varios partes de incidencia a lo largo del curso','Ha sido necesario expulsarle por mala conducta','Se le ha abierto un expediente disciplinario')",$link);
mysql_free_result;


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
$contra2=md5($contra);
$usuario2=md5($usuario2);
mysql_query("insert into claves (nombre,contra) values ('$usuario2','$contra2')",$link);
mysql_free_result;
echo "<meta http-equiv=\"refresh\" content=\"0;URL=elige.php\">";
?>
