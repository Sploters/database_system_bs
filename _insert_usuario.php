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

// include 'script/password.php';

$nomeusuario = $_POST['nomeusuario'];
$mail = $_POST['mailusuario'];
$senha = $_POST['senhausuario'];
$nivel = $_POST['nivelusuario'];
$status = 'Ativo';

$sql = "INSERT INTO usuarios (nome_usuario, mail_usuario, senha_usuario, nivel_usuario, status) values ('$nomeusuario','$mail',sha1('$senha'),$nivel, '$status')";

$inserir = mysqli_query($conexao,$sql);
?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Usuário adicionado com sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="menu.php" class="btn btn-warning">Voltar</a>
</center>
</div>