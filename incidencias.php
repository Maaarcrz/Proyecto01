<!DOCTYPE html>
<html>
<head>
	<title>HOME · Casal</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
	<div style="display:flex; align-items: center">
	    <?php
	        include "./header.php";
	    ?>
	    <p style="font-family: Montserrat; margin-left: 70%"><b>Sitio personal de:</b> 
			<?php
				echo $_SESSION['nombre'];
			?>
		</p>
	</div>
	<header id="main-header" >
		<nav class="cab">
			<ul>
				<li><a href="home.php"><p>Inicio</p></a></li>
				<li><a href="general.php"><p>Historial</p></a></li>
				<li><a href="reports.php"><p>Reports</p></a></li>
				<li><a href="mis_reservas.php"><p>Mis reservas</p></a></li>
			</ul>
		</nav>
	<button class="incidencias"><a href="incidencias.php" style="text-decoration: none;">Incidencias</a></button>
 	</header>

 	<div class="res_div2" style="color: red">
<div class="res_i_r">
Esta funcionalidad estará activa en la próxima actualización, discuple las molestias.
</div>
</div>

</body>
</html>