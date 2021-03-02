<?php 

include 'conexao.php';

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Formulário de Fornecedores</title>
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
		<h3>Formulário de Fornecedores</h3>
		<form action="_atualizar_fornecedor.php" method="post">
			<?php

			$sql = "SELECT * FROM `Fornecedor` WHERE id_fornecedor = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){

				$nome_fornecedor = $array['nome_fornecedor'];
				$a_fornecedor = $array['a_fornecedor'];
				$b_fornecedor = $array['b_fornecedor'];
				$cnpj = $array['cnpj'];
			?>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Número do Fornecedor</label>
			    	<input type="text" class="form-control" name="nome_fornecedor" value="<?php echo $nome_fornecedor ?>">
			    	<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Fone</label>
			    	<input type="text" class="form-control" name="a_fornecedor" value="<?php echo $a_fornecedor ?>">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>E-mail</label>
			    	<input type="text" class="form-control" name="b_fornecedor" value="<?php echo $b_fornecedor ?>">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>CNPJ</label>
			    	<input type="text" class="form-control" name="cnpj" value="<?php echo $cnpj ?>">
		  		</div>

		    	<div style="text-align: right;">
		    		<a href="fornecedor.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		    	</div>
		    	
		    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>
