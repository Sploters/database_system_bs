<!DOCTYPE html>
<html>
<head>
	<title>Certificado</title>
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
	<br><center><h3>Lista de Certificados</h3></center></br>
		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">Número do Certificado</th>
		      <th scope="col">Item Certificado</th>
		      <th scope="col">Status</th>
		      <th><center>Alterações</center></th>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `certificado`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_certificado = $array['id_certificado'];
		    			$num_certificado = $array['num_certificado'];
		    			$item_certificado = $array['item_certificado'];
		    			$status_certificado = $array['status_certificado'];
		    			$sql = "INSERT INTO `certificado`(`id_certificado`, `num_certificado`, `item_certificado`, `status_certificado`) VALUES ($id_certificado,'$num_certificado','$item_certificado','$status_certificado')";
		    		?>
		    	<tr>
				      <td><?php echo $num_certificado ?></td>
				      <td><?php echo $item_certificado ?></td>
				      <td><?php echo $status_certificado ?></td>
		      		<td>

	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 20px" href="editar_certificado.php?id=<?php echo $id_certificado ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

	      			<?php
	      				if ($nivel != 3){
	      			?>
		      		<a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_certificado.php?id=<?php echo $id_certificado ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    		<?php } ?>
			    	<?php } ?>

			    	</td>
		    	</tr>
		</table>
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>

			<?php
	      		if ($nivel != 3){
	      		?>
			<a class="btn btn-success" form-group style="margin-top: 20px" href="adicionar_certificado.php?id=<?php echo $id_certificado+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>	
				<?php } ?>
		</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>