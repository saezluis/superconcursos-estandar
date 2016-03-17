<?php

	$id_cadena = $_REQUEST['id_cadena'];
	$mostrar = $_REQUEST['mostrar'];
	//$mostrarUpper = strtoupper($mostrar);
	
	//echo "id cadena: ".$id_cadena;
	//echo "<br>";
	//echo "<br>";
	
	//echo "mostrar: ".$mostrar;
	
	include_once 'config.php';

	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "update cadena set mostrar='$mostrar'
									WHERE id_cadena='$id_cadena'") or
									die("Problemas en el select:".mysqli_error($conexion));
	

	//echo "En teoria funko";
	header('Location: agregar-cadena.php');
	
?>