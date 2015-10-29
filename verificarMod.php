<?php
    if(isset($_GET['tabla']) && isset($_GET['cod']) && isset($_GET['dat1']) && isset($_GET['dat2']) && isset($_GET['dat3'])){
        $tabla = $_GET['tabla'];
        $par1 = $_GET['cod'];
        $par2 = $_GET['dat1'];
        $par3 = $_GET['dat2'];
        $par4 = $_GET['dat3'];
    }else{
        die("<h1>Parametros no enviados</h1>");
    }
    $enlace = mysql_connect('localhost', 'root', '', 'universidad')
    or die('No se pudo conectar: ' . mysql_error());
    if($tabla == "profesor") {
        $consulta = "UPDATE profesor Set NOMBREPROFESOR='$par2',DEPARTAMENTO='$par3', ESPECIALIDAD='$par4' WHERE CODIGOPROFESOR='$par1';";
        if(mysql_query($consulta, $enlace)){
            echo"<h1>La tabla a sido modificada exitosamente</h1>";
        }else{
            echo"<h1>Error al modificar la base datos</h1>";
        }
    }elseif($tabla == "estudiante") {
        $consulta = "UPDATE $tabla Set NOMBREEESTUDIANTEE='$par2',ANO='$par3', CARRERA='$par4' WHERE CODIGOESTUDIANTE ='$par1';";
        if (mysql_query($consulta,$enlace)) {
            echo "<h1>La tabla a sido modificada exitosamente</h1>";
        } else {
            echo "<h1>Error al modificar la base datos".$enlace->error."</h1>";
        }
    }elseif($tabla == "ensena") {
        $consulta = "UPDATE $tabla Set RAMO='$par3', HORA='$par4' WHERE CODIGOPROFESOR ='$par1' AND CODIGOESTUDIANTE='$par2';";
        if ($enlace->query($consulta ===true)) {
            echo "<h1>La tabla a sido modificada exitosamente</h1>";
        } else {
            echo "<h1>Error al modificar la base datos".$enlace->error."</h1>";
        }
    }
?>