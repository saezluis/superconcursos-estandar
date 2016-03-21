<?php
	echo "<div class=\"ed-item base-100 tablet-100 web-50 relaticos\">";
        echo "<label for=\"show-menu\" class=\"show-menu\">Menu</label>";
        echo "<input type=\"checkbox\" id=\"show-menu\" role=\"button\">";

		echo "<ul id=\"menu\">";
            echo "<li><a href=\"#\">Inicio</a></li>";
            echo "<li><a href=\"#\">Bases</a></li>";
            echo "<li><a href=\"#\">Premios</a></li>";
            echo "<li><a href=\"#\">Ganadores</a></li>";
            echo "<li><a href=\"#\">Contacto</a></li>";
        echo "</ul>";
        echo "<a href=\"logout.php\" class=\"cerrarSesion\">cerrar sesión</a>";
	echo "</div>";
?>