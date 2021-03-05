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

include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM `categoria` WHERE id_categoria = $id";
$deletar = mysqli_query($conexao,$sql)
?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Deletado com Sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="listar_categoria.php" class="btn btn-warning">Voltar</a>
</center>
</div>
