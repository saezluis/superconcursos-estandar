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
      <div class="ed-container">
        <div class="ed-item web-30">
          <div id="titulo-section-fotos">
            <h1>Fotos por cadena</h1>
          </div>
        </div>
        <div class="ed-item web-70"></div>
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
                  <th>Cadena</th>
                  <th>No Revisadas</th>
                  <th>Ganadoras</th>
                  <th>No Ganadoras</th>
                  <th>Pendientes</th>
                </tr>
              </thead>
              <tbody>
                <tr class="tr-center">
                  <td class="td-padd">Adelco</td>
                  <td class="td-padd">0</td>
                  <td class="td-padd">0</td>
                  <td class="td-padd">0</td>
                  <td class="td-padd">0</td>
                </tr>
                <tr class="tr-center">
                  <td class="td-padd">Alvi</td>
                  <td class="td-padd">13</td>
                  <td class="td-padd">7</td>
                  <td class="td-padd">0</td>
                  <td class="td-padd">0</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>