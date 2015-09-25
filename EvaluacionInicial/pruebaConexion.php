<?php
session_start();
// start session.

        $_SESSION["identificado"] = "SI";
    $_SESSION["username"] = "profesor"; 
 
    header("location: seleccionar.php");

    echo " No estás dentro de la aplicaci&oacute;n";
?>