<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}

include 'conexao.php';

$empresaorigem = $_POST['empresa_origem'];

$sql = "INSERT INTO `origem`( `empresa_origem`) VALUES ('$empresaorigem')";
$inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Usuário adicionado com sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="origem.php" class="btn btn-warning">Voltar</a>
</center>
</div>

