<?php

	$nombre_supervisor = $_REQUEST['nombre_supervisor'];
	$email_supervisor = $_REQUEST['email_supervisor'];
	$clave_supervisor = $_REQUEST['clave_supervisor'];
	$region = $_REQUEST['region'];
	$agencia = $_REQUEST['agencia'];
	
	include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"INSERT INTO supervisor(nombre_super,mail_super,clave_super,region,agencia,mostrar) VALUES 
							('$nombre_supervisor',
							'$email_supervisor',
							'$clave_supervisor',
							'$region',
							'$agencia',
							'si'
							)")
	or die("Problemas con el insert de los servicios");
	
	//echo "<a href=\"agregar-sala.php\">Volver</a>";

?>