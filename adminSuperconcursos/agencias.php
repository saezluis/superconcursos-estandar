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
		<?php
		
			include_once 'config.php';
		
			$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
			$acentos = $conexion->query("SET NAMES 'utf8'");
			
			$registrosAgencia=mysqli_query($conexion,"select * from agencias")
			or die("Problemas en el select:".mysqli_error($conexion));
		
		?>
      <div class="ed-container">
        <div class="ed-item web-30">
          <div id="titulo-section-fotos">
            <h1>Agregar Agencia</h1>
          </div>
        </div>
        <div class="ed-item web-70">
          <div id="datos__ADD">
            <form id="add">
              <input type="text" placeholder="Agregar Agencia" required />
              <input type="submit" value="Grabar"/>
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
                  <th>Agencia</th>
                  <th>Mostrar</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
				<?php					
					while($reg=mysqli_fetch_array($registrosAgencia)){
						$id_agencia = $reg['id_agencia'];
						$nombre_agencia = $reg['nombre_agencia'];
						$mostrar = $reg['mostrar'];

						echo "<tr class=\"tr-center\">";
							echo "<td class=\"td-padd\">$id_agencia</td>";
							echo "<td class=\"td-padd\">$nombre_agencia</td>";
							echo "<td class=\"td-padd\">";
								echo "<form id=\"mostrar\">";
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
								echo "</form>";
							echo "</td>";
							echo "<td class=\"td-padd\"> <a href=\"#\" class=\"editar-datos\"> </a></td>";
						echo "</tr>";
					}
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div id="inline-edit">
        <div class="ed-item base-100">
          <h1>Agencia 1</h1>
          <form id="editalight">
            <input type="text" value="Actualizar nombre agencia"/>
            <div class="label">
              <label>Mostrar</label>
              <select>
                <option>SI</option>
                <option>NO</option>
              </select>
            </div>
            <input type="submit" value="Actualizar"/>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>