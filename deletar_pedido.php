<?php 

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}

include 'conexao.php';
$id = $_GET['id'];

$sql = "DELETE FROM `pedido` WHERE id_pedido = $id";
$deletar = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Deletado com Sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="pedido.php" class="btn btn-warning">Voltar</a>
</center>
</div>