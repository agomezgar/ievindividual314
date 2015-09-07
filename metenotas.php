<?php
$nene=mysql_query("SELECT * FROM alumnos WHERE alumno=$row[alumno] ORDER BY apellidos");
while($nene2=mysql_fetch_array($nene)){
?>
        <option value="<?php echo $nene2['alumno'];?>"><?php echo $nene2['apellidos'].','.$nene2['nombre']; ?></option>
      
  <?php 
  }}
  mysql_free_result;
?>
  </select>
