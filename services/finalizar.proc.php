<?php


session_start();
if (isset($_SESSION['nombre'])) {
		$id=$_SESSION['id']; 
if (isset($_REQUEST['reserva'])){
	$reserva=$_REQUEST['reserva'];
}
	include "conexion.php";
	$fecha=date('y-m-d');
	$hora=date('h:m:s');
	$update=mysqli_query($conn,"UPDATE tbl_reservas set hora_fin=$hora set fecha_fin=$fecha set Finalizado=1 where id_reserva=$reserva");
	//header("location:../mis_reservas.php");
}else{
	echo "error";
}
?>