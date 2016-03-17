<?php
	
	$id_sala_viejo = $_REQUEST['id_sala_vieja'];
	$id_sala_nuevo = $_REQUEST['sala_cambiar'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");	
	
	mysqli_query($conexion, "UPDATE foto SET
									id_sala='$id_sala_nuevo'
								   
									
									WHERE id_sala='$id_sala_viejo'") or
									die("Problemas en el select:".mysqli_error($conexion));
									
	header('Location: foto-por-sala.php');
	
?>