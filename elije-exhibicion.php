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
	
	$id_campana = $_GET['id_campana'];
	$_SESSION['campana_sesion'] = $id_campana;	
	
	include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosExhibicion=mysqli_query($conexion,"select * from exhibicion") or die("Problemas en el select:".mysqli_error($conexion));
	
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
		<h1 class="centrar">Elige exhibición</h1>
		 <form id="seleccion" method="post" action="">
			<select class="style-select" name="sala_seleccionada" onchange="this.form.submit()">
				<option>Elije una exhibición</option>
			</select>
		 </form>

<!-- 			<div class="ed-item base-100">
				<form id="seleccion" method="post" action="sala.php">
					<?php
						echo "<select name=\"id_ex_send\" class=\"green\" onchange=\" this.form.submit() \">"; //+this.options[this.selectedIndex].value
						echo "<option value=\"$\">Elije tu exhibición</option>";
						while($reg=mysqli_fetch_array($registrosExhibicion)){		
								$id_exhibicion = $reg['id_exhibicion'];						
								$nombre = $reg['nombre'];						
								echo "<option value=\"$id_exhibicion\">$nombre</option>";
								}						
						echo "</select>";	       
					?>  		
				</form>
			</div> -->
		</div>
    </section>
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