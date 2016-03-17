<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" href="js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>
    <script type="text/javascript" src="js/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" href="js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen"/>
    <script type="text/javascript" src="js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <link rel="stylesheet" href="js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen"/>
    <script type="text/javascript" src="js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <title>Administrador Tresmontes Lucchetti</title>
  </head>
  <body>
		<?php
			
			$id_foto = $_GET['deta'];
			
			include_once 'config.php';
				
				$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				
				$registrosFoto=mysqli_query($conexion,"SELECT * FROM foto WHERE id_foto = '$id_foto' ")or die("Problemas en el select:".mysqli_error($conexion));
				
				if($reg=mysqli_fetch_array($registrosFoto)){
					$id_rut = $reg['id_rut'];
					$fecha = $reg['fecha'];
					$nombre_foto = $reg['nombre_foto'];
				}
				
				$registrosUsuario=mysqli_query($conexion,"SELECT * FROM cuenta WHERE rut = '$id_rut' ")or die("Problemas en el select:".mysqli_error($conexion));
				
				if($reg=mysqli_fetch_array($registrosUsuario)){
					$nombre = $reg['nombre'];
					$mail = $reg['usuario'];
					$celular = $reg['celular'];					
				}
				
			
		?>
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
      <div class="ed-container">
        <div class="ed-item web-100">
          <div id="titulo-section">
            <h1>Foto Nº 19</h1>
          </div>
        </div>
      </div>
    </section>
    <section id="inline-detalle">
      <div class="ed-container">
        <div class="ed-item web-60">
			<?php
				echo "<div id=\"img-salas-foto\"><img src=\"../fotos-concursos/$nombre_foto\"/></div>";
			?>
        </div>
        <div class="ed-item web-40">
          <div id="caja-data">
            <h3>Datos exhibición</h3>
            <ul class="datos__exhibicion">
              <li class="reponedor">Datos mercaderista</li>
			  <?php
				  echo "<li>Foto subida por: <span>$nombre</span></li>";
				  echo "<li>Mail: <span>$mail</span></li>";
				  echo "<li>Cel: <span>$celular</span></li>";
				  echo "<li>Rut: <span>$id_rut</span></li>";
			  ?>
            </ul>
          </div>
          <div id="caja-data">
            <h3>Datos internos</h3>
            <ul style="margin:0.5em;" class="datos__exhibicion">
			<?php
				$phpdate = strtotime( $fecha );
				$fecha_mostrar = date( 'd-m-Y', $phpdate );
				echo "<li>Fecha: <span>$fecha_mostrar</span></li>";
				echo "<li>Jefe Grupo: <span>Ricardo Caro</span></li>";
				echo "<li>Rut: <span>15506389-0</span></li>";
				echo "<li>Supervisor: <span>Claudio Silvestre</span></li>";
				echo "<li>Integrante 1: <span>Ricardo Caro</span></li>";
				echo "<li>Integrante 1: <span>15506389-0</span></li>";
				echo "<li>Rut Int. 1: <span>15506389-0</span></li>";
				echo "<li>Exhibidor: <span>Cabecera góndola</span></li>";
			?>  
            </ul>
          </div>
		  <form method="post" action="foto-por-sala.php">
			<button type="submit" class="back">Volver</button>
		  </form>
        </div>
      </div>
    </section>
  </body>
</html>