<?php 

include 'conexao.php';

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Formulário de Origem</title>
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

?>

	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
		<h3>Formulário de Cadastro</h3>
		<form action="_atualizar_origem.php" method="post">
			<?php

			$sql = "SELECT * FROM `origem` WHERE id_origem = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){

				$empresaorigem = $array['empresa_origem'];
			?>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Empresa Origem</label>
			    	<input type="text" class="form-control" name="empresa_origem" value="<?php echo $empresaorigem ?>">
			    	<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		    		<div id="emailHelp" class="form-text">Comentário</div>
		  		</div>

		    	<div style="text-align: right;">
		    		<a href="origem.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		    	</div>
		    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>
