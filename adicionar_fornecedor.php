<!DOCTYPE html>
<html>
<head>
<meta name="color-scheme" content="dark light">
	<title>Adicionando OPs</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>
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

<script type="text/javascript">
		//CNPJ
	$("#pj").mask("99.999.999/9999-99");
	//Data
	$("#fone").mask("(99) 9999-9999");
</script>


<div class="container" style="width: 400px; margin-top: 70px">

	<form action="_insert_fornecedor.php" method="post">
		<h4>Nome de fornecedor</h4>
		<div class="form-group" style="margin-top: 20px">
	    	<label>Nome de fornecedor</label>
	    	<input type="text" name="nome_fornecedor" class="form-control" required autocomplete="off" placeholder="Nome do Fornecedor">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Fone</label>
	    	<input type="text" name="a_fornecedor" id="fone" class="form-control" required autocomplete="off" placeholder="(DDD) Fone">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>E-Mail</label>
	    	<input type="email" name="b_fornecedor" class="form-control" required autocomplete="off" placeholder="E-mail">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>CNPJ</label>
	    	<input type="text" name="cnpj" id="pj" class="form-control" required autocomplete="off" placeholder="CNPJ">
  		</div>

		<div style="text-align: right; margin-top: 20px">
			<a href="fornecedor.php" role="button" class="btn btn-primary">Voltar</a>
			<button type="submit" id="botao" class="btn">Cadastrar</button>
		</div>
			
	</form>
</div>

<script type="text/JavaScript"src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</body>
</html>