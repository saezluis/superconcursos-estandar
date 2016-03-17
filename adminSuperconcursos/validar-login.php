<?php
header('Content-Type: text/html; charset=utf-8');
/* start the session */
session_start();
	
	 $host_db = "localhost";
	 $user_db = "root";
	 $pass_db = "123";
	 $db_name = "super";
	 $tbl_name = "cuenta";

		// Connect to server and select databse.
		$con=mysqli_connect("$host_db", "$user_db", "$pass_db")or die("Cannot Connect to Data Base.");

		mysqli_select_db($con,"$db_name")or die("Cannot Select Data Base");

		// sent from form
		//$username = $_POST['username'];
		$password = $_POST['password'];

		$sql= "SELECT * FROM $tbl_name WHERE password ='$password'";

		$result=mysqli_query($con,$sql);

		// counting table row
		$count = mysqli_num_rows($result);
		// If result matched $username and $password

		if($count == 1){

		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $password;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (100 * 100 * 60) ;//ojo quitarle las 3 horas a la sesion
	
			header("Location:index.php");
			
			//echo "<br> Bienvenido! " . $_SESSION['username'];
			
		}
	 else {
		 
		//echo "<div id=\"strip\"></div>";
		//echo "<header class=\"grupo\">";
		  //echo "<div class=\"caja tablet-50 web-50\">";
			//echo "<div id=\"logo\" class=\"arriba\"><img src=\"img/logo.png\"></div>";
			//echo "<div id=\"box--check\">";
			  //echo "<div id=\"royalito-check\"><img src=\"img/royalito.png\"></div>";
			  //echo "<div id=\"base--globo\"><img src=\"img/globo-cyan.png\"></div>";
			  //echo "<p class=\"garabatos\">#!$:@%=#!$:@%=</p>";
			//echo "</div>";
		  //echo "</div>";
		  //echo "<div class=\"caja tablet-50 web-50\">";
			//echo "<div id=\"alerta\">";
			  echo "<h1>Algo ocurrió mal :(</h1>";
			  echo "<p class=\"alarm\">Tu correo o contraseña está incorrecta, haz click <a href=\"login.php\">aquí  </a>para volver a intentarlo.</p>";
			//echo "</div>";
		  //echo "</div>";
		//echo "</header>";
		
	}
?>