<?php 

include 'conexao.php';

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Formulário de OPs</title>
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
		<h3>Formulário de OP</h3>
		<form action="_atualizar_op.php" method="post">
			<?php

			$sql = "SELECT * FROM `op` WHERE id_op = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){

				$id_op = $array['id_op'];
    			$op_num = $array['op_num'];
    			$op_item = $array['op_item'];
			?>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Número da OP</label>
			    	<input type="number" class="form-control" name="op_num" value="<?php echo $op_num ?>">
			    	<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>OP Item</label>
			    	<input type="text" class="form-control" name="op_item" value="<?php echo $op_item ?>">
		  		</div>

		    	<div style="text-align: right;">
		    		<a href="op.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		    	</div>
		    	
		    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>
