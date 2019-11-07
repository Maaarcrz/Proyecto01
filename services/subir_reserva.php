<?php


//Inicializamos sesion
session_start();
	if (isset($_SESSION['nombre'])) {
		$id=$_SESSION['id'];



//recogemos variables del formulario
if (isset( $_REQUEST['objeto'])) {
	$objeto=$_REQUEST['objeto'];
	if ($objeto=='') {
		header("Location: ../home.php");
	}

}
if (isset( $_REQUEST['descripcion'])) {
	$descripcion=$_REQUEST['descripcion'];

}


//Actualizamos e insertamos los nuevos registros
$fecha=date('y-m-d');
$hora=date('h:m:s');
include "conexion.php";
$update=mysqli_query($conn,"UPDATE tbl_recurso set estado = 'reservado' where id_recurso=$objeto");
$insert=mysqli_query($conn,"INSERT INTO tbl_reserva (id_recurso,id_usuario,fecha_ini, hora_ini, Fializado) values ('$objeto','$id','$fecha','$hora',0)");
echo "$id";
header("Location:../home.php");


}else{
	echo "error";
}