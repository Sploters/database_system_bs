<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}

include 'conexao.php';

$id = $_POST['id'];
$empresaorigem = $_POST['empresa_origem'];

$sql = "UPDATE `origem` SET `empresa_origem` = '$empresaorigem' WHERE id_origem = $id";

$atualizar = mysqli_query($conexao,$sql);
?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Atualizado com Sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="origem.php" class="btn btn-warning">Voltar</a>
</center>
</div>