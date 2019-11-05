<!DOCTYPE html>
<html>
<head>
	<title>Reservar</title>
</head>
<body>
	<h1>Reserva</h1>
	<form method="REQUEST" enctype="multipart/form-data" onsubmit="return Validacion()">
		<select name="objeto">
			<?php
			//Recoger los objetos del tipo seleccionado y mostrarlo para seleccionar
			include "conexion.php";
			$query = mysqli_query($conn, "SELECT FROM objeto WHERE id_tipo=$tipo");
			while($objeto=mysqli_fetch_array($query)){
			echo "<option value='$query['objeto']'>$query['objeto']</option>";
		}
			?>

		</select>
		<br>

		<textarea name="descripcion"></textarea> 
		<input type="submit" name="Reservar">
	</form>

</body>
</html>