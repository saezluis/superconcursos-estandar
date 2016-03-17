<?php

	$estado_foto = $_REQUEST['estado_foto'];
	$mostrar = $_REQUEST['mostrar'];
	$premio = $_REQUEST['premio'];
	$observaciones = $_REQUEST['observaciones'];
	$id_foto = $_REQUEST['id_foto_update'];

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "UPDATE foto SET
									estado='$estado_foto',
								    mostrar='$mostrar',
									premio='$premio',
									observaciones='$observaciones'
									
									WHERE id_foto='$id_foto'") or
									die("Problemas en el select:".mysqli_error($conexion));
									
	
	/*
	echo '<script language="javascript">';
	echo 'alert("Datos procesados")';
	echo 'window.location.href="foto-por-sala.php";';
	echo '</script>';
	*/
	//$id_foto_next = $id_foto - 1;
	
	$HeadTo = "foto-por-sala.php?id_foto_next=".$id_foto."";
	
	Header("Location: ".$HeadTo);
	
	//header('Location:  ');
?>