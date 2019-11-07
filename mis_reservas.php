<!DOCTYPE html>
<html>
<head>
<title>HOME · Casal</title>
<meta charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css">-->
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<div class="cerrar_ses"><p class="parr_ses">Usuario | <a href="index.php">Cerrar sesión</a></p></div>

<header id="main-header">

<a id="logo-header" href="incidencias.php" class="imagenEveris" /><img src="./web/img/logo.png" width="200px"></a>
 
<nav class="cab">
<ul>
<li><a href="home.php">HOME</a></li>
<li><a href="historial.php">HISTORIAL</a></li>
<li><a href="mis_reservas.php">MIS RESERVAS</a></li>
</ul>
</nav>


<button class="incidencias">Incidencias</button>
 
</header>
<div class="div_img"><img src="https://cdn-e360.s3-sa-east-1.amazonaws.com/entrevista-que-debo-hacer-para-que-mi-hijo-se-adapte-al-colegio-2-large-Ph9B1hnpZd.jpg" class="imagen"></div>
<br><br><br>
<!--
<div class="reservar_todo">
<p class="reservar_parr">
Mis Reservas
</p>
<div class="reservar_cont">
<div class="res_div2">
<div class="res_i_r">
<img src="https://img.elo7.com.br/product/zoom/1CC68BD/par-de-quadro-para-sala-casal-colorido-70x140.jpg" class="img_res">
<p class="parr_res2"><b>Sala: </b> Multidisciplinar</p>
<p class="parr_res2"><b>Descripción: </b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<p class="parr_res2"><b>Fecha: </b> 19/2/2019</p>
</div>
</div>



<div class="res_div2">
<div class="res_i_r">
<img src="https://img.elo7.com.br/product/zoom/1CC68BD/par-de-quadro-para-sala-casal-colorido-70x140.jpg" class="img_res">
<p class="parr_res2"><b>Sala: </b> Multidisciplinar</p>
<p class="parr_res2"><b>Descripción: </b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<p class="parr_res2"><b>Fecha: </b> 19/2/2019</p>
</div>
</div><div class="res_div2">
<div class="res_i_r">
<img src="https://img.elo7.com.br/product/zoom/1CC68BD/par-de-quadro-para-sala-casal-colorido-70x140.jpg" class="img_res">
<p class="parr_res2"><b>Sala: </b> Multidisciplinar</p>
<p class="parr_res2"><b>Descripción: </b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<p class="parr_res2"><b>Fecha: </b> 19/2/2019</p>
</div>
</div><div class="res_div2">
<div class="res_i_r">
<img src="https://img.elo7.com.br/product/zoom/1CC68BD/par-de-quadro-para-sala-casal-colorido-70x140.jpg" class="img_res">
<p class="parr_res2"><b>Sala: </b> Multidisciplinar</p>
<p class="parr_res2"><b>Descripción: </b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<p class="parr_res2"><b>Fecha: </b> 19/2/2019</p>
</div>
</div>
-->




<div class="reservar_todo">
<p class="reservar_parr">
Mis Reservas
</p>
<div class="reservar_cont">

<?php
//Conexion bd.
include "./services/conexion.php";

//Selección y muestra de datos de la base de datos
session_start();
$id = $_SESSION['id'];
$result = mysqli_query($conn,"SELECT tbl_reserva.id_reserva, tbl_recurso.nombre_recurso, tbl_reserva.descripcion,tbl_recurso.Imagen, tbl_reserva.fecha_ini FROM tbl_recurso INNER JOIN tbl_reserva ON tbl_recurso.id_recurso=tbl_reserva.id_recurso INNER JOIN tbl_usuario ON tbl_reserva.id_usuario=tbl_usuario.id_usuario WHERE tbl_usuario.id_usuario='$id' and tbl_reserva.Finalizado=0");

if (!empty($result) && mysqli_num_rows($result)>0) {
//Pinto el resultado.
//Recorro el array linea a linea, fila a fila.
while ($row = mysqli_fetch_array($result)){
?>
<div class="res_div2">
<div class="res_i_r">
<?php
echo "<img src='./web/img/".$row['Imagen']."' style='width:310px'>";
echo "<p class='parr_res2'><b>Sala: </b>" .$row['nombre_recurso']."</p>";
if ($row['descripcion']=='') {
echo "<p class='parr_res2' style='color:red;font-weight: bold;'>No hay descripción.</p>";
}else{


echo "<p class='parr_res2'><b>Descripción:</b> " .$row['descripcion']."</p>";
}
echo "<p class='parr_res2'><b>Fecha: </b> ".$row['fecha_ini']."</p>";
echo "<a class='myButton' href='./services/finalizar.proc.php?reserva=".$row['id_reserva']."'>Finalizar</a>";
?>
</div>
</div>
<?php
}
//header("Location: ./services/processa.php");
}else{
//si no hay ninguna imagen para mostrar.
echo "0 resultados.";
}
?>


</div>

</div>













</body>
</html>