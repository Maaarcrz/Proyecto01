<?php
include "./conexion.php";

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$encript = md5($pass);

//Entra si está configurada la variable del formulario del login
if (isset( $_REQUEST['user'])) {
//Consulta usuario y contraseña
$query = "SELECT * FROM tbl_usuario WHERE user='$user' and pass='$encript'";

$result = mysqli_query($conn,$query);
//La variable $result debería de tener como mínimo un registro coincidente
if (!empty($result) && mysqli_num_rows($result)==1) {
	$row=mysqli_fetch_array($result);
	//Creo una nueva sesión y defino $_SESSION['nombre']
	session_start();
	$_SESSION['nombre']=$user;
	$_SESSION['id']=$row['id'];
	//Voy a la página de inicio de las reservas
	header("Location: ../home.php");
	}else{
		//Si falla la autenticación vuelvo a index.php
		header("Location: ../index.php?error=1&us=".$user);
	}
//Si no está configurada la variable del formulario del login vuelve al login
}else{
	header("Location: ../index.php");
}
?>