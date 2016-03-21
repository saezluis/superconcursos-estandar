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
	//Aqui debo buscar por rut donde trabaja el mercaderista
	//puedo conseguir el rut comparando contra la variable de sesion del correo
	
	//$rut = $_SESSION['username'];
	
	//$id_exhibicion = $_REQUEST['id_ex_send'];
	//$_SESSION['exhibicion_sesion'] = $id_exhibicion;
	
	//echo "email: ".$emailUsuario;
	//echo "<br>";
	
	include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	/*
	$registroUsuario=mysqli_query($conexion,"select * from cuenta WHERE rut='$rut'") or die("Problemas en el select:".mysqli_error($conexion));

	if($reg=mysqli_fetch_array($registroUsuario)){
		$rutUsuario = $reg['rut'];
		$id_sala_01 = $reg['id_sala_01'];
		$id_sala_02 = $reg['id_sala_02'];
		$id_sala_03 = $reg['id_sala_03'];
	}
	
	$registroSala=mysqli_query($conexion,"select * from sala WHERE id_sala='$id_sala_01'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registroSala)){
		$id_cadena = $reg['id_cadena'];								
	}	
	
	$registroCadena=mysqli_query($conexion,"select nombre from cadena WHERE id_cadena='$id_cadena'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registroCadena)){
		$nombre_cadena = $reg['nombre'];								
	}	
	*/
	?>
    <header class="normal">

      <div class="ed-container">
          <div class="ed-item base-100 tablet-100 web-50 absoluto">
          <div class="logo"><img src="img/logo.svg"/></div>
          </div>

          <div class="ed-item base-100 tablet-100 web-50 relaticos" >
            <label for="show-menu" class="show-menu">Menu</label>
            <input type="checkbox" id="show-menu" role="button">

            <ul id="menu">
              <li><a href="#">Inicio</a></li>
              <li><a href="#">Bases</a></li>
              <li><a href="#">Premios</a></li>
              <li><a href="#">Ganadores</a></li>
              <li><a href="#">Contacto</a></li>
            </ul>
            <a href="#" class="cerrarSesion">cerrar sesión</a>
          </div>

      </div>
    </header>
	
    
    <section id="interior" class="ed-container">
      <div class="ed-item base-100">
        <h1 class="centrar">¿En qué sala hiciste tu exhibición?</h1>
		
            
              <form id="seleccion" method="post" action="subir-imagen.php">
                <div class="ticket">
                  <div id="campo_info">
					<?php
                    //echo "<p>$nombre_cadena</p>";
					//echo "<input type=\"text\" name=\"nombre_cadena\" value=\"$nombre_cadena\" hidden=hidden >";
					?>
                  </div><img src="img/ticket.svg" class="ok"/>
                </div>
                <select class="style-select" name="sala_seleccionada" onchange="this.form.submit()">				
                  <option>Elije una sala</option>
				  <option>Sala 01</option>
				  <option>Sala 02</option>
				  <option>Sala 03</option>
				  <?php
					/*
					$registroSala1=mysqli_query($conexion,"select * from sala WHERE id_sala='$id_sala_01' ") or die("Problemas en el select:".mysqli_error($conexion));
						while($reg=mysqli_fetch_array($registroSala1)){
							$id_sala1 = $reg['id_sala'];
							$nombreSala1 = $reg['nombre'];						
							echo "<option value=\"$id_sala1\">$nombreSala1</option>";
							//$_SESSION['id_sala'] = $id_sala1;
					}
					
					$registroSala2=mysqli_query($conexion,"select * from sala WHERE id_sala='$id_sala_02' ") or die("Problemas en el select:".mysqli_error($conexion));
					
					if(mysqli_num_rows($registroSala2)==0){
						$nada = 0;
					}else{
						while($reg=mysqli_fetch_array($registroSala2)){
							$id_sala2 = $reg['id_sala'];
							$nombreSala2 = $reg['nombre'];						
							echo "<option value=\"$id_sala2\">$nombreSala2</option>";
							//$_SESSION['id_sala'] = $id_sala2;
						}
					}
					
					$registroSala3=mysqli_query($conexion,"select * from sala WHERE id_sala='$id_sala_03' ") or die("Problemas en el select:".mysqli_error($conexion));
					
					if(mysqli_num_rows($registroSala3)==0){
						$nada3 = 0;
					}else{
						while($reg=mysqli_fetch_array($registroSala3)){
							$id_sala3 = $reg['id_sala'];
							$nombreSala3 = $reg['nombre'];							
							echo "<option value=\"$id_sala3\">$nombreSala3</option>";
							//$_SESSION['id_sala'] = $id_sala3;
						}
					}
					*/
				  ?>
                </select>
              </form>            
          </div>        
    </section>
<!--     <footer class="ed-container total">
      <div class="ed-item base-100"><img src="img/fot.png"/></div>
    </footer>  -->
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