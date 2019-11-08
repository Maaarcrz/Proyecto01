<!DOCTYPE html>
<html>
<head>
	<title>HOME · Casal</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		.cab ul li a p:hover {
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
				<li><a href="home.php"><p>Inicio</p></a></li>
				<li><a href="general.php"><p>Historial</p></a></li>
				<li><a href="reports.php"><p>Reports</p></a></li>
				<li><a href="mis_reservas.php"><p>Mis reservas</p></a></li>
			</ul>
		</nav>
	<button class="incidencias"><a href="incidencias.php" style="text-decoration: none;">Incidencias</a></button>
 	</header>

	<img src="./img/banner.jpg" class="imagen">
	
	

<div class="reservar_todo">
	<p class="reservar_parr" style="display:block;
  margin-left: auto;
  margin-right: auto;width:70px">
			Reports
	</p>
<div class="reservar_cont" style="width:86%; ">
<?php
//Conexion bd.
include "./services/conexion.php";

//Selección y muestra de datos de la base de datos

$id = $_SESSION['id'];
$result = mysqli_query($conn,"SELECT tbl_recurso.nombre_recurso,COUNT(tbl_reserva.id_recurso) AS veces_reservado FROM tbl_recurso INNER JOIN tbl_reserva ON tbl_recurso.id_recurso=tbl_reserva.id_recurso GROUP BY tbl_recurso.id_recurso");
$result2 = mysqli_query($conn,"SELECT tbl_recurso.nombre_recurso, COUNT(tbl_reserva.id_reserva) AS maxima_reserva FROM tbl_recurso INNER JOIN tbl_reserva ON tbl_recurso.id_recurso=tbl_reserva.id_recurso GROUP BY tbl_recurso.id_recurso ORDER BY maxima_reserva DESC");
$result3 = mysqli_query($conn,"SELECT tbl_recurso.nombre_recurso, COUNT(tbl_reserva.id_reserva) AS maxima_reserva FROM tbl_recurso INNER JOIN tbl_reserva ON tbl_recurso.id_recurso=tbl_reserva.id_recurso GROUP BY tbl_recurso.id_recurso ORDER BY maxima_reserva ASC");
$result4 = mysqli_query($conn,"SELECT COUNT(tbl_reserva.id_reserva) AS maxima_reserva FROM tbl_recurso INNER JOIN tbl_reserva ON tbl_recurso.id_recurso=tbl_reserva.id_recurso");
if (!empty($result) && mysqli_num_rows($result)>0) {
		//Pinto el resultado.
		//Recorro el array linea a linea, fila a fila.
		while ($row = mysqli_fetch_array($result)){
			?>
			<!-- <div class="res_div2">
				<div class="res_i_r" style="position: absolute;">
					<?php
					//echo "Veces reservado: ".$row['veces_reservado']."<br>";
					//echo "Recurso: ".$row['nombre_recurso'];
					?>
				</div>
			</div> -->
			<div className="Homeaaa">
      <div className="circuloo" style="border-style: solid;
    border-width: 2px;
    border-color: #e6ac00;
border-radius: 100px;
width:200px;
height: 200px;
margin:10% 38% 5%;display:block;
  margin-left: auto;
  margin-right: auto;background: white;font-weight: bold;f">
      <p className="parraff" style="padding:4%;
margin:32% 10% 5%;">
      	<?php
					echo "El recurso ".$row['nombre_recurso']." ha sido reservado ".$row['veces_reservado']." veces.<br>";
					?>
      </p>
      </div>
      </div>

			<?php
		} 
/*}elseif (!empty($result2) && mysqli_num_rows($result2)>0) {
		while ($row = mysqli_fetch_array($result)){
			?>
			<div class="res_div2">
				<div class="res_i_r">
					<?php
					echo "Recurso más reservado: ".$row['maxima_reserva']."<br>";
					?>
				</div>
			</div>
			<?php
		}*/ 
}else{
	//si no hay ninguna imagen para mostrar.
	echo "0 resultados.";
}
?>

<?php
if (!empty($result2) && mysqli_num_rows($result2)>0) {
		//Pinto el resultado.
		//Recorro el array linea a linea, fila a fila.
		if ($row = mysqli_fetch_array($result2)){
			?>
			




			<div className="Homeaaa">
      <div className="circuloo" style="border-style: solid;
    border-width: 2px;
    border-color: #e6ac00;
border-radius: 100px;
width:200px;
height: 200px;
margin:10% 38% 5%;display:block;
  margin-left: auto;
  margin-right: auto;background: white;font-weight: bold;">
      <p className="parraff" style="padding:4%;
margin:26% 10% 5%;">
      	<?php
					echo $row['nombre_recurso']." es el recurso más reservado y tiene ".$row['maxima_reserva']." reservas.<br>";
					?>
      </p>
      </div>
      </div>
			<?php
		} 
}else{
//si no hay ninguna imagen para mostrar.
echo "0 resultados.";
}
?>

<?php
if (!empty($result3) && mysqli_num_rows($result3)>0) {
		//Pinto el resultado.
		//Recorro el array linea a linea, fila a fila.
		if ($row = mysqli_fetch_array($result3)){
			?>




				<div className="Homeaaa">
      <div className="circuloo" style="border-style: solid;
    border-width: 2px;
    border-color: #e6ac00;
border-radius: 100px;
width:200px;
height: 200px;
margin:10% 38% 5%;display:block;
  margin-left: auto;
  margin-right: auto;background: white;font-weight: bold;">
      <p className="parraff" style="padding:4%;
margin:28% 10% 5%;">
      	<?php
					echo $row['nombre_recurso']." es el recurso menos reservado y tiene ".$row['maxima_reserva']." reservas.<br>";
					?>
      </p>
      </div>
      </div>
			<?php
		} 
}else{
//si no hay ninguna imagen para mostrar.
echo "0 resultados.";
}
?>


<?php
if (!empty($result4) && mysqli_num_rows($result4)>0) {
		//Pinto el resultado.
		//Recorro el array linea a linea, fila a fila.
		if ($row = mysqli_fetch_array($result4)){
			?>


				<div className="Homeaaa">
      <div className="circuloo" style="border-style: solid;
    border-width: 2px;
    border-color: #e6ac00;
border-radius: 100px;
width:200px;
height: 200px;
margin:10% 38% 5%;display:block;
  margin-left: auto;
  margin-right: auto;background: white;font-weight: bold;">
      <p className="parraff" style="padding:4%;
margin:32% 10% 5%;">
      	<?php
					echo "El número total de reservas realizadas es: ".$row['maxima_reserva']."<br>";
					?>
      </p>
      </div>
      </div>
			<?php
		} 
}else{
//si no hay ninguna imagen para mostrar.
echo "0 resultados.";
}
?>

</div>
</div>
</body>
</html>