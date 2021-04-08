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
	    	<label>Chave</label>
	    	<input type="number" name="chave_material" class="form-control" required autocomplete="off" readonly placeholder="PROVAVELMENTE REMOVER">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Código</label>
	    	<input type="number" name="cod_material" class="form-control" required autocomplete="off" readonly placeholder="GERAR SOZINHO">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Denominação</label>
	    	<input type="text" name="den_material" class="form-control" required autocomplete="off" placeholder="Denominação">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Material</label>
	    	<input type="text" name="mat_material" class="form-control" required autocomplete="off" placeholder="Tipo de Material">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Requisitos</label>
	    	<input type="text" name="req_material" class="form-control" autocomplete="off" placeholder="Requisitos Especiais">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Outros Requisitos</label>
	    	<input type="text" name="req_material" class="form-control" autocomplete="off" placeholder="Outros Requisitos">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Dimensões</label>
	    	<input type="text" name="dim_material" class="form-control" required autocomplete="off" placeholder="Dimensões">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Narrativa</label>
	    	<input type="text" name="nar_material" class="form-control" required autocomplete="off" readonly placeholder="GERADA AUTOMÁTICA">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Unidade</label>
	    	<input type="text" name="um_material" class="form-control" required autocomplete="off" placeholder="Tipo de Unidade">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Kg/Un.</label>
	    	<input type="text" name="peso_espec_material" class="form-control" required autocomplete="off" placeholder="Gramas por Unidade">
  		</div>

		<div style="text-align: right; margin-top: 20px">
			<a href="material.php" role="button" class="btn btn-primary">Voltar</a>
			<button type="submit" id="botao" class="btn">Cadastrar</button>
		</div>
			
	</form>
</div>

<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>