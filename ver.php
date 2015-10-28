<?php
	if (isset($_GET['tabla'])) {
		$tabla = $_GET['tabla'];	
	}else{
		die("<h1>No se han enviado parámetros</h1>");
	}
	$enlace = mysql_connect('localhost', 'root', '')
    	or die('No se pudo conectar: ' . mysql_error());
   	mysql_select_db('universidad') or die('No se pudo seleccionar la base de datos');	
	if ($tabla == "profesor") {
		$consulta = "SELECT * FROM profesor;";
		$resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
?>
	<table border="1" style="background-color: white;">
		<thead>
			<tr>
				<th>Codigo Docente</th>
				<th>Nombre Docente</th>
				<th>Departamento</th>
				<th>Especialidad</th>
			</tr>
		</thead>
		<tbody>
<?php
		while ($linea = mysql_fetch_array($resultado)) {
			$codigo = $linea['CODIGOPROFESOR'];
			$nombre = $linea['NOMBREPROFESOR'];
			$dpto = $linea['DEPARTAMENTO'];
			$espec = $linea['ESPECIALIDAD'];
	    	echo "\t<tr>\n";
	        echo "\t\t<td>$codigo</td>\n";
	        echo "\t\t<td>$nombre</td>\n";
    	    echo "\t\t<td>$dpto</td>\n";
    	     echo "\t\t<td>$espec</td>\n";
		    echo "\t</tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
	}else if($tabla == "estudiante"){
		$consulta = "SELECT * FROM estudiante;";
		$resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
?>
	<table border="1" style="background-color: white;">
		<thead>
			<tr>
				<th>Codigo Alumno</th>
				<th>Nombre Alumno</th>
				<th>Carrera</th>
				<th>A&#241;o</th>
			</tr>
		</thead>
		<tbody>
<?php
		while ($linea = mysql_fetch_array($resultado)) {
			$codigo = $linea['CODIGOESTUDIANTE'];
			$nombre = $linea['NOMBREESTUDIANTE'];
			$carrera = $linea['CARRERA'];
			$ano = $linea['ANO'];
	    	echo "\t<tr>\n";
	        echo "\t\t<td>$codigo</td>\n";
	        echo "\t\t<td>$nombre</td>\n";
    	    echo "\t\t<td>$carrera</td>\n";
    	     echo "\t\t<td>$ano</td>\n";
		    echo "\t</tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
	}else if($tabla == "ensena"){
		$consulta = "SELECT p.NOMBREPROFESOR, a.NOMBREESTUDIANTE, e.RAMO, e.HORAS
					FROM ensena e 
					LEFT JOIN profesor p ON e.CODIGOPROFESOR = p.CODIGOPROFESOR
					LEFT JOIN estudiante a ON e.CODIGOESTUDIANTE = a.CODIGOESTUDIANTE";
		$resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
?>
	<table border="1" style="background-color: white;">
		<thead>
			<tr>
				<th>Nombre Profesor</th>
				<th>Nombre Alumno</th>
				<th>Ramo</th>
				<th>Horas Semanales</th>
			</tr>
		</thead>
		<tbody>
<?php
		while ($linea = mysql_fetch_array($resultado)) {
			$profesor = $linea['NOMBREPROFESOR'];
			$estudiante = $linea['NOMBREESTUDIANTE'];
			$ramo = $linea['RAMO'];
			$hora = $linea['HORAS'];
	    	echo "\t<tr>\n";
	        echo "\t\t<td>$profesor</td>\n";
	        echo "\t\t<td>$estudiante</td>\n";
    	    echo "\t\t<td>$ramo</td>\n";
    	     echo "\t\t<td>$hora</td>\n";
		    echo "\t</tr>\n";
		}
		echo "</tbody>\n";
		echo "</table>\n";
	}
	mysql_free_result($resultado);
	mysql_close($enlace);
?>