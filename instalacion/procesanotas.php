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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
   include("conectarse.php");
   $link=Conectarse();

function devuelve_nota($notaobtenida){
	switch ($notaobtenida){
		case "Insuficiente-1":
		return 1;
		break;
			case "Insuficiente-2":
		return 2;
		break;
			case "Insuficiente-3":
		return 3;
		break;
			case "Insuficiente-4":
		return 4;
		break;
			case "Suficiente-5":
		return 5;
		break;
			case "Bien-6":
		return 6;
		break;
			case "Notable-7":
		return 7;
		break;
			case "Notable-8":
		return 8;
		break;
			case "Sobresaliente-9":
		return 9;
		break;
			case "Sobresaliente-10":
		return 10;
		break;
			default:
			return "NO";
			
			
	}
}
//copiamos el archivo a la carpeta temporal
  //    Script Que copia el archivo temporal subido al servidor en un directorio.
$tipo = $_FILES['tablacsv']['type'];

//    Definimos Directorio donde se guarda el archivo
$dir = '../archivos/';

mysql_query("TRUNCATE TABLE notas",$link) or die (mysql_error());

if (!copy($_FILES['tablacsv']['tmp_name'], $dir.$_FILES['tablacsv']['name']))
echo '<script> alert("'.$id_error_upload.'");</script>';

//una vez transferido, lo abrimos e insertamos en la base de datos la información
//abro el archivo
move_uploaded_file($_FILES['tablacsv']['tmp_name'],$dir.$_FILES['tablacsv']['name']);
$arch=$dir.$_FILES['tablacsv']['name'];

	$carga="LOAD DATA LOCAL INFILE '$arch' REPLACE INTO TABLE notas FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\r\n' IGNORE 1 LINES";
mysql_query($carga,$link) or die (mysql_error());

$matriculasaseleccionar= mysql_query("SELECT * FROM matriculas WHERE estudios=".'"'."4º de ESO".'"',$link)or die (mysql_error());

while($row=mysql_fetch_array($matriculasaseleccionar)){
	$matricula=$row['matricula'];
	$alumno=$row['alumno'];

	echo $matricula."\r\n";
	echo $alumno;
	//$compruebocadena="SELECT * FROM notas WHERE MATRICULA=$matricula AND EVALUACION=".'"'."Ordinaria".'"';
	//echo $compruebocadena;
$notaaseleccionarlengua= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Lengua castellana y literatura' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarlengua)){
		$notalengua=devuelve_nota($row['NOTA']);
		
	echo "Nota en Lengua: ".$notalengua."\n";
}if (mysql_num_rows($notaaseleccionarlengua)==0){$notalengua="NO";}
$notaaseleccionaringles= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Inglés' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionaringles)){
		$notaingles=devuelve_nota($row['NOTA']);
	
	echo "Nota en Inglés: ".$notaingles."\n";
}
if (mysql_num_rows($notaaseleccionaringles)==0){$notaingles="NO";}
$notaaseleccionarfrances= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Francés(Segundo Idioma)' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarfrances)){
		$notafrances=devuelve_nota($row['NOTA']);
	
	echo "Nota en Francés: ".$notafrances."\n";
	
}
if (mysql_num_rows($notaaseleccionarfrances)==0){$notafrances="NO";}
		$notaaseleccionarmatematicas= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND (MATERIA='Matemáticas A' OR MATERIA='Matemáticas B') AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarmatematicas)){
		$notamatematicas=devuelve_nota($row['NOTA']);
		
	echo "Nota en Matemáticas (A o B): ".$notamatematicas."\n";
}
if (mysql_num_rows($notaaseleccionarmatematicas)==0){$notamatematicas="NO";}
	$notaaseleccionarhistoria= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Ciencias Sociales, Geografía e Historia' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarhistoria)){
		$notahistoria=devuelve_nota($row['NOTA']);
		
	echo "Nota en Ciencias Sociales: ".$notahistoria."\n";
}
if (mysql_num_rows($notaaseleccionarhistoria)==0){$notahistoria="NO";}
		$notaaseleccionarbiologia= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Biología y Geología' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarbiologia)){
		$notabiologia=devuelve_nota($row['NOTA']);
	
	echo "Nota en Biología y Geología: ".$notabiologia."\n";
}
if (mysql_num_rows($notaaseleccionarbiologia)==0){$notabiologia="NO";}
		$notaaseleccionarfisica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Física y Química' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarfisica)){
		$notafisica=devuelve_nota($row['NOTA']);
		
	echo "Nota en Física y Química: ".$notafisica."\n";
}
if (mysql_num_rows($notaaseleccionarfisica)==0){$notafisica="NO";}

		$notaaseleccionareducacionfisica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Educación Física' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionareducacionfisica)){
		$notaeducacionfisica=devuelve_nota($row['NOTA']);
		
	echo "Nota en Educación Física: ".$notaeducacionfisica."\n";
}
if (mysql_num_rows($notaaseleccionareducacionfisica)==0){$notaeducacionfisica="NO";}
		$notaaseleccionarplastica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Educación Plástica y Visual' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarplastica)){
		$notaplastica=devuelve_nota($row['NOTA']);
		
	echo "Nota en Educación Plástica: ".$notaplastica."\n";
}
if (mysql_num_rows($notaaseleccionarplastica)==0){$notaplastica="NO";}
		$notaaseleccionarculturaclasica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Cultura Clásica' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarculturaclasica)){
		$notaculturaclasica=devuelve_nota($row['NOTA']);

	echo "Nota en Cultura Clásica: ".$notaculturaclasica."\n";
}
if (mysql_num_rows($notaaseleccionarculturaclasica)==0){$notaculturaclasica="NO";}
		$notaaseleccionarmusica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Música' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarmusica)){
		$notamusica=$row['NOTA'];
		
	echo "Nota en Música: ".$notamusica."\n";
}
if (mysql_num_rows($notaaseleccionarmusica)==0){$notamusica="NO";}
		$notaaseleccionartecnologia= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Tecnología' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionartecnologia)){
		$notatecnologia=devuelve_nota($row['NOTA']);
		
	echo "Nota en Tecnología: ".$notatecnologia."\n";
}
if (mysql_num_rows($notaaseleccionartecnologia)==0){$notatecnologia="NO";}
		$notaaseleccionarreligion= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Religión Católica' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarreligion)){
		$notareligion=devuelve_nota($row['NOTA']);
		
	echo "Nota en Religión Católica: ".$notareligion."\n";
}
if (mysql_num_rows($notaaseleccionarreligion)==0){$notareligion="NO";}
		$notaaseleccionarinformatica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Informática' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionarinformatica)){
	
		$notainformatica=devuelve_nota($row['NOTA']);
		
	echo "Nota en Informática: ".$notainformatica."\n";
	
}
if (mysql_num_rows($notaaseleccionarinformatica)==0){$notainformatica="NO";}

		$notaaseleccionaretica= mysql_query("SELECT * FROM notas WHERE MATRICULA=$matricula  AND MATERIA='Educación ético-cívica' AND EVALUACION=".'"'."Ordinaria".'"',$link)or die (mysql_error());
	while ($row=mysql_fetch_array($notaaseleccionaretica)){
		$notaetica=devuelve_nota($row['NOTA']);
	
	echo "Nota en Ética: ".$notaetica."\n";
}
if (mysql_num_rows($notaaseleccionaretica)==0){$notaetica="NO";}
$buscainformes=mysql_query("SELECT * FROM informeindividual WHERE id=$alumno",$link)or die (mysql_errno());

