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
	$consulta=mysqli_query($conn,"SELECT tbl_recurso.id_recurso from tbl_recurso inner join tbl_reserva on tbl_recurso.id_recurso=tbl_reserva.id_recurso where tbl_reserva.id_reserva='$reserva'");
while ($row = mysqli_fetch_array($consulta)){
$objeto=$row['id_recurso'];
}
	$update=mysqli_query($conn,"UPDATE tbl_reserva set hora_fin='$hora', fecha_fin='$fecha', Finalizado=1 where id_reserva=$reserva");
	$update2=mysqli_query($conn,"UPDATE tbl_recurso set estado='disponible' where id_recurso='$objeto'");
	header("location:../mis_reservas.php");
}else{
	echo "error";
}
