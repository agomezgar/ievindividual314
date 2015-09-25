<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="procesaClaves.php">
  <label>USUARIO:
  <input name="usuario" type="text" id="usuario" />
  </label>
  <p>
      <label>CONTRASE&Ntilde;A:
    <input name="contra" type="password" id="contra" />
    </label>
  </p>
      <p>
          <label>TUTOR&Iacute;A:
 <select name="tutoria" id="tutoria" >
  <option value=""> </option>
  <option value="no">Sin tutor&iacute;a</option>
  <option value="administrador">Orientaci&oacute;n</option>
        <?php 
		   require("conectarse.php");
   $link=Conectarse();

   $result = mysql_query("SELECT * FROM gruposinf order by nombre",$link);

while($row = mysql_fetch_array($result)) {
?>
        <option value="<?php echo $row['nombre'];?>"><?php echo $row['nombre']; ?></option>
      
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