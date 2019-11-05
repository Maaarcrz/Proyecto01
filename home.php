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
	<header id="main-header">
		<nav class="cab">
			<ul>
				<li><a href="home.php"><p>Inicio</p></a></li>
				<li><a href="historial.php"><p>Historial</p></a></li>
				<li><a href="mis_reservas.php"><p>Mis reservas</p></a></li>
			</ul>
		</nav>
	<button class="incidencias">Incidencias</button>
 	</header>

	<div class="div_img">
		<h1 style="color:white; position: absolute; margin-left: 43%">Casal de verano</h1>
		<img src="./img/banner.jpg" class="imagen">
	</div>

	<?php
	include "./services/conexion.php";
	//Mostrar registros
	$result=mysqli_query($conn,"SELECT * FROM tbl_recurso");
	while($objeto=mysqli_fetch_array($result)){
		echo "<h4>".$objeto['nombre_recurso']."</h4>";
		echo "<p>".$objeto['estado']."</p>";
		echo "<p>".$objeto['Descripcion']."</p>";
		echo '<img height="195px;" style="border: 2px solid #221821;" src="./img/recursos/'.$objeto['Imagen'].'">';
	}
	?>
</body>
</html>