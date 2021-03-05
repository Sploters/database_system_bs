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

$num_pedido = $_POST['pedido_num'];
$prazo_pedido = $_POST['pedido_prazo'];
$status_pedido = $_POST['pedido_status'];

//Pegue a data no formato dd/mm/yyyy
//Exploda a data para entrar no formato aceito pelo DB.
$dataP = explode('/', $prazo_pedido);
//Altera a data para o Banco de Dados ler.
$dataB = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];


$sql = "INSERT INTO `pedido`( `pedido_num`, `pedido_prazo`,`pedido_status`) VALUES ($num_pedido, '$dataB','$status_pedido')";
$inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Pedido adicionado com sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="pedido.php" class="btn btn-warning">Voltar</a>
</center>
</div>

