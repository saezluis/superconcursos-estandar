<?php
header( "refresh:5000;url=selecciona-campana.php" );

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
	
	<script type="text/javascript">

	(function () {
		var timeLeft = 5000,
			cinterval;

		var timeDec = function (){
			timeLeft--;
			document.getElementById('countdown').innerHTML = timeLeft;
			if(timeLeft === 0){
				clearInterval(cinterval);
			}
		};

		cinterval = setInterval(timeDec, 1000);
	})();

	</script>
  </head>
  <body>	
    
    <header class="normal">

      <div class="ed-container">
          <div class="ed-item base-100 tablet-100 web-50 absoluto">
          <div class="logo"><img src="img/logo.svg"/></div>
          </div>

           <?php
			include "menu.php";
		  ?>

      </div>
    </header>

    <section id="interior" class="ed-container">
      <div class="ed-item base-100">
<!--             <h1 class="centrar">Información:</h1> -->
			<h1 class="centrar bottom-margen">Foto subida con éxito</h1>         
<!-- 				<br>
				<br> -->
				<!-- <h1 class="centrar">De vuelta a seleccionar campaña en: <span id="countdown">5</span>.</h1>	 -->   
      </div>
      <div class="ed-item base-100">
			<a href="selecciona-campana.php" class="helperbuttons">Volver a seleccionar campaña</a>   
      </div>
      <div class="ed-item base-100">
			<a href="subir-imagen.php" class="helperbuttons">Tomar otra foto</a>   
      </div>
    </section>
    <footer>
      <div class="ed-container total">
          <div class="ed-item base-100">
            <!-- <img src="img/fot.png"/> -->
            <p>Todos los derechos reservados</p>
          </div>
      </div>
    </footer>   
  </body>
</html>


<?php

/*
id_sala - saco el id especifico con el nombre de la sala
id_rut - lo saco en variable de sesion correo contra la BD
id_campana - lo mando por get y despues por variable de sesion - listo
id_exhibicion - pasada por get y guardada en variable de sesion - listo
nombre_foto
*/

include_once 'config.php';
		
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");

	//$rut = $_SESSION['username'];
	//$rut = 1;
	/*
	$registroUsuario=mysqli_query($conexion,"select * from cuenta WHERE rut='$rut'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registroUsuario)){
		$rut_usuario = $reg['rut'];
	}
	*/
	$rut_usuario = 1;
	//$id_campana = $_SESSION['campana_sesion'];	
	//$id_exhibicion = $_SESSION['exhibicion_sesion'];
	$id_campana = 1;	
	$id_exhibicion = 1;
	
	
	//$id_sala = $_SESSION['id_sala'];
	$id_sala = 1;
	
	//$registroSala=mysqli_query($conexion,"select id_sala from sala WHERE nombre='$nombre_sala'") or die("Problemas en el select:".mysqli_error($conexion));
	
	//if($reg=mysqli_fetch_array($registroSala)){
		//$id_sala = $reg['id_sala'];
	//}
	
/*
echo "id_campana: ".$id_campana;
echo "<br>";
echo "id_exhibicion: ".$id_exhibicion;
echo "<br>";
echo "id_rut: ".$rut_usuario;
echo "<br>";
echo "id_sala: ".$id_sala;
echo "<br>";
*/

include 'WideImage/lib/WideImage.php';
	
	$target_dir = "fotos-concursos/";
	
	$nombreFoto = basename($_FILES["upload"]["name"]);
	
	//$fileToUpload = $_FILES['fileToUpload']['name'];

	//echo $nombreFoto;
	
	$nombre_final = 'estandar.jpg';
	
	move_uploaded_file($_FILES['upload']['tmp_name'],"$nombre_final");
		
	$newName = rand(0000,1111);
	
	$newNameFinal = $newName.'.jpg';
	   
	WideImage::load('estandar.jpg')->resize(800, null)->saveToFile('nombreFinal.jpg');
   	
	rename("nombreFinal.jpg",$target_dir . $newNameFinal);
	
	//echo "<br>";
	//echo "<br>";
	//echo "asi quedo el nombre para el archivo de nombre: ".$newNameFinal;
	
	
	
	/*
	mysqli_query($conexion,"insert into foto(id_sala,id_rut,id_campana,id_exhibicion,nombre_foto,estado) values 
									('$id_sala',
									'$rut_usuario',									
									'$id_campana',
									'$id_exhibicion',
									'$newNameFinal',
									'No Revisada'
									)")
	or die("Problemas con el insert de los servicios");
	*/
	
	mysqli_query($conexion,"insert into registro(id_member,id_supervisor,id_sala,id_campana,id_exhibicion,nombre_foto,fecha,comentario) values 
									(1,
									1,									
									1,
									1,
									1,									
									'$newNameFinal',
									'',
									''
									)")
	or die("Problemas con el insert de la foto");
	
	
	//Subir imagen
	
	//$xd = basename($_FILES["upload"]["name"]);
	/*
	if($xd!=''){
			
			$target_dir = "fotos-concursos/";
			$target_file = $target_dir . basename($_FILES["upload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["upload"]["tmp_name"]);
				if($check !== false) {
					echo "El archivo es una imagen - " . $check["mime"] . ".";
					echo "<br>";
					$uploadOk = 1;
				} else {
					echo "El archivo no es una imagen.";
					echo "<br>";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Lo sentimos, el archivo ya existe.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["upload"]["size"] > 50000000) {
				echo "Lo sentimos, el archivo es muy grande.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "Lo sentimos, solo archivos JPG, JPEG, PNG & GIF son permitidos.";
				echo "<br>";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Lo sentimos, su archivo no fue cargado.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
					echo "El archivo ". basename( $_FILES["upload"]["name"]). " a sido cargado.";
					echo "<br>";
				} else {
					echo "Lo sentimos, hubo un error al subir el archivo.";
					echo "<br>";
				}
			}
		
		$nombreFoto = basename($_FILES["upload"]["name"]);
		
	}else{
		echo "imagen no cumple resolucion";
		echo "<br>";
	}
	*/
	
	
	
?>