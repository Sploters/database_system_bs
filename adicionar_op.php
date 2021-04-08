<!DOCTYPE html>
<html>
<head>
<meta name="color-scheme" content="dark light">
	<title>Adicionando OPs</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<style>
body {
	background-color: #ffffff;
	color : black;
}

#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
		}

.dark-mode{
	background-color: #181818;
	color : white;
}

.font1 {
	font-family: 'Roboto', sans-serif;
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
<div class="container" style="width: 370px; margin-top: 70px">
<script type="text/javascript">
 </script>

	<form action="_insert_op.php" method="post">
		<nav class="navbar fixed-top navbar bg-light">
			<h4 id="font1" style="margin-left: 20px" >Novo Equipamento</h4>
		</nav>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Ordem de Produção(OP/JFR)</label>
	    	<input type="text" name="op_num" class="form-control" required autocomplete="off" placeholder="Número da OP">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Item da Ordem de Produção</label>
	    	<input type="text" name="op_item" class="form-control" required autocomplete="off" placeholder="Número Item">
  		</div>
		
		<div class="form-group" style="margin-top: 20px">
	    	<label>Pedido de Compra Cliente</label>
	    	<input type="text" name="po_cliente" class="form-control" required autocomplete="off" placeholder="Número Pedido">
  		</div>

		  <div class="form-group" style="margin-top: 20px">
	    	<label>Item do Pedido do Cliente</label>
	    	<input type="text" name="item_po" class="form-control" required autocomplete="off" placeholder="Número Item">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Cliente</label>
	    	<input type="text" name="cliente" class="form-control" required autocomplete="off" placeholder="Nome do Cliente">
  		</div>
		
		<div class="form-group" style="margin-top: 20px">
	    	<label>Projeto</label>
	    	<input type="text" name="projeto" class="form-control" autocomplete="off" placeholder="Projeto">
  		</div>

		  <div class="form-group" style="margin-top: 20px">
	    	<label>Quantidade</label>
	    	<input type="number" name="qtd" class="form-control" autocomplete="off" placeholder="Quantidade">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Equipamento</label>
	    	<input type="text" name="equipamento" class="form-control" required autocomplete="off" placeholder="Equipamento">
  		</div>
		
		<div class="form-group" style="margin-top: 20px">
	    	<label>Horas Orçadas</label>
	    	<input type="number" name="horas_orc" class="form-control" autocomplete="off" placeholder="Horas Orçadas">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Prazo Contratual</label>
	    	<input type="date" name="prazo_contratual" class="form-control" autocomplete="off" placeholder="dd/mm/aaaa">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Data de Início</label>
	    	<input type="date" name="inicio" class="form-control" autocomplete="off" placeholder="Data de Início">
  		</div>
		
		<div style="text-align: right; margin: 20px 0px 20px 0px">
			<a href="op.php" role="button" class="btn btn-danger">Cancelar</a>
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</div>
			
	</form>
</div>

<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>