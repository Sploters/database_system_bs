<?php 

include 'conexao.php';

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Formulário de Pedidos</title>
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
		<form action="_atualizar_pedido.php" method="post">
			<?php

			$sql = "SELECT * FROM `pedido` WHERE id_pedido = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){

    			$num_pedido = $array['pedido_num'];
    			$item_pedido = $array['pedido_item'];
    			$prazo_pedido = $array['pedido_prazo'];
    			$status_pedido = $array['pedido_status'];
    			//Na hora de pegar a data do BD e exibir na tela, faça a mesma coisa que fiz acima, porém troquei '-' por '/':
				$dataP = explode('-', $prazo_pedido);
				$dataE = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
			?>
			<?php
	      		if (($nivel == 1) || ($nivel == 2)){
	      		?>
		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Número do Pedido</label>
			    	<input type="number" class="form-control" name="pedido_num" value="<?php echo $num_pedido ?>">
			    	<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Pedido Item</label>
			    	<input type="text" class="form-control" name="pedido_item" value="<?php echo $item_pedido ?>">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">

			    	<label>Pedido Prazo</label>
			    	<input type="text" class="form-control" name="pedido_prazo" value="<?php echo $dataE ?>" format="dd-mm-yyyy">
		  		</div>
		  		
		  		<?php } ?>

		  		<?php
		  		if (($nivel == 3) || ($nivel == 4)){
		  		?>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Número do Pedido</label>
			    	<input type="number" class="form-control" name="pedido_num" value="<?php echo $num_pedido ?>" disabled>
			    	<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Pedido Item</label>
			    	<input type="text" class="form-control" name="pedido_item" value="<?php echo $item_pedido ?>" disabled>
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">

			    	<label>Pedido Prazo</label>
			    	<input type="text" class="form-control" name="pedido_prazo" value="<?php echo $dataE ?>" format="dd-mm-yyyy" disabled>
		  		</div>
		  		
		  		<?php } ?>

		  			<div class="form-group" style="margin-top: 20px">
						<label>Pedido Status</label>
						<select name ="pedido_status" class="form-control">
							<optgroup>
								<option value="Não Recebido">Não Recebido</option>
								<option value="Recebido Parcial">Recebido Parcial</option>
								<option value="Recebido Total">Recebido Total</option>
							</optgroup>
						</select>
					</div>

		    	<div style="text-align: right;">
		    		<a href="pedido.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		    	</div>
		    	
		    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>
