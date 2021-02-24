<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>TÍTULO</title>
	<!-- CSS only -->
		<link rel="stylesheet" href="css/bootstrap.css">

	<style type="text/css">

		#tamanhoContainer {
			width: 500px;
			height: 700px;
		}

		#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
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
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
		<h3>Formulário de Cadastro</h3>
		<form action="_inserir_produto.php" method="post" style="margin-top: 20px">	
			<div class="form-group" style="margin-top: 40px">
		    	<label>Nro Produto</label>
		    	<input type="number" class="form-control"  name="nroproduto" placeholder="Insira o número do produto" autocomplete="off" required>
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Nome Produto</label>
		    	<input type="text" class="form-control" name="nomeproduto" placeholder="Insira o nome do produto" autocomplete="off" required>
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Quantidade</label>
		    	<input type="number" class="form-control" name="quantidade" placeholder="Insira a quantidade do produto" autocomplete="off" required>
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Categoria</label>
		    	<select class="form-control" name="categoria">

		    		<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM categoria order by nome_categoria ASC";
		    		$buscar = mysqli_query($conexao,$sql);
		    		
		    		while ($array= mysqli_fetch_array($buscar))
		    		{
		    			$id_categoria = $array['id_categoria'];
		    			$nome_categoria = $array['nome_categoria']

		    		?>

		    		<option><?php echo $nome_categoria ?></option>
		    		<?php } ?>

		    	</select>
	    	</div>

	    	<div class="form-group" style="margin-top: 20px">
		    	<label>Fornecedor</label>
		    	<select class="form-control" name="fornecedor">
		    		<?php
		    		include 'conexao.php';
		    		$sql2 = "SELECT * FROM fornecedor order by nome_forn ASC";
		    		$buscar2 = mysqli_query($conexao,$sql2);
		    		
		    		while ($array2= mysqli_fetch_array($buscar2))
		    		{
		    			$id_categoria = $array2['id_forn'];
		    			$nome_categoria = $array2['nome_forn']

		    		?>

		    		<option><?php echo $nome_categoria ?></option>
		    		<?php } ?>

		    		<option>Fornecedor X</option>
		    	</select>
	    	</div>
	    	<div style="text-align: right;">
	    		<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
	    		<button type="submit" id="botao" class="btn" form-group style="margin-top: 20px">Cadastrar</button>
	    	</div>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>