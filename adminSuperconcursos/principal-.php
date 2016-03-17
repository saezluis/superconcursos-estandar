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
				<div class="ed-item web-30"><a href="#" class="logo"><img src="img/logo.png" class="logo"/></a></div>
				<div class="ed-item web-70">
					<div id="contenedor">
						<?php
							include("menu.php");
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
			
			$id_campana = $_GET['id_campana'];
			
			include_once 'config.php';
			
			$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
			$acentos = $conexion->query("SET NAMES 'utf8'");

			$registrosCampana=mysqli_query($conexion,"select * from campana WHERE id_campana='$id_campana' ") or die("Problemas en el select:".mysqli_error($conexion));
			
			?>
			<div class="ed-container">
				<div class="ed-item web-100">
					<div id="titulo-section">
						<h1>Principal</h1>
					</div>
				</div>
				<div class="ed-item web-50">
					<div class="tabla-concurso no-padding">
						<?php
							if($reg=mysqli_fetch_array($registrosCampana)){
								$nombre_concurso = $reg['nombre_concurso'];
								$texto = $reg['texto'];
								$imagen_concurso = $reg['foto_campana'];
								$duracion = $reg['duracion'];
								echo "<h2>$nombre_concurso</h2>";
								echo "<p>$texto</p><img src=\"img/$imagen_concurso\"/>";
							}
						?>
					</div>
				</div>
				<div class="ed-item web-50">
					<div class="tabla-concurso no-padding">
						<h2>Status</h2>
						<article class="item-status">
							<p>Fotos subidas</p>
							<div class="cant-fotos circle">200</div><span> fotos</span>
						</article>
						<article class="item-status">
							<p>Duración campaña</p>
							<?php
								//setlocale(LC_TIME,'es_ES.UTF-8');
								$phpdate = strtotime( $duracion );
								$fecha_mostrar = date( 'd / m / Y', $phpdate );
								echo "<h2>$fecha_mostrar</h2>";
							?>
						</article>
						<article class="item-status">
							<p>Informe de ganadores</p><a href="#" class="download">Descargar</a>
						</article>
						<h3>Búsqueda</h3>
						<form>
							<input type="search" placeholder="por foto, usuario, agencia"/>
							<input type="submit" value="buscar"/>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>