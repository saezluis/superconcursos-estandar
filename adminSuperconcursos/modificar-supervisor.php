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
	
	$id_super_get = $_GET['id_supervisor'];
	/*	
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		$registrosAgencia=mysqli_query($conexion,"select * from agencias")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosSupervisor=mysqli_query($conexion,"select * from supervisor")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		
		
		
	*/
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
            <h1>Modificar Supervisor</h1>
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
				</div>
				<?php
				
					include_once 'config.php';
		
					$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
					$acentos = $conexion->query("SET NAMES 'utf8'");
				
					$registrosSupervisor=mysqli_query($conexion,"select * from supervisor WHERE id_super = '$id_super_get'")
					or die("Problemas en el select:".mysqli_error($conexion));
					
					$registrosRegiones=mysqli_query($conexion,"select * from regiones")
					or die("Problemas en el select:".mysqli_error($conexion));
					
					
					if($reg=mysqli_fetch_array($registrosSupervisor)){
					
						$id_super = $reg['id_super'];
						$nombre_super = $reg['nombre_super'];
						$mail_super = $reg['mail_super'];
						$clave_super = $reg['clave_super'];
						$mostrar = $reg['mostrar'];
						$region = $reg['region'];
						$agencia = $reg['agencia'];
					
					}
					
					$registrosAgencia=mysqli_query($conexion,"select * from agencias")
					or die("Problemas en el select:".mysqli_error($conexion));

					
					echo "<div class=\"ed-item web-70\">";
						echo "<div class=\"ed-item base-100\">";
						  echo "<h1>Supervisor $id_super</h1>";
						  echo "<form id=\"edita_sala_o\">";
							echo "Nombre Supervisor: <input type=\"text\" value=\"$nombre_super\" name=\"nombre_super\" /><br><br>";
							echo "Email Supervisor: <input type=\"text\" value=\"$mail_super\" name=\"mail_super\" /><br><br>";
							echo "Actualizar clave: <input type=\"text\" value=\"$clave_super\" name=\"clave_super\" /><br><br>";
							echo "<div class=\"label_sala\">";
								echo "<label>Región: </label>";
									echo "<select>";
										echo "<option>Seleccionar</option>";
										
										while($reg=mysqli_fetch_array($registrosRegiones)){
											$nombre_region = $reg['nombre_region'];
											if($region==$nombre_region){
												echo "<option value=\"$nombre_region\" selected=selected >$nombre_region</option>";
											}else{
												echo "<option value=\"$nombre_region\">$nombre_region</option>";
											}										
										}
										/*
										echo "<option value=\"Región Metropolitana\">Región Metropolitana</option>";
										echo "<option value=\"15a Región Arica y Parinacota\">15a Región Arica y Parinacota</option>";
										echo "<option value=\"1a Región Tarapacá\">1a Región Tarapacá</option>";
										echo "<option value=\"2a Región Antofagasta\">2a Región Antofagasta</option>";
										echo "<option value=\"3a Región Atacama\">3a Región Atacama</option>";
										echo "<option value=\"4a Región Coquimbo\">4a Región Coquimbo</option>";
										echo "<option value=\"5a Región Valparaíso\">5a Región Valparaíso</option>";
										echo "<option value=\"6a Región OHiggins\">6a Región OHiggins</option>";
										echo "<option value=\"7a Región Maule\">7a Región Maule</option>";
										echo "<option value=\"8a Región Biobio\">8a Región Biobio</option>";
										echo "<option value=\"9a Región Araucanía\">9a Región Araucanía</option>";
										echo "<option value=\"XIV Los Ríos\">XIV Los Ríos</option>";
										echo "<option value=\"10a Región Los Lagos\">10a Región Los Lagos</option>";
										echo "<option value=\"XI Aysén\">XI Aysén</option>";
										echo "<option value=\"XII Magallanes y Antártica\">XII Magallanes y Antártica</option>";
										*/
									echo "</select>";
								echo "</div><br>";
							
							echo "<div class=\"label_sala\">";
								echo "<label>Agencia: </label>";
								echo "<select>";									
										echo "<option>Seleccionar</option>";
										while($reg=mysqli_fetch_array($registrosAgencia)){ 
											$nombre_agencia = $reg['nombre_agencia'];
											if($nombre_agencia==$agencia){
												echo "<option value=\"$nombre_agencia\" selected=selected >$nombre_agencia</option>";
											}else{
												echo "<option value=\"$nombre_agencia\">$nombre_agencia</option>";
											}
											
										}
								echo "</select>";
							echo "</div><br>";
							
							echo "<div class=\"label_sala\">";
								echo "<label>Mostrar</label>";
								echo "<select>";
									if($mostrar=='si'){
										echo "<option value=\"si\" selected=selected >SI</option>";
										echo "<option value=\"no\" >NO</option>";
									}
									if($mostrar=='no'){
										echo "<option value=\"si\" >SI</option>";
										echo "<option value=\"no\" selected=selected>NO</option>";
									}
								echo "</select>";
							echo "</div><br>";
							
							echo "<input type=\"submit\" value=\"Actualizar\"/> &nbsp;&nbsp;&nbsp;&nbsp; <input type=\"button\" value=\"Cancelar\" onclick=\"window.location='supervisores.php';\" />";
						  echo "</form>";
						echo "</div>";
					echo "</div>";
				?>
			</div>			
		</div>
	
	</section>
    
	
	
	
  </body>
</html>