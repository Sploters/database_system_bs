<!DOCTYPE html>
<html>
<head>
	<title>Fornecedor</title>
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
	<br><center><h3>Lista de fornecedores</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Nome de fornecedor</th>
		      <th scope="col">Fone Forncecedor</th>
		      <th scope="col">E-mail</th>
		      <th scope="col">CNPJ</th>
		      <th></th>
		      <?php
			if ($nivel != 5){
	      			?>
		      <th><center>Alterações</center></th>
		  <?php } ?>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `fornecedor`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_fornecedor = $array['id_fornecedor'];
		    			$nome_fornecedor = $array['nome_fornecedor'];
		    			$a_fornecedor = $array['a_fornecedor'];
		    			$b_fornecedor = $array['b_fornecedor'];
		    			$cnpj = $array['cnpj'];
		    			$sql = "INSERT INTO `fornecedor`(`id_fornecedor`, `nome_fornecedor`, `a_fornecedor`, `b_fornecedor`, `cnpj`) VALUES ($id_fornecedor,$nome_fornecedor, '$a_fornecedor','$b_fornecedor','$cnpj')";
		    		?>
		    	<tr>
				      <td><?php echo $nome_fornecedor ?></td>
				      <td><?php echo $a_fornecedor ?></td>
				      <td><?php echo $b_fornecedor ?></td>
				      <td><?php echo $cnpj ?></td>
				      <?php
						if ($nivel != 5){
				      			?>
				      <td></td>
				  <?php } ?>
		      		<td>
		      <?php
	      				if ($nivel != 5){
	      			?>
	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 20px" href="editar_fornecedor.php?id=<?php echo $id_fornecedor ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

		      		<a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_fornecedor.php?id=<?php echo $id_fornecedor ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    	<?php } ?>
			    	<?php } ?>

			    	</td>
		    	</tr>
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
			
			<?php
			if ($nivel != 5){
	      			?>
			<a class="btn btn-success" form-group style="margin-top: 20px" href="adicionar_fornecedor.php?id=<?php echo $id_fornecedor+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>	
			<?php } ?>
		</div>
		
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>