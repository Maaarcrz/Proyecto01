<!DOCTYPE html>
<html>
<head>
	<title>HOME · Casal</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		#main-header .cab ul .lis a .pip:hover {
		color: #56baed;
	}
	</style>
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
				<li class="lis"><a href="home.php"><p class="pip">Inicio</p></a></li>
				<li class="lis"><a href="general.php"><p>Historial</p></a></li>
				<li class="lis"><a href="reports.php"><p>Reports</p></a></li>
				<li class="lis"><a href="mis_reservas.php"><p>Mis reservas</p></a></li>
			</ul>
		</nav>
	<button class="incidencias"><a href="incidencias.php" style="text-decoration: none;">Incidencias</a></button>
 	</header>

	<img src="./img/banner.jpg" class="imagen">
	
	



<div class="reservar_todo">
	<p class="reservar_parr" style="display:block;
  margin-left: auto;
  margin-right: auto;width:90px">
			Historial
	</p>
<div class="reservar_cont">

<?php
//Conexion bd.
include "./services/conexion.php";

//Selección y muestra de datos de la base de datos;
$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$result = mysqli_query($conn,"SELECT tbl_recurso.nombre_recurso, tbl_reserva.descripcion,tbl_tipus_recurso.imagen_tipo_recurso, tbl_reserva.fecha_ini, tbl_usuario.user, tbl_reserva.fecha_fin FROM tbl_tipus_recurso INNER JOIN tbl_recurso ON tbl_tipus_recurso.id_tipo_recurso=tbl_recurso.id_tipo_recurso INNER JOIN tbl_reserva ON tbl_recurso.id_recurso=tbl_reserva.id_recurso INNER JOIN tbl_usuario ON tbl_reserva.id_usuario=tbl_usuario.id_usuario WHERE tbl_usuario.id_usuario='$id' GROUP BY tbl_reserva.id_reserva");
if (!empty($result) && mysqli_num_rows($result)>0) {
		//Pinto el resultado.
		//Recorro el array linea a linea, fila a fila.
		while ($row = mysqli_fetch_array($result)){
			?>
			<div class="res_div2">
				<div class="res_i_r">
					<?php
					echo "<img src='./img/recursos/".$row['imagen_tipo_recurso']."'style='width:340px'>";
					echo "<p class='parr_res2'><b>Sala: </b>" .$row['nombre_recurso']."</p>";
					if ($row['descripcion']=='') {
					echo "<p class='parr_res2' style='color:red;font-weight: bold;'>No hay descripción.</p>";
					}else{


					echo "<p class='parr_res2'><b>Descripción:</b> " .$row['descripcion']."</p>";
					}
					echo "<p class='parr_res2'><b>Fecha inicio: </b> ".$row['fecha_ini']."</p>";
					if ($row['fecha_fin']=='') {
					echo "<p class='parr_res2' style='color:red;font-weight: bold;'>No ha finalizado la reserva.</p>";
					}else{
					echo "<p class='parr_res2'><b>Fecha fin: </b> ".$row['fecha_fin']."</p>";
					}
					
					echo "<p class='parr_res2'><b>Usuario: </b> ".$row['user']."</p>";
					?>
				</div>
			</div>
			<?php
		} 
		//header("Location: ./services/processa.php");
}else{
	//si no hay ninguna imagen para mostrar.
	echo "0 resultados.";
}
?>


		</div>

	</div>













</body>
</html>