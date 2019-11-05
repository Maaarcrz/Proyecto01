	<h1>Login</h1>
	<form action="./services/login.proc.php" method="REQUEST" enctype="multipart/form-data" onsubmit="return validacionFormulario()">
		<input type="text" name="user" id="user" placeholder="Usuario" value="<?php if (isset($_REQUEST['us'])){
			echo $_GET['us'];
			}else{
				echo "";
			}
			?>"><br>
		<input type="password" name="pass" id="pass" placeholder="Contraseña">
		<br>
		<input type="submit" name="Entrar">
		<?php 
		if (isset($_REQUEST['error'])){;
			echo '<p style="color: red; font-size: 15px; font-family; calibri;>El usuario o contraseña no son correctos</p>';
		}
		?>
	</form>