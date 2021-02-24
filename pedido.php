<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Pedido</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<style type="text/css">
		#tamanhoContainer {
			width: 1000px;
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

	<div class="container" id="tamanhoContainer">
	<br><center><h3>Lista de Pedidos</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Número Certificado</th>
		      <th scope="col">Pedido Item</th>
		      <th scope="col">Pedido Prazo</th>
		      <th scope="col">Certificado Status</th>
		      <th><center>Alterações</center></th>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `pedido`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_pedido = $array['id_pedido'];
		    			$num_pedido = $array['pedido_num'];
		    			$item_pedido = $array['pedido_item'];
		    			$prazo_pedido = $array['pedido_prazo'];
		    			$status_pedido = $array['pedido_status'];
		    			//Na hora de pegar a data do BD e exibir na tela, faça a mesma coisa que fiz acima, porém troquei '-' por '/':
						$dataP = explode('-', $prazo_pedido);
						$dataE = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
						$sql = "INSERT INTO `pedido`(`id_pedido`, `pedido_num`, `pedido_item`, `pedido_prazo`, `pedido_status`) VALUES ($id_pedido,$num_pedido,'$item_pedido',$prazo_pedido,'$status_pedido')";
		    		?>
		    	<tr>
				      <td><?php echo $num_pedido ?></td>
				      <td><?php echo $item_pedido ?></td>
				      <td><?php echo $dataE ?></td>
				      <td><?php echo $status_pedido ?></td>
		      		<td>

	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 20px" href="editar_pedido.php?id=<?php echo $id_pedido ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

	      			<?php
	      				if (($nivel == 1) || ($nivel == 2)){
	      			?>
		      		<a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_pedido.php?id=<?php echo $id_pedido ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    		<?php } ?>
			    	<?php } ?>

			    	</td>
		    	</tr>
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>

			<?php
	      		if (($nivel == 1) || ($nivel == 2)){
	      		?>
			<a class="btn btn-success" form-group style="margin-top: 20px" href="adicionar_pedido.php?id=<?php echo $id_pedido+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>	
				<?php } ?>
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>