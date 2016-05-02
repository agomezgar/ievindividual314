<?php
   include("conectarse.php");
   include ("../config.php");
header("Content-type: text/html; charset=ISO-8859-1");
   $link=Conectarse();
mysql_set_charset('utf8');
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

$grupos="gruposinf";
$creargrupos="CREATE TABLE IF NOT EXISTS $grupos(
id int(2)unsigned NOT NULL auto_increment,
`nombre` text NOT NULL ,
PRIMARY KEY ( `id` )
)";
mysql_query($creargrupos,$link);
mysql_free_result;
$claves="claves";
$crearclaves="
CREATE TABLE IF NOT EXISTS `claves` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `contra` text NOT NULL,
  `tutoria` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
)"  ;

mysql_query($crearclaves,$link) or die("NO HE PODIDO CREAR LA TABLA DE CLAVES");
$usuario2=md5($usuario);
$contra2=md5($contra);
mysql_query("insert into claves (nombre,contra,tutoria) values ('$usuario2','$contra2','administrador')",$link)or die("No he podido introducir nombre y clave de administrador");
mysql_free_result;


$creargrupos="CREATE TABLE IF NOT EXISTS gruposinf(
id int(2)unsigned NOT NULL auto_increment,
`nombre` text NOT NULL ,
PRIMARY KEY ( `id` )
)";
mysql_query($creargrupos,$link)or die("NO HE PODIDO CREAR LA TABLA DE GRUPOS");
mysql_free_result;
$crearMaterias="CREATE TABLE IF NOT EXISTS materias (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `materia` text NOT NULL,
  PRIMARY KEY (`id`)
)"  ;
mysql_query($crearMaterias,$link)or die ("NO HE PODIDO CREAR LA TABLA DE MATERIAS");

$llenarMaterias="INSERT INTO `materias` (`id`, `nombre`, `materia`) VALUES
(1, 'Educación Física', 'EDFISICA'),
(2, 'Educación Plástica', 'DIBUJO'),
(3, 'Tecnología', 'TECNOLOGIA'),
(4, 'Matemáticas', 'MATEMATICAS'),
(5, 'Francés', 'FRANCES'),
(6, 'Lengua y Literatura', 'LENGUA'),
(7, 'Cultura Clásica', 'CCLASICA'),
(8, 'Inglés', 'INGLES'),
(9, 'Geografía e Historia', 'SOCIALES'),
(10, 'Ciencias Naturales', 'NATURALES'),
(11, 'Religión', 'RELIGION'),
(12, 'Filosofía', 'FILOSOFIA'),
(13, 'Educación para la Ciudadanía', 'CIUDADANIA'),
(14, 'Música', 'MUSICAC'),
(15, 'ASL', '5844'),
(16, 'ACT', '5289'),
(17, 'Educación Ético-cívica', '8212'),
(18, 'Matemáticas A', '4494'),
(19, 'Matemáticas B', '1457'),
(20, 'INFORMATICA', '8377'),
(21, 'TALLER ARTÍSTICO MUSICAL', '5688'),
(22, 'Latín', '4226'),
(23, 'Física y Química', '1722');
";
mysql_query($llenarMaterias,$link)or die ("No he podido rellenar la tabla de materias");
mysql_free_result;
$crearEvaluacionGeneral="CREATE TABLE IF NOT EXISTS `evaluaciongeneral` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(15) NOT NULL,
  `profesor` varchar(20) NOT NULL,
  `materia` varchar(30) NOT NULL,
  `fecha` text DEFAULT NULL,
  `conocenormas` varchar(15) NOT NULL,
  `respetanormas` varchar(15) NOT NULL,
  `homogeneo` varchar(15) NOT NULL,
  `nivelacademico` varchar(15) NOT NULL,
  `climaenaula` varchar(15) NOT NULL,
  `actitudalumnoprofesor` varchar(15) NOT NULL,
  `actitudentrealumnos` varchar(15) NOT NULL,
  `otros` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
)";
mysql_query($crearEvaluacionGeneral,$link)or die ("NO HE PODIDO CREAR LA TABLA DE EVALUACION GENERAL");
mysql_free_result;
$crearNotasIndividuales="CREATE TABLE IF NOT EXISTS `notasindividuales` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `idalumno` int(6) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `materia` varchar(50) DEFAULT NULL,
  `texto` text,
  `fecha` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ";
mysql_query($crearNotasIndividuales,$link)or die ("NO HE PODIDO CREAR LA TABLA DE NOTAS INDIVIDUALES");
mysql_free_result;
echo "<meta http-equiv=\"refresh\" content=\"0;URL=elige.php\">";
?>
