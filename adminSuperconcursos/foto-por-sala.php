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
	
				$id_campana = $_SESSION['id_campana'];
				
				//echo "id campana: ".$id_campana;
	
				$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
				$acentos = $conexion->query("SET NAMES 'utf8'");
				
				@$id_foto_next = @$_GET['id_foto_next'];				
				
				if(@$id_foto_next!=''){
				
					$registrosFoto=mysqli_query($conexion,"SELECT * FROM foto WHERE id_foto = '$id_foto_next' AND id_campana = '$id_campana' ")or die("Problemas en el select:".mysqli_error($conexion));										
				
				}else{
					$registrosFoto=mysqli_query($conexion,"SELECT * FROM foto WHERE id_campana = '$id_campana' ORDER BY id_foto DESC LIMIT 1")or die("Problemas en el select:".mysqli_error($conexion));										
				}

				
				if($reg=mysqli_fetch_array($registrosFoto)){
					$id_foto = $reg['id_foto'];
					$id_sala = $reg['id_sala'];
					$id_rut = $reg['id_rut'];
					$id_campana = $reg['id_campana'];
					$id_exhibicion = $reg['id_exhibicion'];
					$nombre_foto = $reg['nombre_foto'];
					$fecha_foto =  $reg['fecha'];
					$estado_foto = $reg['estado'];
					$mostrar_foto = $reg['mostrar'];
					$premio_foto = $reg['premio'];
					$observaciones_foto = $reg['observaciones'];
					//$estado = $reg['estado'];
				}
				
				$registrosSala=mysqli_query($conexion,"SELECT * FROM sala WHERE id_sala='$id_sala' ")or die("Problemas en el select:".mysqli_error($conexion));
				
				if($reg=mysqli_fetch_array($registrosSala)){
					$nombre_sala = $reg['nombre'];
					$codigo_TMLUC = $reg['codigo_TMLUC'];
					$direccion = $reg['direccion'];
					$comuna = $reg['comuna'];
					$id_cadena = $reg['id_cadena'];
				}
				
				$registrosOtrasFotos=mysqli_query($conexion,"SELECT * FROM foto WHERE id_sala='$id_sala' AND id_foto!='$id_foto' AND id_campana = '$id_campana' ")or die("Problemas en el select:".mysqli_error($conexion));				
				
				
				$registrosCadena=mysqli_query($conexion,"SELECT * FROM cadena WHERE id_cadena='$id_cadena' ")or die("Problemas en el select:".mysqli_error($conexion));
				
				if($reg=mysqli_fetch_array($registrosCadena)){
					$nombre_cadena = $reg['nombre'];
				}
				
				$registrosSalaCorregir=mysqli_query($conexion,"SELECT * FROM sala WHERE id_cadena='$id_cadena' ")or die("Problemas en el select:".mysqli_error($conexion));
				
				
				
				
				//SELECT * FROM foto ORDER BY id_foto DESC LIMIT 1
				
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
            <h1>Fotos por sala y concurso</h1>
          </div>
        </div>
        <div class="ed-item web-70">
          <div id="datos__concurso">
            <ul>
				<?php
					
					echo "<li class=\"item__info__concurso\">Sala: <span>$nombre_sala</span></li>";
					echo "<li class=\"item__info__concurso\">TMLUC: <span>$codigo_TMLUC</span></li>";
					echo "<li class=\"item__info__concurso\">Dirección: <span>$direccion</span></li>";
					echo "<li class=\"item__info__concurso\">Comuna: <span>$comuna</span></li>";
					echo "<li class=\"item__info__concurso\">Cadena: <span>$nombre_cadena</span></li>";
				?>
            </ul>
          </div>
		  <?php
          echo "<form id=\"corregirSala\" method=\"post\" action=\"corregir-sala.php\">";
            echo "<p>Corregir Sala</p>";						
				echo "<select name=\"sala_cambiar\" width=\"190\" style=\"width: 190px\" onchange=\"this.form.submit()\">";
				  echo "<option>Seleccionar</option>";
				  while($reg=mysqli_fetch_array($registrosSalaCorregir)){
					$id_sala_corregir = $reg['id_sala'];
					$nombre_sala_corregir = $reg['nombre'];
					echo "<option value=\"$id_sala_corregir\">$nombre_sala_corregir</option>";
				  }
				echo "</select>";
				//aqui mando la wea oculta	
				echo "<input type=\"text\" name=\"id_sala_vieja\" value=\"$id_sala\" hidden=hidden>";			
          echo "</form>";
		  ?>
        </div>
      </div>
    </section>
    <section id="sala-foto">
      <div class="ed-container">
        <div class="ed-item web-100">
          <div id="all">
            <div class="ed-container">
              <div class="ed-item web-30">
				<?php
					//echo "<div id=\"foto-sala\"> <a href=\"#inline\" class=\"various\"><img src=\"../fotos-concursos/$nombre_foto\"/> </a></div>";
					echo "<div id=\"foto-sala\"><a href=\"detalle-fotos.php?deta=",urlencode($id_foto)," \" class=\"various\"> <img src=\"../fotos-concursos/$nombre_foto\"/> </a></div>";				
				?>	
              </div>
              <div class="ed-item web-70">
                <form id="sala-concurso" method="post" action="grabar-foto-sala.php">
                  <div class="ed-container">
                    <div class="ed-item web-50">
						<?php
							$phpdate = strtotime( $fecha_foto );
							$fecha_mostrar = date( 'd-m-Y', $phpdate );
							echo "<p>Fecha: <span>$fecha_mostrar</span></p>";
						?>
					  <!--
                      <label>Concurso</label>
                      <select class="select">
                        <option>Luchetti Teletón</option>
                      </select>
					  -->
                      <label>Estado de foto</label>
                      <select name="estado_foto" class="select">
						<option <?php if ($estado_foto == "No Revisada"): ?> selected="selected" value="No Revisada" <?php endif; ?>>No Revisada</option>
                        <option <?php if ($estado_foto == "Ganadora"): ?> selected="selected" value="Ganadora" <?php endif; ?>>Ganadora</option>
						<option <?php if ($estado_foto == "No Ganadora"): ?> selected="selected" value="No Ganadora"<?php endif; ?>>No Ganadora</option>
						<option <?php if ($estado_foto == "Pendiente"): ?> selected="selected" value="Pendiente"<?php endif; ?>>Pendiente</option>
						<!--
						<option value="No Revisada">No Revisada</option>
                        <option value="Ganadora">Ganadora</option>
                        <option value="No Ganadora">No Ganadora</option>
                        <option value="Pendiente">Pendiente</option>
						-->
                      </select>
                      <label>Mostrar</label>
                      <select name="mostrar" class="select">
						<option <?php if ($mostrar_foto == "Si"): ?> selected="selected" value="Si" <?php endif; ?>>Si</option>
						<option <?php if ($mostrar_foto == "No"): ?> selected="selected" value="No" <?php endif; ?>>No</option>
						<!--
                        <option value="si">SI</option>
                        <option value="no">NO</option>
						-->
                      </select>
                    </div>
                    <div class="ed-item web-50">
                      <label>Premio</label>
					  <?php
						if($premio_foto!=''){
							echo "<input name=\"premio\" type=\"number\" class=\"input\" value=\"$premio_foto\" />";
						}else{
							echo "<input name=\"premio\" type=\"number\" class=\"input\"/>";
						}
							
					  ?>
                      <label>Observaciones</label>
						<?php
							if($observaciones_foto!=''){
								echo "<textarea name=\"observaciones\" class=\"text-area\">$observaciones_foto</textarea>";
							}else{
								echo "<textarea name=\"observaciones\" class=\"text-area\"></textarea>";
							}
							
						?>
                      <div id="here_comes_to_night">
					  <?php
						echo "<input type=\"text\" name=\"id_foto_update\" value=\"$id_foto\" hidden=hidden>";
					  ?>
                        <input type="submit" value="Grabar" onclick="alert('Datos procesados');" />
						
						<?php
							echo "<a href=\"borrar-foto.php?id_foto_erase=",urlencode($id_foto)," \" onclick=\"return confirm('¿ Seguro que desea borrar la foto ?'); \"><button type=\"button\"></button></a>"; 
						?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ed-container">
        <div class="ed-item web">
          <h1 style="padding: 0em 0em 0.6em 0.5em; font-size:1.5em;">Otras fotos</h1>
		  <?php
			while($reg2=mysqli_fetch_array($registrosOtrasFotos)){
		
			$id_foto2 = $reg2['id_foto'];
			$id_sala = $reg2['id_sala'];
			$id_rut = $reg2['id_rut'];
			$id_campana = $reg2['id_campana'];
			$id_exhibicion = $reg2['id_exhibicion'];
			$nombre_foto2 = $reg2['nombre_foto'];
			$fecha_foto2 =  $reg2['fecha'];
			$estado_foto2 = $reg2['estado'];
			$mostrar_foto2 = $reg2['mostrar'];
			$premio_foto2 = $reg2['premio'];
			$observaciones_foto2 = $reg2['observaciones'];
			
		
          echo "<div id=\"all\">";
            echo "<div class=\"ed-container\">";
				echo "<div class=\"ed-item web-30\">";     
				
					//echo "<div class=\"foto--producto\"> <a href=\"detalle-producto.php?deta=",urlencode($detalle)," \"> <img src=\"img2/".$reg['foto_producto']."\"> </a> </div>";
					echo "<div id=\"foto-sala\"><a class=\"various\" href=\"detalle-fotos.php?deta=",urlencode($id_foto2)," \"> <img src=\"../fotos-concursos/$nombre_foto2\"/> </a></div>";
					
				echo "</div>";
				echo "<div class=\"ed-item web-70\">";
					echo "<form id=\"sala-concurso\" method=\"post\" action=\"grabar-foto-sala.php\">";
						echo "<div class=\"ed-container\">";
							echo "<div class=\"ed-item web-50\">";
							$phpdate2 = strtotime( $fecha_foto2 );
							$fecha_mostrar2 = date( 'd-m-Y', $phpdate2 );
							echo "<p>Fecha: <span>$fecha_mostrar2</span></p>";
							/*
							echo "<label>Concurso</label>";
							echo "<select class=\"select\">";
							echo "<option>Luchetti Teletón</option>";
							echo "</select>";
							*/
							echo "<label>Estado de foto</label>";
								echo "<select class=\"select\" name=\"estado_foto\">";
								?>
									<option <?php if ($estado_foto2 == "No Revisada"): ?> selected="selected" value="No Revisada" <?php endif; ?>>No Revisada</option>
									<option <?php if ($estado_foto2 == "Ganadora"): ?> selected="selected" value="Ganadora" <?php endif; ?>>Ganadora</option>
									<option <?php if ($estado_foto2 == "No Ganadora"): ?> selected="selected" value="No Ganadora"<?php endif; ?>>No Ganadora</option>
									<option <?php if ($estado_foto2 == "Pendiente"): ?> selected="selected" value="Pendiente"<?php endif; ?>>Pendiente</option>
								<?php	
									//echo "<option>No Revisada</option>";
									//echo "<option>Ganadora</option>";
									//echo "<option>No Ganadora</option>";
									//echo "<option>Pendiente</option>";
								echo "</select>";
							echo "<label>Mostrar</label>";
								echo "<select class=\"select\" name=\"mostrar\">";
								?>
									<option <?php if ($mostrar_foto2 == "Si"): ?> selected="selected" value="Si" <?php endif; ?>>Si</option>
									<option <?php if ($mostrar_foto2 == "No"): ?> selected="selected" value="No" <?php endif; ?>>No</option>
								<?php
									//echo "<option>SI</option>";
									//echo "<option>NO</option>";
								echo "</select>";
							echo "</div>";
							echo "<div class=\"ed-item web-50\">";
							
							echo "<label>Premio</label>";
							if($premio_foto2!=''){
								echo "<input name=\"premio\" type=\"number\" class=\"input\" value=\"$premio_foto2\" />";
							}else{
							echo "<input name=\"premio\" type=\"number\" class=\"input\"/>";
							}							
							//echo "<input type=\"number\" class=\"input\"/>";
							
							echo "<label>Observaciones</label>";
							if($observaciones_foto2!=''){
								echo "<textarea name=\"observaciones\" class=\"text-area\">$observaciones_foto2</textarea>";
							}else{
								echo "<textarea name=\"observaciones\" class=\"text-area\"></textarea>";
							}
							//echo "<textarea class=\"text-area\"></textarea>";
							echo "<input type=\"text\" name=\"id_foto_update\" value=\"$id_foto2\" hidden=hidden>";
							echo "<div id=\"here_comes_to_night\">";
							echo "<input type=\"submit\" value=\"Grabar\" onclick=\"alert('Datos procesados');\"/>";
							echo "<button type=\"button\"></button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</form>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
		  }
		  
		  ?>
        </div>
      </div>
    </section>
    <section class="paginacion">
      <div class="ed-container">
        <div class="ed-item base-100">
          <form id="adelante">
			<?php
			/*
			$num_rows = $_SESSION['contador_fotos'];
			
			echo "Numero de fotos: ".$num_rows;
			echo "<br>";
			echo "<br>";
			echo "<br>";
			*/
			$id_foto_next = $id_foto - 1;			
			if($id_foto_next > 0){
					echo "<a href=\"foto-por-sala.php?id_foto_next=",urlencode($id_foto_next)," \"> <button type=\"button\" class=\"next\">Siguiente</button> </a>";
					
			}else{
				echo "";
			}
			?>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>