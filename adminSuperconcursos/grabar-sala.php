<?php
	
	$nombre_sala = $_REQUEST['nombre_sala'];
	$direccion_sala = $_REQUEST['direccion_sala'];
	$codigo_tmluc = $_REQUEST['codigo_tmluc'];
	$comuna = $_REQUEST['comuna'];
	$id_cadena = $_REQUEST['cadena'];
	
	include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into sala(nombre,direccion,codigo_TMLUC,comuna,id_cadena,mostrar) values 
							('$nombre_sala',
							'$direccion_sala',
							'$codigo_tmluc',
							'$comuna',
							'$id_cadena',
							'si'
							)")
	or die("Problemas con el insert de los servicios");
	
	echo "<a href=\"agregar-sala.php\">Volver</a>";

?>