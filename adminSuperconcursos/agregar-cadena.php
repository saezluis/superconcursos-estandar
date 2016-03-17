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
	
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		$registrosCadena=mysqli_query($conexion,"SELECT * FROM cadena")or die("Problemas en el select:".mysqli_error($conexion));
		
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
        <div class="ed-item web-30">
          <div id="titulo-section-fotos">
            <h1>Agregar cadena</h1>
          </div>
        </div>
        <div class="ed-item web-70">
          <div id="datos__ADD">
            <form id="add" method="post" action="agregar-nueva-cadena.php">
              <input type="text" name="nombre_cadena" placeholder="Agregar cadena" required/>
              <input type="submit" value="Grabar"  />
            </form>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div id="add_cadena">
        <div class="ed-container">
          <div class="ed-item web-30"></div>
          <div class="ed-item web-70">
            <table class="add_table">
              <thead>
                <tr>
				  <th>Código</th>
                  <th>Cadena</th>
                  <th>Mostrar</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
				<?php
					while($reg=mysqli_fetch_array($registrosCadena)){
					
						$id_cadena = $reg['id_cadena'];
						$nombre = $reg['nombre'];
						$mostrar = $reg['mostrar'];
					
						echo "<tr class=\"tr-center\">";
						echo "<td class=\"td-padd\">$id_cadena</td>";
						echo "<td class=\"td-padd\">$nombre</td>";
						echo "<td class=\"td-padd\">";
							echo "<form id=\"mostrar\" method=\"post\" action=\"editar-mostrar.php\" >";
							  echo "<select name=\"mostrar\" onchange=\"this.form.submit()\" >";
								if($mostrar=='si'){
									echo "<option value=\"si\" selected=selected>SI</option>";
									echo "<option value=\"no\">NO</option>";
								}
								if($mostrar=='no'){
									echo "<option value=\"si\">SI</option>";
									echo "<option value=\"no\" selected=selected>NO</option>";
								}
							  echo "</select>";
							  echo "<input type=\"text\" value=\"$id_cadena\" name=\"id_cadena\" hidden=hidden>";
							echo "</form>";
						  echo "</td>";
						  echo "<td class=\"td-padd\"> <a href=\"modificar-cadena.php?id_cadena=",urlencode($id_cadena)," \" class=\"editar-datos\"> </a></td>";
						echo "</tr>";
					}
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>