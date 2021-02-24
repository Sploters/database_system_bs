<!DOCTYPE html>
<html>
<head>
	<title>OP</title>
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
	<br><center><h3>Lista de OPs</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Número da OP</th>
		      <th scope="col">Item da OP</th>
		      <th><center>Alterações</center></th>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `op`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_op = $array['id_op'];
		    			$op_num = $array['op_num'];
		    			$op_item = $array['op_item'];
		    		?>
		    	<tr>
				      <td><?php echo $op_num ?></td>
				      <td><?php echo $op_item ?></td>
		      		<td>

	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 20px" href="editar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

		      		<a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    	<?php } ?>

			    	</td>
		    	</tr>
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
			<a class="btn btn-success" form-group style="margin-top: 20px" href="adicionar_op.php?id=<?php echo $id_op+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>	
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>