<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Bienvenido a la Universidad de por aca</title>
		<link rel="stylesheet" href="css/estilos.css" type="text/css" media="all"/>
		<script src="js/jquery-2.1.4.js"></script>
		<script src="js/jquery.tablesorter.js"></script>  
		<script src="js/jquery.colorbox.js"></script>
		<script src="js/jquery.colorbox-es.js"></script>
	</head>
	<script>
		function paginaVer(tabla) {
			var urlAjax = "ver.php?tabla=" + tabla;
			console.log(urlAjax);
			$.colorbox({href: urlAjax, title: "Tabla de " + tabla});
		};
		$(document).ready(function(){
			$('#modProfe').click(function(){
				$('#wrapper').load('modificarProf.php');
			});
			$('#modAlumn').click(function(){
				$('#wrapper').load('modificarEstud.php');
			});
			$('#modRamos').click(function(){
				$('#wrapper').load('modificarRamo.php');
			});
		});
	</script>
	<body>
		<div id="wrapper">
			<div id="titulo">
				<h1>Intranet Universidad de por aca</h1>
			</div>
			<div id="opciones">
				<ul>
					<li><a href='javascript:paginaVer("profesor")'>Ver Lista de Profesores</a></li>
					<li><a href='javascript:paginaVer("estudiante")'>Ver Lista de Alumnos</a></li>
					<li><a href='javascript:paginaVer("ensena")'>Ver Ramos</a></li>
				</ul>
				<ul>
					<li><a href="#" id="modProfe">Modificar Datos Profesor</a></li>
					<li><a href="#" id="modAlumn">Modificar Datos Alumno</a></li>
					<li><a href="#" id="modRamos">Modificar Datos Ramos</a></li>
				</ul>
				<ul>
					<li><a href="#" id="profe">Agregar / Eliminar Profesor</a></li>
					<li><a href="#" id="alumn">Agregar / Eliminar Alumno</a></li>
					<li><a href="#" id="ramos">Agregar / Eliminar Ramos</a></li>
				</ul>
			</div>
		</div>
	</body>	
</html>