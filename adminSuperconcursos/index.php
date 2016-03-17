<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		
	}
	else
	{	
		header('Content-Type: text/html; charset=UTF-8'); 
		echo "<br/>" . "Esta pagina es solo para usuarios registrados." . "<br/>";
		echo "<br/>" . "<a href='login.php'>Hacer Login</a>";
		exit;
	}
	$now = time(); // checking the time now when home page starts
	if($now > $_SESSION['expire'])
	{
		session_destroy();
		echo "<br/><br />" . "Su sesion a terminado, <a href='login.php'> Necesita Hacer Login</a>";
		exit;
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<link rel="stylesheet" href="css/styles.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/scripts.js"></script>
		<title>Administrador Tresmontes Lucchetti</title>
	</head>
	<body>
		<header class="total">
			<div class="ed-container">
				<div class="ed-item web-30"><a href="index.php" class="logo"><img src="img/logo.png" class="logo"/></a></div>
				<div class="ed-item web-70">
					<div id="contenedor">
						<?php
							//include("menu.php");
						?>
					</div>
					<div id="admin">
						<?php
							include("admin.php");
						?>
					</div>
				</div>
			</div>
		</header>
		<section>
			<?php
				
				include_once 'config.php';
				
				$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				
				$registrosConcurso=mysqli_query($conexion,"select * from campana")
				or die("Problemas en el select:".mysqli_error($conexion));
				
				
			?>
			<div class="ed-container">
				<div class="ed-item web-100">
					<div id="titulo-section">
						<h1>Elija Concurso</h1>
					</div>
				</div>
				<?php				
					while($reg=mysqli_fetch_array($registrosConcurso)){
						$id_campana = $reg['id_campana'];
						$nombre_concurso = $reg['nombre_concurso'];
						$texto = $reg['texto'];
						$imagen_concurso = $reg['foto_campana'];
						echo "<div class=\"ed-item web-50\">";
						echo "<div class=\"tabla-concurso no-padding\">";
						echo "<h2>$nombre_concurso</h2>";
						echo "<p>$texto</p><img src=\"img/$imagen_concurso\"/><a href=\"principal.php\">Ir al concurso</a>";
						
						//echo "<div class=\"item--campana\"><a href=\"elije-exhibicion.php?id_campana=",urlencode($id_campana),"  \"><img src=\"img/$foto_campana\"/></a></div>";
						
						echo "</div>";
						echo "</div>";
					}
					
					$_SESSION['id_campana'] = $id_campana;
				?>
				
			</div>
		</section>
	</body>
</html>