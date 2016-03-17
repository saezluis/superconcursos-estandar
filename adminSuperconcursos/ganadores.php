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
						<h1>Fotos / Ganadores</h1>
					</div>
				</div>
				<div class="ed-item web-60">
					<div id="menu-aux">
						<ul class="aux-menu">
							<li><a href="#" title="Descargar informe ganadores">Informe ganadores</a></li>
							<li><a href="#" title="Descargar informe no ganadores">Informe no ganadores</a></li>
							<li><a href="#" title="Descargar informe pendientes">Informe pendiente</a></li>
							<form id="find">
								<h4>buscar foto</h4>
								<select>
									<option>Código foto</option>
									<option>Sala</option>
									<option>Fecha</option>
								</select>
								<input type="search" placeholder=""/>
								<input type="submit" buscar="buscar"/>
							</form>
						</ul>
					</div>
				</div>
				<div class="ed-item web-100">
					<div class="tabla-concurso no-padding">
						<table class="table">
							<thead>
								<tr class="titulosBar">
									<th>Ver foto</th>
									<th>Sala</th>
									<th>TMLUC</th>
									<th>Cadena</th>
									<th>Fecha</th>
									<th>Estado Foto</th>
									<th>Mostrar</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="#inline" class="various"><img src="img/ver-foto.svg"/></a></td>
									<td>EL 9 HUALAÑÉ</td>
									<td>OR072</td>
									<td>Otros</td>
									<td>04-12-2015</td>
									<td class="loose">NO GANADORA</td>
									<td>
										<form id="selectorGanador">
											<select>
												<option>si</option>
												<option>no</option>
											</select>
										</form>
									</td>
									<td> <a href="#"><img src="img/trash.svg"/></a></td>
								</tr>
								<tr>
									<td><a href="#inline" class="various"><img src="img/ver-foto.svg"/></a></td>
									<td>EL 9 HUALAÑÉ</td>
									<td>OR072</td>
									<td>Otros</td>
									<td>04-12-2015</td>
									<td class="win">NO GANADORA</td>
									<td>
										<form id="selectorGanador">
											<select>
												<option>si</option>
												<option>no</option>
											</select>
										</form>
									</td>
									<td> <a href="#"> <img src="img/trash.svg"/></a></td>
								</tr>
								<tr>
									<td><a href="#inline" class="various"><img src="img/ver-foto.svg"/></a></td>
									<td>EL 9 HUALAÑÉ</td>
									<td>OR072</td>
									<td>Otros</td>
									<td>04-12-2015</td>
									<td>NO GANADORA</td>
									<td>
										<form id="selectorGanador">
											<select>
												<option>si</option>
												<option>no</option>
											</select>
										</form>
									</td>
									<td> <a href="#"> <img src="img/trash.svg"/></a></td>
								</tr>
								<tr>
									<td><a href="#"><img src="img/ver-foto.svg"/></a></td>
									<td>EL 9 HUALAÑÉ</td>
									<td>OR072</td>
									<td>Otros</td>
									<td>04-12-2015</td>
									<td>NO GANADORA</td>
									<td>
										<form id="selectorGanador">
											<select>
												<option>si</option>
												<option>no</option>
											</select>
										</form>
									</td>
									<td> <a href="#"><img src="img/trash.svg"/></a></td>
								</tr>
								<tr>
									<td><a href="#inline" class="various"><img src="img/ver-foto.svg"/></a></td>
									<td>EL 9 HUALAÑÉ</td>
									<td>OR072</td>
									<td>Otros</td>
									<td>04-12-2015</td>
									<td>NO GANADORA</td>
									<td>
										<form id="selectorGanador">
											<select>
												<option>si</option>
												<option>no</option>
											</select>
										</form>
									</td>
									<td> <a href="#"><img src="img/trash.svg"/></a></td>
								</tr>
								<tr>
									<td><a href="#inline" class="various"><img src="img/ver-foto.svg"/></a></td>
									<td>EL 9 HUALAÑÉ</td>
									<td>OR072</td>
									<td>Otros</td>
									<td>04-12-2015</td>
									<td>NO GANADORA</td>
									<td>
										<form id="selectorGanador">
											<select>
												<option>si</option>
												<option>no</option>
											</select>
										</form>
									</td>
									<td> <a href="#"> <img src="img/trash.svg"/></a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		<section class="paginacion">
			<div class="ed-container">
				<div class="ed-item base-100">
					<ul>
						<li><a href="#" class="inicio"> Primero</a></li>
							<li><a href="#" class="activ-pager">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">8</a></li>
							<li><a href="#">9</a></li>
							<li><a href="#">10</a></li>
							<li><a href="#" class="final">Último </a></li>
						</ul>
						<div id="inline">
							<div class="ed-item base-100">
								<h1>Foto nº<span>
									
								019</span></h1>
								<div class="scary-monsters-1">
									<div class="img-salas"><img src="img/img-salas/1019.jpg"/></div>
								</div>
								<div class="scary-monsters">
									<div id="caja-data">
										<h3>Datos exhibición</h3>
										<ul class="datos__exhibicion">
											<li class="reponedor">Datos reponedor</li>
											<li>Foto subida por: <span>
												
											Claudio patricio Silvestre Veliz</span></li>
											<li>Mail: <span>claudio.psv@gmail.com</span></li>
											<li>Cel: <span>86626239</span></li>
											<li>Rut: <span>10408277-7</span></li>
										</ul>
									</div>
									<div id="caja-data">
										<h3>Datos internos</h3>
										<ul style="margin:0.5em;" class="datos__exhibicion">
											<li>Fecha: <span>
												
											04-12-2015</span></li>
											<li>Jefe Grupo: <span>Ricardo Caro</span></li>
											<li>Rut: <span>15506389-0</span></li>
											<li>Supervisor: <span>Claudio Silvestre</span></li>
											<li>Integrante 1: <span>Ricardo Caro</span></li>
											<li>Integrante 1: <span>15506389-0</span></li>
											<li>Rut Int. 1: <span>15506389-0</span></li>
											<li>Exhibidor: <span>Cabecera góndola</span></li>
										</ul>
									</div><a href="#" class="revision">Revisar fotos</a>
								</div>
							</div>
						</div>
						</div>
					</div>
				</section>
			</body>
		</html>																											