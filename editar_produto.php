<?php 

include 'conexao.php';

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Formulário de Cadastro</title>
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
		<?php

		$sql = "SELECT * FROM `estoque` WHERE id_estoque = $id";
		$buscar = mysqli_query($conexao,$sql);
		while ($array = mysqli_fetch_array($buscar)){

			$id_estoque = $array['id_estoque'];
			$nroproduto = $array['nroproduto'];
			$nomeproduto = $array['nomeproduto'];
			$categoria = $array['categoria'];
			$quantidade = $array['quantidade'];
			$fornecedor = $array['fornecedor'];

		?>

		<form action="_atualizar_produto.php" method="post" style="margin-top: 20px">	
			<div class="form-group" style="margin-top: 40px">
		    	<label>Nro Produto</label>
		    	<input type="number" class="form-control"  name="nroproduto" value="<?php echo $nroproduto ?>" disabled>
		    	<input type="number" class="form-control"  name="id" value="<?php echo $id ?>" style="display: none">
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Nome Produto</label>
		    	<input type="text" class="form-control" name="nomeproduto" value="<?php echo $nomeproduto ?>">
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Quantidade</label>
		    	<input type="number" class="form-control" name="quantidade" value="<?php echo $quantidade ?>">
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Categoria</label>
		    	<select class="form-control" name="categoria">
		    		<option>Periféricos</option>
		    		<option>Hardware</option>
		    		<option>Software</option>
		    		<option>Celulares</option>
		    	</select>
	    	</div>

	    	<div class="form-group" style="margin-top: 20px">
		    	<label>Fornecedor</label>
		    	<select class="form-control" name="fornecedor">
		    		<option>Fornecedor X</option>
		    		<option>Fornecedor Y</option>
		    		<option>Fornecedor Z</option>
		    		<option>Fornecedor W</option>
		    	</select>
	    	</div>
	    	<div style="text-align: right;">
	    		<a href="listar_produtos.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
	    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
	    	</div>
	    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>