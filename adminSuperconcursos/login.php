<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/scripts.js"></script>
    <title>Administrador Tresmontes Lucchetti</title>
  </head>
  <body>
    <div id="cajalogin">
      <header><img src="img/logo_super_concurso.png" alt="Logearse"/></header>
      <form id="login" method="post" action="validar-login.php">
        <label>Ingresa tu contraseña </label>
        <input name="password" type="password"/>
        <input type="submit" value="ingresar"/>
      </form>
    </div>
  </body>
</html>