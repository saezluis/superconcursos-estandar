<?php

	echo "Esta llegando a procesar sala";
	echo "<br>";
	echo "<br>";
	
	$id_sala = $_REQUEST['id_sala'];
	echo "id_sala: ".$id_sala;
	echo "<br>";
	echo "<br>";
	
	$nombre_sala = $_REQUEST['nombre_sala'];
	echo "nombre sala: ".$nombre_sala;
	echo "<br>";
	echo "<br>";	
	
	$direccion_sala = $_REQUEST['direccion_sala'];
	
	$codigo_TMLUC = $_REQUEST['codigo_TMLUC'];
	echo "Codigo TMLUC: ".$codigo_TMLUC;
	echo "<br>";
	echo "<br>";
	
	$nombre_comuna = $_REQUEST['nombre_comuna'];
	echo "nombre comuna: ".$nombre_comuna;
	echo "<br>";
	echo "<br>";
	
	$id_cadena = $_REQUEST['id_cadena'];
	
	$mostrar = $_REQUEST['mostrar'];
	
	
	include_once 'config.php';

	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "UPDATE sala SET nombre='$nombre_sala',direccion='$direccion_sala',codigo_TMLUC='$codigo_TMLUC',comuna='$nombre_comuna',id_cadena='$id_cadena',mostrar='$mostrar'
	
									WHERE id_sala='$id_sala'") or
									die("Problemas en el select:".mysqli_error($conexion));
				
				
	header('Location: agregar-sala.php');
	
?>