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
    <section class="header">
      <div class="brand abcenter"><img src="img/logo.svg"/></div>
    </section>
    <input id="menu-button--checkbox" type="checkbox" class="menu-button--checkbox"/>
    <label for="menu-button--checkbox" class="menu-button--label"><i class="fa fa-bars"><img src="img/sanwuich.svg"/></i></label>
    <nav class="nav"><a href="#" class="nav__item">Bases</a><a href="#" class="nav__item">Premios</a><a href="#" class="nav__item">Ganadores</a><a href="#" class="nav__item">Contacto</a></nav>
    <section id="content">
      <div class="ed-container">
        <div class="ed-item base-100">
          <div id="campanas">
            <h1>Subir foto</h1>
            <div class="ed-item base-100">
              <form id="seleccionCampana" method="post" action="procesar-subir-imagen.php" enctype="multipart/form-data">
                <div class="ticket">
                  <div id="campo_info">
					<?php
                    echo "<p>";
                      echo "$nombre_cadena <span> / </span><span> $nombre_sala </span>";
                    echo "</p>";
					?>
                  </div><img src="img/ticket.svg" class="ok"/>
                </div>
                <div class="upload">
                  <input type="file" name="upload" id="upload" accept="image/*" capture="camera" onchange="this.form.submit()"/>
                </div>
                <p>Hacer foto</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
  </body>
</html>