while($comprueba= mysql_fetch_array($buscainformes)) {

	$d=$comprueba['id'];

}
if (!isset($d)){echo "No hay informe grabado para el alumno: ".$alumno; 
mysql_query("insert into informeindividual(id,calificacionlengua,calificacioningles,calificacionfrances,calificacionmatematicas,calificacionsociales,calificacionbiologia,calificacionfisica,calificaciongimnasia,calificacionplastica,calificaciongriego,calificacionmusica,calificaciontecnologia,calificacionreligion,calificacionciudadania,calificacionetica)values('$alumno','$notalengua','$notaingles','$notafrances','$notamatematicas','$notahistoria','$notabiologia','$notafisica','$notaeducacionfisica','$notaplastica','$notaculturaclasica','$notamusica','$notatecnologia','$notareligion','$notainformatica','$notaetica')",$link)or die (mysql_error());
mysql_free_result;}
if (isset($d)){echo "Hay informe grabado para el alumno: ".$alumno;
mysql_query("UPDATE informeindividual SET calificacionlengua='$notalengua',calificacioningles='$notaingles',calificacionfrances='$notafrances',calificacionmatematicas='$notamatematicas',calificacionsociales='$notahistoria',calificacionbiologia='$notabiologia',calificacionfisica='$notafisica',calificaciongimnasia='$notaeducacionfisica',calificacionplastica='$notaplastica',calificaciongriego='$notaculturaclasica',calificacionmusica='$notamusica',calificaciontecnologia='$notatecnologia',calificacionreligion='$notareligion',calificacionciudadania='$notainformatica',calificacionetica='$notaetica' WHERE id ='$alumno'",$link) or die (mysql_error());
mysql_free_result;
}


mysql_free_result($comprueba);
}


/*
	   $gruposinstituto = mysql_query("SELECT * FROM matriculas ",$link);

while($row = mysql_fetch_array($gruposinstituto)) {
$grupoclase=$row['grupo'];
$compruebagrupo=mysql_query("SELECT * FROM gruposinf WHERE nombre='$grupoclase'");
if (mysql_num_rows($compruebagrupo)==0){


mysql_query("insert into gruposinf (nombre) values ('$grupoclase')",$link);}
	*/
//echo "<meta http-equiv=\"refresh\" content=\"0;URL=yaesta.php\">";
	



?>

</body>
</html>
