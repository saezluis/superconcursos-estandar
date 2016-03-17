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
            <h1>Modificar Sala</h1>
          </div>
        </div>
        <div class="ed-item web-70">
          <div id="menu-aux">
            <ul class="aux-menu">
			<!--
              <li><a href="#" title="Descargar salas por cadena">Salas por cadena</a></li>
			-->  
            </ul>
          </div>
        </div>
      </div>
    </section>
	
    <section>
      <div id="add_cadena">
        <div class="ed-container">
			
          <div class="ed-item web-30">
		  <!--
            <form id="add_sala" method="post" action="grabar-sala.php">
              <label>Nombre</label>
              <input type="text" name="nombre_sala"/>
              <label>Dirección</label>
              <input type="text" name="direccion_sala"/>
              <label>Código TMLUC</label>
              <input type="text" name="codigo_tmluc"/>
              <label>Comuna / Cuidad</label>              
			  <select name="comuna">
					<?php
						/*
						while($reg=mysqli_fetch_array($registrosComuna)){
							$comuna_nombre = $reg['COMUNA_NOMBRE'];
							echo "<option value=\"$comuna_nombre\">$comuna_nombre</option>";
						}						
						*/
					?>
			  </select>			  
              <label>Cadena</label>			  
              <select name="cadena">
					<?php
						/*
						while($reg=mysqli_fetch_array($registrosCadena)){
							$id_cadena = $reg['id_cadena'];
							$nombre_cadena = $reg['nombre'];							
							echo "<option value=\"$id_cadena\">$nombre_cadena</option>";
						}
						*/
					?>
			  </select>			  
              <input type="submit" value="Grabar"/>
            </form>
			-->
          </div>
		  
		  
          <div class="ed-item web-70">
		  
			<!--
            <form id="salida_por_cadena" method="post" action="agregar-sala.php">			
              <label>Filtrar por Cadena</label>			 
              <select name="cadenaFiltro" onchange="this.form.submit()">
					<?php
					/*
						while($reg=mysqli_fetch_array($registrosCadena2)){
							$id_cadena = $reg['id_cadena'];
							$nombre_cadena = $reg['nombre'];				
							if($chain==$id_cadena){
								echo "<option value=\"$id_cadena\" selected=selected>$nombre_cadena</option>";  
							}else{
								echo "<option value=\"$id_cadena\">$nombre_cadena</option>";
							}
						}
						*/
					?>
			  </select>
            </form>
			-->
			
			<?php
			
				$id_sala_plus_chain = $_GET['id_sala'];
		
				list($id_sala_get, $chain) = explode('.', $id_sala_plus_chain);
			
				include_once 'config.php';
		
				$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				
				$registrosSala=mysqli_query($conexion,"select * from sala WHERE id_sala = '$id_sala_get'")
				or die("Problemas en el select:".mysqli_error($conexion));
				
				if($reg=mysqli_fetch_array($registrosSala)){
						$id_sala = $reg['id_sala'];
						$nombre_sala = $reg['nombre'];
						$direccion_sala = $reg['direccion'];
						$codigo_TMLUC = $reg['codigo_TMLUC'];
						$comuna = $reg['comuna'];
						$id_cadena = $reg['id_cadena'];
						$mostrar = $reg['mostrar'];
				}
			
			
            echo "<div class=\"ed-item base-100\">";
				 echo "<h1>Sala: $nombre_sala</h1>"; 
					echo "<form method=\"post\" action=\"procesar-modificar-sala.php\" >";
						echo "Nombre Sala: <input type=\"text\" value=\"$nombre_sala\" name=\"nombre_sala\" />";
					echo "<br>";
					echo "<br>";
						echo "Dirección Sala: <input type=\"text\" value=\"$direccion_sala\" name=\"direccion_sala\" />";
					echo "<br>";
					echo "<br>";
						echo "Codigo TMLUC: <input type=\"text\" value=\"$codigo_TMLUC\" name=\"codigo_TMLUC\" />";
					echo "<br>";
					echo "<br>";
							echo "<div class=\"label_sala\">";
								echo "<label>Comuna / Ciudad: </label>";
								echo "<select name=\"nombre_comuna\">";								
									while($reg=mysqli_fetch_array($registrosComuna)){
										$comuna_nombre = $reg['COMUNA_NOMBRE'];
										if(strtolower($comuna)==strtolower($comuna_nombre)){
											echo "<option value=\"$comuna_nombre\" selected=selected >$comuna_nombre</option>";
										}else{
											echo "<option value=\"$comuna_nombre\" >$comuna_nombre</option>";
										}
									}	
								echo "</select>";
						echo "<br>";
						echo "<br>";
							echo "</div>";
							echo "<div class=\"label_sala\">";
							  echo "<label>Cadena:</label>";
							  echo "<select name=\"id_cadena\">";									
									while($reg=mysqli_fetch_array($registrosCadena)){
										$id_cadena_reg = $reg['id_cadena'];
										$nombre_cadena_reg = $reg['nombre'];
										if($id_cadena==$id_cadena_reg){
											echo "<option value=\"$id_cadena_reg\" selected=selected >$nombre_cadena_reg</option>";
										}else{
											echo "<option value=\"$id_cadena_reg\">$nombre_cadena_reg</option>";
										}
									}
									//echo "<option>Seleccionar</option>";
							  echo "</select>";
							echo "</div>";
						echo "<br>";
							echo "<div class=\"label_sala\">";
							  echo "<label>Mostrar:</label>";
							  echo "<select name=\"mostrar\">";
								if($mostrar=='si'){
									echo "<option value=\"si\" selected=selected >SI</option>";
									echo "<option value=\"no\" >NO</option>";
								}
								if($mostrar=='no'){
									echo "<option value=\"si\" >SI</option>";
									echo "<option value=\"no\" selected=selected>NO</option>";
								}
							  echo "</select>";
							echo "</div>";
							echo "<br>";
							echo "<input type=\"text\" value=\"$id_sala\" name=\"id_sala\" hidden=hidden> ";
						echo "<input type=\"submit\" value=\"Actualizar\"/> &nbsp;&nbsp;&nbsp;&nbsp; <input type=\"button\" value=\"Cancelar\" onclick=\"window.location='agregar-sala.php';\" />";
					echo "</form>";
			echo "</div>";
			
			?>
			
          </div>
        </div>
      </div>      
    </section>
  </body>
</html>