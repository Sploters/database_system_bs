<!DOCTYPE html>
<html>
<head>
<meta name="color-scheme" content="dark light">
	<title>Adicionando OPs</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
<style>
body{
	background-color: #ffffff;
	color = black;
}

#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
		}

.dark-mode{
	background-color: #181818;
	color = white;
}
</style>
</head>
<body>
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
?>
<div class="container" style="width: 400px; margin-top: 70px">

	<form action="_insert_op.php" method="post">
		<h4>Cadastro de OPs</h4>
		<div class="form-group" style="margin-top: 20px">
	    	<label>Número da OP</label>
	    	<input type="number" name="op_num" class="form-control" required autocomplete="off" placeholder="Número da OP">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Item OP</label>
	    	<input type="text" name="op_item" class="form-control" required autocomplete="off" placeholder="Item OP">
  		</div>

		<div style="text-align: right; margin-top: 20px">
			<a href="certificado.php" role="button" class="btn btn-primary">Voltar</a>
			<button type="submit" id="botao" class="btn">Cadastrar</button>
		</div>
			
	</form>
</div>

<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>