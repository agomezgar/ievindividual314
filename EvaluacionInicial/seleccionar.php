<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php 
session_start();
if (!isset ($_SESSION['identificado'])){echo "error; me has querido engañar";echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\">";}
?>
<html>
<head>
<title>SELECCIONAR</title>

</head>

<body>
<?php
//echo $_SESSION["tutoria"];
//echo $_SESSION["nombre"];

?>
    <h1><p align="center">SELECCIONE GRUPO A EVALUAR</p></h1>
<form id="form1" name="form1" method="post" action="elige.php">

    <label>Grupo:
 <select name="grupo" id="grupo" >
  <option value=""> </option>
  
        <?php 
		   require("conectarse.php");
   $link=Conectarse();

   $result = mysql_query("SELECT * FROM gruposinf order by nombre",$link);

while($row = mysql_fetch_array($result)) {
?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['nombre']; ?></option>
      
  <?php 
  }
  mysql_free_result;
?>
  </select>
    </label>
  </p>
  <p>
    <label>
    <input type="submit" name="Submit" value="ENVIAR" />
    </label>
  </p>
</form>
</body>
</html>
