<?php
	
	$id_foto = $_GET['id_foto_erase'];

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "DELETE FROM foto WHERE id_foto = '$id_foto'") or die("Problemas en el select:".mysqli_error($conexion));

	header('Location: foto-por-sala.php');
	
?>