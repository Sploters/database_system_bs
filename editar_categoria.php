<?php 

include 'conexao.php';

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Fomulário de Edição</title>
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
		<h3>Formulário de Edição</h3>
		<?php

		$sql = "SELECT * FROM `categoria` WHERE id_categoria = $id";
		$buscar = mysqli_query($conexao,$sql);
		while ($array = mysqli_fetch_array($buscar)){

			$id_categoria = $array['id_categoria'];
			$nomecategoria = $array['nome_categoria'];
		?>

		<form action="_atualizar_categoria.php" method="post" style="margin-top: 20px">	
			
	  		<div class="form-group" style="margin-top: 20px">
		    	<label>Nome Categoria</label>
		    	<input type="text" class="form-control" name="nomecategoria" value="<?php echo $nomecategoria ?>">
		    	<input type="text" class="form-control" name="id" value="<?php echo $id_categoria ?>" style ="display: none">
	    		<div id="emailHelp" class="form-text">Comentário</div>
	  		</div>

	    	<div style="text-align: right;">
	    		<a href="listar_categoria.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
	    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
	    	</div>
	    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>