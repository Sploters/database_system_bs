<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="css/bootstrap.css">
<style type="text/css">

		#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
		}
	</style>
</head>
<body>
<?php
include 'conexao.php';
	$sql = "SELECT * FROM categoria order by nome_categoria ASC";
	$buscar = mysqli_query($conexao,$sql);
	
	while ($array= mysqli_fetch_array($buscar))
	{
$id_categoria = $array['id_categoria'];
$nome_categoria = $array['nome_categoria'];

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}


$sql = "SELECT nivel_usuario FROM usuarios WHERE mail_usuario = '$usuario'";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];

$sql = "INSERT INTO `categoria`( `id_categoria`, `nome_categoria`) VALUES ('$id_categoria','$nome_categoria')";
$inserir = mysqli_query($conexao,$sql);
} ?>
<div class="container" style="margin-top: 40px; width: 500px">

	<form action="inserir_categoria.php" method="post">
		<h3>Cadastro de Categoria</h3>
		<div class="form-group">
			<input type="text" name="categoria" class="form-control" placeholder="Digite o nome da Categoria" autocomplete="off" required>
		</div>
		<div style="text-align: right;">
	    <a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		<button type="submit" id="botao" class="btn" style="margin-top: 20px";>Cadastrar</button>
		</div>
	</form>
</div>

<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>