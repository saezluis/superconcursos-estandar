<html>
<head>
	
	<script>
		function makeSubmit() {		
			setTimeout(function(){
			document.getElementById('myform').submit();
			}, 100);
		}
	</script>

</head>
<?php

	$id_sala = $_REQUEST['id_sala'];
	$mostrar = $_REQUEST['mostrar'];
	
	$chain = $_REQUEST['cadenaFiltroMostrar'];
	//$mostrarUpper = strtoupper($mostrar);
	
	//echo "id cadena: ".$id_cadena;
	//echo "<br>";
	//echo "<br>";
	
	//echo "mostrar: ".$mostrar;
	
	include_once 'config.php';

	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "update sala set mostrar='$mostrar'
									WHERE id_sala='$id_sala'") or
									die("Problemas en el select:".mysqli_error($conexion));
	

	//echo "En teoria funko";
	//header('Location: agregar-sala.php');
	
	echo "<form id=\"myform\" method=\"POST\" action=\"agregar-sala.php\">";
		echo "<input type=\"text\" value=\"$chain\" name=\"cadenaFiltroMostrar\" hidden=hidden>";
	echo "</form>";
	
	
?>
<body onload="makeSubmit()">

</body>
</html>