<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Origem</title>
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
	<br><center><h3>Lista de Origens</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Empresa Origem</th>
<<<<<<< HEAD
		      <th><center>teste</center></th>
=======
		      <th><center>Alterações</center></th>
>>>>>>> f9ac121748c67071f9063689ea99fc922cfa2b3d
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `origem`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_origem = $array['id_origem'];
		    			$empresaorigem = $array['empresa_origem'];
<<<<<<< HEAD
		    			$state = $array['state'];
						$sql = "INSERT INTO `origem`(`id_origem`, `empresa_origem`) VALUES ($id_origem,$empresaorigem)";
		    		?>
		    	<tr <?php if($state == 'oculto'){ ?> visibility: hidden <?php } ?> >
=======
		    			$sql = "INSERT INTO `origem`(`id_origem`, `empresa_origem`) VALUES ($id_origem,$empresaorigem)";
		    		?>
		    	<tr>
>>>>>>> f9ac121748c67071f9063689ea99fc922cfa2b3d
		      		<td><?php echo $empresaorigem ?></td>

		      		<td>
	      			<?php
	      				if ($nivel != 7){
	      			?>
	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 300px" href="editar_origem.php?id=<?php echo $id_origem ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

		      		<a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_origem.php?id=<?php echo $id_origem ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    	<?php } ?>
			    	</td>

			    	<?php } ?>
		    	</tr>
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>

			<a class="btn btn-success" form-group style="margin-top: 20px" href="adicionar_origem.php?id=<?php echo $id_origem ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>	
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>