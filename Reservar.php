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
				<li><a href="general.php"><p>Historial</p></a></li>
				<li><a href="mis_reservas.php"><p>Mis reservas</p></a></li>
			</ul>
		</nav>
	<button class="incidencias"><a href="incidencias.php" style="text-decoration: none;">Incidencias</a></button>
 	</header>

	<div class="div_img">
		<img src="./img/banner.jpg" class="imagen">
	</div>

<p class="reservar_parr" style="display:block;
  margin-left: auto;
  margin-right: auto;width:98px">
			Reservar
	</p>
	<?php
		if (isset($_REQUEST['tipo'])) {
			$tipo=$_REQUEST['tipo'];
		}else{
			header("Location: ./home.php");
		}
	?>

<!-- Formulario para reservar -->
	<link rel="stylesheet" type="text/css" href="estilos_reservar.css">
	<div id="formulario_reservar">
		<form action="./services/subir_reserva.php?" method="REQUEST" enctype="multipart/form-data" onsubmit="return Validacion()">
			<select name="objeto">
				<?php
				//Recoger los objetos del tipo seleccionado y mostrarlo para seleccionar
				include "./services/conexion.php";
				$query = mysqli_query($conn, "SELECT * FROM tbl_recurso WHERE id_tipo_recurso=$tipo and estado='disponible'");
				if(mysqli_num_rows($query)>0){
					//Mostrar en el select los objetos disponibles
				while($objeto=mysqli_fetch_array($query)){
				echo "<option value='".$objeto['id_recurso']."'>".$objeto['nombre_recurso']."</option>";
			}
		}else{
			echo "<option value=''>No hay recursos disponibles</option>";
		}
		?>
			</select>
			<br>
			<textarea name="descripcion"></textarea> 
			<br>
			<input type="submit" name="Reservar">
		</form>
	</div>

</body>
</html>