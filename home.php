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

	<div class="div_img">
		<img src="./img/banner.jpg" class="imagen">
	</div>

	<?php
	//include "./services/conexion.php";
	//Mostrar registros
	//SELECT DE LA TABLA RECURSOS
	//$result=mysqli_query($conn,"SELECT * FROM tbl_recurso");
	//echo "<br><br>";
	//while($objeto=mysqli_fetch_array($result)){
		//Imagen de fondo en el DIV
		//echo '<div class="contenedor_registros" style="background-repeat: no-repeat; background-size: 100%; background-image: url(./img/recursos/'.$objeto['Imagen'].');">';
		//Si el recurso esta disponible o reservado...
		//if ($objeto['estado']=="disponible") {
			//echo "<p class='titulos_recursos'><b>".$objeto['nombre_recurso']."</b> | <span class='disponible'>".$objeto['estado']."</span></p>";
			//Boton de reserva que redirige a otra pagina php
			//echo "<a href='reservar.php' class='myButton'>Reservar</a>";
		//}else{
			//echo "<p class='titulos_recursos'><b>".$objeto['nombre_recurso']."</b> | <span class='reservado'>".$objeto['estado']."</span></p>";
		//}
		//echo "</div>";
	//}
	?>
<p class="reservar_parr" style="display:block;
  margin-left: auto;
  margin-right: auto;width:180px">
			Reservas disponibles
	</p>
	<?php
	include "./services/conexion.php";

	//Mostrar registros
	//SELECT DE LA TABLA TIPO RECURSOS
	$result=mysqli_query($conn,"SELECT distinct tbl_tipus_recurso.id_tipo_recurso, tbl_tipus_recurso.imagen_tipo_recurso,tbl_tipus_recurso.nombre_tipus_recurso FROM tbl_tipus_recurso inner join tbl_recurso on tbl_recurso.id_tipo_recurso=tbl_tipus_recurso.id_tipo_recurso  ");
	echo "<br><br>";
	while($objeto=mysqli_fetch_array($result)){
		//Imagen de fondo en el DIV
		echo '<div class="contenedor_registros" style="background-repeat: no-repeat; background-size: 100%; background-image: url(./img/recursos/'.$objeto['imagen_tipo_recurso'].');">';
		$consulta="Select * From tbl_recurso where id_tipo_recurso=".$objeto['id_tipo_recurso']." and estado='disponible'";
		$disponibilidad=mysqli_query($conn,$consulta);
		if (!empty($disponibilidad) && mysqli_num_rows($disponibilidad)>0) {
			echo "<p class='titulos_recursos'>".$objeto['nombre_tipus_recurso']." | <span class='disponible'>Disponible</span></p>";
			echo "<a href='reservar.php?tipo=".$objeto['id_tipo_recurso']."' class='myButton'>Reservar</a>";
		}else{
			echo "<p class='titulos_recursos'>".$objeto['nombre_tipus_recurso']." | <span class='reservado'>No disponible</span></p>";
		}
			echo "</div>";
	}
	?>

</body>
</html>