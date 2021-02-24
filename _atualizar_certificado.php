<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}

include 'conexao.php';

$sql = "SELECT nivel_usuario FROM usuarios WHERE mail_usuario = '$usuario'";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];

$id = $_POST['id'];
$num_certificado = $_POST['num_certificado'];
$item_certificado = $_POST['item_certificado'];
$status_certificado = $_POST['status_certificado'];

$sql = "UPDATE `certificado` SET `num_certificado`= '$num_certificado',`item_certificado`='$item_certificado',`status_certificado`='$status_certificado' WHERE id_certificado = $id";

$atualizar = mysqli_query($conexao,$sql);
?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Atualizado com Sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="certificado.php" class="btn btn-warning">Voltar</a>
</center>
</div>