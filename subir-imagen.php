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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <title></title>
  </head>
  <body>
	<?php
	
		//$nombre_cadena = $_REQUEST['nombre_cadena'];
		
		//$id_sala = $_REQUEST['sala_seleccionada'];
		
		//$_SESSION['id_sala'] = $id_sala;
		
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		/*
		$registroSala=mysqli_query($conexion,"select * from sala WHERE id_sala='$id_sala'") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg=mysqli_fetch_array($registroSala)){						
			$nombreSala = $reg['nombre'];
			$direccion_sala = $reg['direccion'];						
		}
		*/
	?>
    <header class="normal">

      <div class="ed-container">
          <div class="ed-item base-100 tablet-100 web-50 absoluto">
          <div class="logo"><img src="img/logo.svg"/></div>
          </div>

          <div class="ed-item base-100 tablet-100 web-50" >
            <label for="show-menu" class="show-menu">Menu</label>
            <input type="checkbox" id="show-menu" role="button">

            <ul id="menu">
              <li><a href="#">Inicio</a></li>
              <li><a href="#">Bases</a></li>
              <li><a href="#">Premios</a></li>
              <li><a href="#">Ganadores</a></li>
              <li><a href="#">Contacto</a></li>
            </ul>
          </div>

      </div>
    </header>
    <section id="interior" class="ed-container">
      <div class="ed-item base-100">
            <h1 class="centrar">Subir foto de exhibición </h1>            
              <form id="seleccion" method="post" action="procesar-subir-imagen.php" enctype="multipart/form-data">
                <div class="ticket">
                  <div id="campo_info">
					<?php
                    //echo "<p>";				
						//echo "$nombre_cadena <span> / </span><span> $nombreSala </span><span> / </span><span> $direccion_sala </span>";				  
                    //echo "</p>";
					echo "<p>";				
						echo "Cadena: aquí su cadena <span> / </span><span> Sala: aquí la sala </span><span> / </span><span> Dirección: aquí la dirección </span>";				  
                    echo "</p>";
					?>
                  </div><img src="img/ticket.svg" class="ok"/>
                </div>
                <div class="upload">
                  <input type="file" name="upload" id="upload" accept="image/*" capture="camera" onchange="this.form.submit()"/>
                </div>
               <p class="tab">Subir foto</p>
              </form>           
          </div>        
    </section>
<!--     <footer class="ed-container total">
      <div class="ed-item base-100"><img src="img/fot.png"/></div>
    </footer>    --> 
    <footer>
      <div class="ed-container total">
          <div class="ed-item base-100">
            <!-- <img src="img/fot.png"/> -->
            <p>Todos los derechos reservados</p>
          </div>
      </div>
    </footer>  
  </body>
</html>