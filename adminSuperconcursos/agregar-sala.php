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
		
		$registrosCadena=mysqli_query($conexion,"select * from cadena")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosCadena2=mysqli_query($conexion,"select * from cadena")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$conexionComuna=mysqli_connect("localhost","root","123","bdcutcl") or die("Problemas con la conexión");
		$acentos = $conexionComuna->query("SET NAMES 'utf8'");
		
		$registrosComuna=mysqli_query($conexionComuna,"select * from comuna ORDER BY COMUNA_NOMBRE ASC")
		or die("Problemas en el select:".mysqli_error($conexionComuna));
		
		if(@$_REQUEST['cadenaFiltroMostrar']!=''){
			$chain = @$_REQUEST['cadenaFiltroMostrar'];
		}else{		
			if(@$_REQUEST['cadenaFiltro']!=''){
				$chain = @$_REQUEST['cadenaFiltro'];
			}else{
				$chain = 1;
			}		
		}	
		
		//aqui le envio en numero de cadena para filtrar las salas
		
		//SELECT * FROM `letters` ORDER BY letter ASC
		$registrosSala=mysqli_query($conexion,"select * from sala WHERE id_cadena = '$chain'")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		
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
            <h1>Agregar Sala</h1>
          </div>
        </div>
        <div class="ed-item web-70">
          <div id="menu-aux">
            <ul class="aux-menu">
              <li><a href="#" title="Descargar salas por cadena">Salas por cadena</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div id="add_cadena">
        <div class="ed-container">
          <div class="ed-item web-30">
            <form id="add_sala" method="post" action="grabar-sala.php">
              <label>Nombre</label>
              <input type="text" name="nombre_sala" required />
              <label>Dirección</label>
              <input type="text" name="direccion_sala" required />
              <label>Código TMLUC</label>
              <input type="text" name="codigo_tmluc" required />
              <label>Comuna / Cuidad</label>              
			  <select name="comuna" required>
					<?php
						while($reg=mysqli_fetch_array($registrosComuna)){
							$comuna_nombre = $reg['COMUNA_NOMBRE'];
							echo "<option value=\"$comuna_nombre\">$comuna_nombre</option>";
						}						
					?>
			  </select>			  
              <label>Cadena</label>			  
              <select name="cadena" required>
					<?php
						while($reg=mysqli_fetch_array($registrosCadena)){
							$id_cadena = $reg['id_cadena'];
							$nombre_cadena = $reg['nombre'];							
							echo "<option value=\"$id_cadena\">$nombre_cadena</option>";
						}
					?>
			  </select>			  
              <input type="submit" value="Grabar"/>
            </form>
          </div>
          <div class="ed-item web-70">
		  
            <form id="salida_por_cadena" method="post" action="agregar-sala.php">			
              <label>Filtrar por Cadena</label>			 
              <select name="cadenaFiltro" onchange="this.form.submit()">
					<?php
						while($reg=mysqli_fetch_array($registrosCadena2)){
							$id_cadena = $reg['id_cadena'];
							$nombre_cadena = $reg['nombre'];				
							if($chain==$id_cadena){
								echo "<option value=\"$id_cadena\" selected=selected>$nombre_cadena</option>";  
							}else{
								echo "<option value=\"$id_cadena\">$nombre_cadena</option>";
							}
						}
					?>
			  </select>
            </form>
			
            <table class="add_table">
              <thead>
                <tr>
                  <th>Sala</th>
                  <th>TMLUC</th>
                  <th>Comuna / Ciudad</th>
                  <th>Mostrar</th>
				  <th>Editar</th>
                </tr>
              </thead>
              <tbody>			
					<?php
					while($reg=mysqli_fetch_array($registrosSala)){
						$id_sala = $reg['id_sala'];
						$nombre_sala = $reg['nombre'];
						$codigo_TMLUC = $reg['codigo_TMLUC'];
						$comuna = $reg['comuna'];
						$mostrar = $reg['mostrar'];
						
						echo "<tr class=\"tr-center\">";
						
							//modificar sala
							//echo "<td class=\"td-padd\"> <a href=\"modificar-cadena.php?id_cadena=",urlencode($id_cadena)," \" class=\"editar-datos\"> </a></td>";
							
							echo "<td class=\"td-padd\"><a href=\"#\" class=\"\">$nombre_sala</a></td>";
								echo "<td class=\"td-padd\">$codigo_TMLUC</td>";
								echo "<td class=\"td-padd\">$comuna</td>";
								echo "<td class=\"td-padd\">";
									echo "<form id=\"mostrar\" method=\"post\" action=\"editar-mostrar-sala.php\" >";
										echo "<select name=\"mostrar\" onchange=\"this.form.submit()\">";
											if($mostrar=='si'){
												echo "<option value=\"si\" selected=selected>SI</option>";
												echo "<option value=\"no\">NO</option>";
											}
											if($mostrar=='no'){
												echo "<option value=\"si\">SI</option>";
												echo "<option value=\"no\" selected=selected>NO</option>";
											}
										echo "</select>";											
										echo "<input type=\"text\" value=\"$chain\" name=\"cadenaFiltroMostrar\" hidden=hidden>";
										echo "<input type=\"text\" value=\"$id_sala\" name=\"id_sala\" hidden=hidden>";
									echo "</form>";
								echo "</td>";	
								$id_sala_plus_chain = $id_sala . "." . $chain;
								echo "<td class=\"td-padd\"> <a href=\"modificar-sala2.php?id_sala=",urlencode($id_sala_plus_chain)," \" class=\"editar-datos\"> </a></td>";
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