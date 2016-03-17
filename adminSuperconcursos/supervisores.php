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
		
		$registrosAgencia=mysqli_query($conexion,"select * from agencias")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosSupervisor=mysqli_query($conexion,"select * from supervisor")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		
		//-------------- INICIO Paginador ------------------
		
		//Limito la busqueda a 10 registros por pagina
		$TAMANO_PAGINA = 15; 
		
		//examino la página a mostrar y el inicio del registro a mostrar 
		@$pagina = $_GET["pagina"]; 
		if (!$pagina) { 
			$inicio = 0; 
			$pagina=1; 
		} 
		else { 
			$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
		}
		
		$num_total_registros = mysqli_num_rows($registrosSupervisor); 
		//calculo el total de páginas 
		$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
		
		$ssql = "select * from supervisor limit " . $inicio . "," . $TAMANO_PAGINA; 
		$rs = mysqli_query($conexion,$ssql); 
		
		//-------------- FIN Paginador ------------------
		
	
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
            <h1>Agregar Supervisor</h1>
          </div>
        </div>
        <div class="ed-item web-70"></div>
      </div>
    </section>
    <section>
      <div id="add_cadena">
        <div class="ed-container">
          <div class="ed-item web-30">
            <form id="add_sala" method="post" action="agregar-supervisor.php">
              <label>Nombre</label>
              <input type="text" name="nombre_supervisor" required="required"/>
              <label>Mail</label>
              <input type="text" name="email_supervisor" required="required"/>
              <label>Clave</label>
              <input type="text" name="clave_supervisor" required="required"/>
              <label>Región</label>
              <select name="region" required>
                <option>--seleccione--</option>
				<option value="Región Metropolitana">Región Metropolitana</option>
				<option value="XV Arica y Parinacota">XV Arica y Parinacota</option>
				<option value="I Tarapacá">I Tarapacá</option>
				<option value="II Antofagasta">II Antofagasta</option>
				<option value="III Atacama">III Atacama</option>
				<option value="IV Coquimbo">IV Coquimbo</option>
				<option value="V Valparaíso">V Valparaíso</option>
				<option value="VI O'Higgins">VI O'Higgins</option>
				<option value="VII Maule">VII Maule</option>
				<option value="VIII Biobío">VIII Biobío</option>
				<option value="IX La Araucanía">IX La Araucanía</option>
				<option value="XIV Los Ríos">XIV Los Ríos</option>
				<option value="X Los Lagos">X Los Lagos</option>
				<option value="XI Aysén">XI Aysén</option>
				<option value="XII Magallanes y Antártica">XII Magallanes y Antártica</option>
              </select>
              <label>Agencia</label>
              <select name="agencia" required> 
				<?php
					echo "<option>--seleccione--</option>";
					while($reg=mysqli_fetch_array($registrosAgencia)){
						$nombre_agencia = $reg['nombre_agencia'];
						echo "<option value=\"$nombre_agencia\">$nombre_agencia</option>";
					}
					
					
				?>
              </select>
              <input type="submit" value="Grabar"/>
            </form>
          </div>
		  
          <div class="ed-item web-70">
            <table class="add_table">
              <thead>
                <tr>
                  <th>Supervisor</th>
                  <th>Región</th>
                  <th>Agencia</th>
                  <th>Mostrar</th>
				  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
				<?php
					while($reg=mysqli_fetch_array($rs)){
						
						$id_supervisor = $reg['id_super'];
						$nombre_super = $reg['nombre_super'];
						$region = $reg['region'];
						$agencia = $reg['agencia'];
						$mostrar = $reg['mostrar'];
						
					
						echo "<tr class=\"tr-center\">";
							echo "<td class=\"td-padd\"><a href=\"#inline-edit\" class=\"various\">$nombre_super</a></td>";
							echo "<td class=\"td-padd\">$region</td>";
							echo "<td class=\"td-padd\">$agencia</td>";
							echo "<td class=\"td-padd\">";
								echo "<form id=\"mostrar\">";
									echo "<select>";
										if($mostrar=='si'){
											echo "<option value=\"si\" selected=selected >SI</option>";
											echo "<option value=\"no\">NO</option>";
										}
										if($mostrar=='no'){
											echo "<option value=\"si\">SI</option>";
											echo "<option value=\"no\" selected=selected >NO</option>";
										}										
									echo "</select>";
								echo "</form>";
							echo "</td>";
							echo "<td class=\"td-padd\"> <a href=\"modificar-supervisor.php?id_supervisor=",urlencode($id_supervisor)," \" class=\"editar-datos\"> </a></td>";
						echo "</tr>";
					}
					
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	  <?php
			  echo "<br>";
			  echo "<br>";
			  
			  echo "<div align=\"center\">";
			  echo "<h3>";
			  
			  if ($total_paginas > 1){ 
				for ($i=1;$i<=$total_paginas;$i++){ 
					if ($pagina == $i) 
						//si muestro el índice de la página actual, no coloco enlace 
						
						echo "<span style=\"color:red\" class=\"\">" . $pagina . "</span>" . " "; 
						
					else 
						//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 				
						echo "<a href='supervisores.php?pagina=" . $i . "'>"  . $i .  "</a> " ; 
					}   
				}	
			  
			  echo "</h3>";
			  echo "</div>";
				
	  ?>
	  
    </section>
  </body>
</html>