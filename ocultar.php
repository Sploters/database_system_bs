<?php
{
	include 'conexao.php';
	session_start();

	$usuario = $_SESSION['usuario'];

	if(!isset($_SESSION['usuario'])){
	  header('Location: index.php');
	}
	
	$sql = "SELECT nivel_usuario FROM usuarios WHERE mail_usuario = '$usuario'";
	$buscar = mysqli_query($conexao,$sql);
	$array = mysqli_fetch_array($buscar);
	$nivel = $array['nivel_usuario'];

	echo $id = $_POST['id'];
	echo $sql = "UPDATE `recebimento` SET `status_ticket` = 'oculto' WHERE ticket = $id";
	$atualizar = mysqli_query($conexao,$sql);

	// header('Location: /index/recebimento.php');

}
?>