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
	
	//aqui se conecta a la BD y trae las campanas	
	include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosCampana=mysqli_query($conexion,"select * from campana") or die("Problemas en el select:".mysqli_error($conexion));
	
	
		
	?>
    <header class="normal">
      <div class="ed-container">
        <div class="ed-item base-100 absoluto"><a href="index.html"><img src="img/logo.svg"/></a>
          <nav class="navegacion">
            <ul>
              <li><a href="#">bases</a></li>
              <li><a href="#">premios</a></li>
              <li><a href="#">ganadores</a></li>
              <li><a href="#">contacto</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
	
    <section id="interior" class="ed-container">
        <h1 class="centrar">Selecciona tu campaña</h1>
        <div class="ed-item base-100">			
				<?php
					while($reg=mysqli_fetch_array($registrosCampana)){
						$id_campana = $reg['id_campana'];	
						$foto_campana = $reg['foto_campana'];		
							echo "<div class=\"item--campana\" style=\"float:none !important; margin:0 auto;\"><a href=\"elije-exhibicion.php?id_campana=",urlencode($id_campana),"  \"><img src=\"img/$foto_campana\"/></a></div>";							
							//echo "<li>Nombre: $nombre  Modelo: $modelo  SKU: <a href=\"elim-calefaccion.php?id_send=",urlencode($id_producto)," \">$sku</a> </li>";
						}
					?>              
		</div>
    </section>
    <footer class="ed-container total">
      <div class="ed-item base-100"><img src="img/fot.png"/></div>
    </footer>    
  </body>
</html>