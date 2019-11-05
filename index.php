<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="./js/validation.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos_login.css">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Log In </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./img/icon_user.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="./services/login.proc.php" method="REQUEST" enctype="multipart/form-data" onsubmit="return validacionFormulario()">
      <input type="text" class="fadeIn second" name="user" id="user" placeholder="Usuario" value="<?php if (isset($_REQUEST['us'])){
			echo $_GET['us'];
			}else{
				echo "";
			}
			?>"><br>
      <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" name="Entrar">
      	<?php 
		if (isset($_REQUEST['error'])){;
			echo '<p style="color: red; font-size: 15px; font-family; calibri;>El usuario o contraseña no son correctos</p>';
		}
		?>
    </form>

  </div>
</div>

</body>
</html>