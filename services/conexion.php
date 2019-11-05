<?php
$conn = mysqli_connect('localhost','root','','db_reservas');
if($conn){
	//echo "Conexión establecida<br>";
}else{
	echo "Ha fallado la conexión";
}
?>