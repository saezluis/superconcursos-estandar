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
	<?php
	
		$id_campana = $_SESSION['id_campana'];
			
		include_once 'config.php';
			
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");

		$registrosCampana=mysqli_query($conexion,"select * from campana WHERE id_campana='$id_campana' ") or die("Problemas en el select:".mysqli_error($conexion));
	
		$registrosFotos=mysqli_query($conexion,"select * from foto WHERE id_campana = '$id_campana' ") or die("Problemas en el select:".mysqli_error($conexion));
	
		$registrosFotosGanadoras=mysqli_query($conexion,"select * from foto WHERE estado = 'Ganadora' AND id_campana = '$id_campana' ") or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosFotosNoGanadoras=mysqli_query($conexion,"select * from foto WHERE estado = 'No Ganadora' AND id_campana = '$id_campana'") or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosFotosPorRevisar=mysqli_query($conexion,"select * from foto WHERE estado = 'No Revisada' AND id_campana = '$id_campana'") or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosFotosPendiente=mysqli_query($conexion,"select * from foto WHERE estado = 'Pendiente' AND id_campana = '$id_campana'") or die("Problemas en el select:".mysqli_error($conexion));
	
		$num_rows = mysqli_num_rows($registrosFotos);
		
		$_SESSION['contador_fotos'] = $num_rows;
		
		$num_rows_ganadoras = mysqli_num_rows($registrosFotosGanadoras);
		
		$num_rows_Noganadoras = mysqli_num_rows($registrosFotosNoGanadoras);
		
		$num_rows_PorRevisar = mysqli_num_rows($registrosFotosPorRevisar);
		
		$num_rows_Pendiente = mysqli_num_rows($registrosFotosPendiente);
	
	?>
    <header class="total">
      <div class="ed-container">
        <div class="ed-item web-30"><a href="index.php" class="logo"><img src="img/logo.png" class="logo"/></a></div>
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
					//echo "<h2>$nombre_concurso</h2>";
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
			  
              <div class="cant-fotos circle"><?php echo $num_rows; ?></div><span> fotos</span>
			  
            </article>
            <article class="item-status">
              <p>Fotos ganadoras</p>
              <div class="cant-fotos circle"><?php echo $num_rows_ganadoras; ?></div><span> fotos</span>
            </article>
            <article class="item-status status_Nbor">
              <p>Fotos no ganadoras</p>
              <div class="cant-fotos circle"><?php echo $num_rows_Noganadoras; ?></div><span> fotos</span>
            </article>
            <article class="item-status status_Btop">
              <p>Fotos por revisar</p>
              <div class="cant-fotos circle"><?php echo $num_rows_PorRevisar; ?></div><span> fotos</span>
            </article>			
			<article class="item-status status_Btop">
              <p>Fotos pendientes</p>
              <div class="cant-fotos circle"><?php echo $num_rows_Pendiente; ?></div><span> fotos</span>
            </article>
			<article class="item-status status_Btop">
              <p></p>
              <div class=""><a href="foto-por-sala.php">Revisar fotos</a></div><span></span>
            </article>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>