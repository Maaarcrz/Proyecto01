<!DOCTYPE html>
<html>
<head>
	<title>Reservar</title>
</head>
<body>
	<h1>Reserva</h1>
		<?php
			if (isset($_REQUEST['tipo'])) {
				$tipo=$_REQUEST['tipo'];
			}else{
				header("Location: ./home.php");
			}
			?>
	<!-- Formulario para reservar -->
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

</body>
</html>