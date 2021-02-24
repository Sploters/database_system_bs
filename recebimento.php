<!DOCTYPE html>
<html>
<head>
	<title>Recebimento</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<style type="text/css">
		#tamanhoContainer {
			width: 2000px;
		}

		.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 106px;
  box-shadow: 0px 8px 8px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

	</style>
</head>
<body>

<?php 
include 'conexao.php';

$sql = "SELECT * FROM recebimento";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);
$id_receb = $array['id_receb'];
?>

	<div class="container" id="tamanhoContainer">
		<div style="text-align: right;">
			<a href="menu.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>

			<a class="btn btn-success" form-group style="margin-top: 20px" href="adicionar_recebimento.php?id=<?php echo $id_receb+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>	
			
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

	<br><center><h3>Lista de recebimentos</h3></center></br>

		<table class="table table-dark table-hover">
		  <thead>
		    <tr>
		      <th scope="col">IDR</th>
		      <th scope="col">Data</th>
		      <th scope="col">Recebedor</th>
		      <th scope="col">NF</th>
		      <th scope="col">Item NF</th>
		      <th scope="col">QTD</th>
		      <th scope="col">Fornecedor</th>
		      <th scope="col">Código Material</th>
		      <th scope="col">Descrição</th>
		      <th scope="col">Dimensão</th>
		      <th scope="col">Material</th>
		      <th scope="col">Certificado</th>
		      <th scope="col">Item Certificado</th>
		      <th scope="col">Status Certificado</th>
		      <th scope="col">Corrida/Lote</th>
		      <th scope="col">Origem</th>
		      <th scope="col">Rastreio Cliente</th>
		      <th scope="col">Pedido</th>
		      <th scope="col">Item Pedido</th>
		      <th scope="col">OP</th>
		      <th scope="col">Status Recebimento</th>
		      <th><center>Alterações</center></th>
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `origem`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_origem = $array['id_origem'];
		    			$sql = "INSERT INTO `recebimento`(`id_origem`) VALUES ($id_origem)";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `pedido`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_pedido = $array['id_pedido'];
		    			$item_pedido = $array['pedido_item'];
		    			$sql = "INSERT INTO `recebimento`(`id_pedido`, `pedido_item`) VALUES ($id_pedido, 'item_pedido')";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `op`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_op = $array['id_op'];
		    			$sql = "INSERT INTO `recebimento`(`id_op`) VALUES ($id_op)";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `material`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$mat_material = $array['mat_material'];
		    			$dim_material = $array['dim_material'];
		    			$den_material = $array['den_material'];
		    			$cod_material = $array['cod_material'];
		    			$sql = "INSERT INTO `recebimento`(`mat_material`, `dim_material`, `den_material`, `cod_material`) VALUES ($mat_material, '$dim_material', '$den_material', '$cod_material')";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `certificado`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$num_certificado = $array['num_certificado'];
		    			$item_certificado = $array['item_certificado'];
		    			$status_certificado = $array['status_certificado'];
		    			$sql = "INSERT INTO `recebimento`(`num_certificado`, `item_certificado`, `status_certificado`) VALUES ($num_certificado, '$item_certificado', '$status_certificado')";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `usuarios`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_usuario = $array['id_usuario'];
		    			$sql = "INSERT INTO `recebimento`(`id_usuario`) VALUES ($id_usuario)";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `fornecedor`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_fornecedor = $array['id_fornecedor'];
		    			$nome_fornecedor = $array['nome_fornecedor'];
		    			$sql = "INSERT INTO `recebimento`(`id_fornecedor`, nome_fornecedor) VALUES ($id_fornecedor, $nome_fornecedor)";
		    		?>

		    	<?php
		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `recebimento`";

		    		$busca = mysqli_query($conexao,$sql);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_receb = $array['id_receb'];
		    			$idr = $array['idr'];
		    			$data_receb = $array['data_receb'];
		    			$nf_num = $array['nf_num'];
		    			$item_nf = $array['item_nf'];
		    			$qtd_receb = $array['qtd_receb'];
		    			$corrida = $array['corrida'];
		    			$rastreabilidade = $array['rastreabilidade'];
		    			$item_pedido = $array['item_pedido'];
		    			$status_receb = $array['status_receb'];
		    			$sql = "INSERT INTO `recebimento`(`id_receb`, `idr`, `data_receb`, `nf_num`, `item_nf`, `qtd_receb`, `corrida`, `rastreabilidade`, `item_pedido`, `status_receb`) VALUES ($id_receb, '$idr', '$data_receb', $nf_num, '$item_nf', $qtd_receb, '$corrida', '$rastreabilidade', '$item_pedido', '$status_receb')";
		    		?>

		    	<tr>
				      <td><?php echo $idr ?></td>
				      <td><?php echo $data_receb ?></td>
				      <td><?php echo $nome_fornecedor ?></td>
				      <td><?php echo $nf_num ?></td>
				      <td><?php echo $item_nf ?></td>
				      <td><?php echo $qtd_receb ?></td>
				      <td><?php echo $nome_fornecedor ?></td>
				      <td><?php echo $cod_material ?></td>
				      <td><?php echo $den_material ?></td>
				      <td><?php echo $dim_material ?></td>
				      <td><?php echo $mat_material ?></td>
				      <td><?php echo $num_certificado ?></td>
				      <td><?php echo $item_certificado ?></td>
				      <td><?php echo $status_certificado ?></td>
				      <td><?php echo $corrida ?></td>
				      <td><?php echo $id_origem ?></td>
				      <td><?php echo $rastreabilidade ?></td>
				      <td><?php echo $id_pedido ?></td>
				      <td><?php echo $item_pedido ?></td>
				      <td><?php echo $id_op ?></td>
				      <td><?php echo $status_receb ?></td>
		      		<td>

	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 20px" href="editar_recebimento.php?id=<?php echo $id_recebimento ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

	      			<?php
	      				if ($nivel != 3){
	      			?>
		      		<a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_recebimento.php?id=<?php echo $id_recebimento ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			    		<?php } ?>
										    	<?php } ?>
											<?php } ?>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					<?php } ?>
			    	</td>
		    	</tr>
		</table>
	</div>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>