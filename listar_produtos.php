<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Produtos</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<style type="text/css">
		#tamanhoContainer {
			width: 900px;
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
	<br><center><h3>Lista de Produtos</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Nro Produto</th>
		      <th scope="col">Nome Produto</th>
		      <th scope="col">Categoria</th>
		      <th scope="col">Quantidade</th>
		      <th scope="col">Fornecedor</th>
		      <th scope="col">Alteração</th>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `estoque`";
		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_estoque = $array['id_estoque'];
		    			$nroproduto = $array['nroproduto'];
		    			$nomeproduto = $array['nomeproduto'];
		    			$categoria = $array['categoria'];
		    			$quantidade = $array['quantidade'];
		    			$fornecedor = $array['fornecedor'];
		    		?>
		    	<tr>
		      		<td><?php echo $nroproduto ?></td>
		      		<td><?php echo $nomeproduto ?></td>
		      		<td><?php echo $categoria ?></td>
		      		<td><?php echo $quantidade ?></td>
		      		<td><?php echo $fornecedor ?></td>

		      		<td>
	      			<?php
	      				if ($nivel != 7){
	      			?>
	      			<a class="btn btn-warning btn-sm" href="editar_produto.php?id=<?php echo $id_estoque ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>
	      		<?php } 

	      			if ($nivel == 1){
	      				?>
		      		<a class="btn btn-danger btn-sm" href="deletar_produto.php?id=<?php echo $id_estoque ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    	<?php } ?>
			    	</td>
			    	<?php } ?>
		    	</tr>
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>