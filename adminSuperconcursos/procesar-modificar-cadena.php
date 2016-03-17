<?php
	
	echo "Está llegando al form";
	echo "<br>";
	echo "<br>";
	
	$id_cadena = $_REQUEST['id_cadena'];
	echo "id_cadena: ".$id_cadena;
	echo "<br>";
	echo "<br>";
	
	$nombre_cadena = $_REQUEST['nombre_cadena'];
	echo "nombre cadena: ".$nombre_cadena;
	
	include_once 'config.php';

	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "update cadena set nombre='$nombre_cadena'
									WHERE id_cadena='$id_cadena'") or
									die("Problemas en el select:".mysqli_error($conexion));
									
	header('Location: agregar-cadena.php');
	
?>