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

$nome_fornecedor = $_POST['nome_fornecedor'];
$a_fornecedor = $_POST['a_fornecedor'];
$b_fornecedor = $_POST['b_fornecedor'];
$cnpj = $_POST['cnpj'];

$sql = "INSERT INTO `fornecedor`( `nome_fornecedor`, `a_fornecedor`, `b_fornecedor`, `cnpj`) VALUES ('$nome_fornecedor', '$a_fornecedor', '$b_fornecedor', '$cnpj')";
$inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Pedido adicionado com sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="fornecedor.php" class="btn btn-warning">Voltar</a>
</center>
</div>

