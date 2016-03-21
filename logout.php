<?php

session_start();

session_destroy();

header('Content-Type: text/html; charset=UTF-8'); 

header('Location: index.html');

echo "Sesión finalizada";

?>