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
	<br><center><h3>Lista de Categorias</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Nome Produto</th>
		      <th scope="col">Alteração</th>
		      <th></th>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `categoria`";
		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_categoria = $array['id_categoria'];
		    			$nomecategoria = $array['nome_categoria'];
		    		?>
		    	<tr>
		      		<td><?php echo $nomecategoria ?></td>

		      		<td><a class="btn btn-warning btn-sm" href="editar_categoria.php?id=<?php echo $id_categoria ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a></td>

		      		<td><a class="btn btn-danger btn-sm" href="deletar_categoria.php?id=<?php echo $id_categoria ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a></td>
		    	</tr>
		    	<?php } ?> 
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>