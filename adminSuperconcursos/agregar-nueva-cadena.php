<?php

	echo "Entro al agregar cadena";
	echo "<br>";
	echo "<br>";
	
	
	$nombre_cadena = $_REQUEST['nombre_cadena'];
	
	echo "nombre cadena: ".$nombre_cadena;
	
	include_once 'config.php';

	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion,"insert into cadena(nombre,mostrar) values 
									('$nombre_cadena',
									'si'														
									)")
	or die("Problemas con el insert de los servicios");
	
	header('Location: agregar-cadena.php');

?>