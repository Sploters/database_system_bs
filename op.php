<!DOCTYPE html>
<html>
<head>
	<title>OP</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<style type="text/css">
		#tamanhoContainer {
			width: 2000px;
		}
	</style>
</head>
<body style="background-color: rgba(18, 18, 18, 0.15);">



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

$sql = "SELECT * FROM `op`";

$busca = mysqli_query($conexao,$sql);



?>
<nav class="navbar fixed-top navbar bg-dark">
<a form-group style="margin-left: 80px" href="http://www.jfrmetalurgica.com.br"><img alt="54x60" width="54" height="60" src="http://jfrmetalurgica.com.br/wp-content/uploads/2020/04/oie_14195353uRfQCoq-270x300.png" class="img-responsive"></a>
  <span style="color:#FFF">
  	<h2>CARTEIRA DE PRODUÇÃO</h2>
  	</span>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
  </form>
    <div form-group style="margin-right: 80px">
	<a href="menu.php" role="button" class="btn btn-primary"form-group>Voltar</a>
	<a class="btn btn-success" form-group href="adicionar_op.php?id=<?php echo $id_op+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>
	</div>
</nav>

	<div style="margin-top: 20px" class="container" id="tamanhoContainer">
	<br><center><h3>Lista de OPs</h3></center></br>
		<table class="table table-striped table-hover">
		  <thead>
		    <tr>
		      <th scope="col">OP</th>
		      <th scope="col">Item</th>
		      <th scope="col">Pedido</th>
		      <th scope="col">Item Ped.</th>
		      <th scope="col">Cliente</th>
		      <th scope="col">Projeto</th>
		      <th scope="col">QTD.</th>
		      <th scope="col">Equipamento</th>
		      <th scope="col">Horas Orçadas</th>
		      <th scope="col">Prazo Contrato</th>
		      <th scope="col">Início</th>
		      <th scope="col">Horas Real</th>
		      <th scope="col">Prazo Previsto</th>
		      <th scope="col">Término Real</th>
		      <th><center>Alterações</center></th>
		    </tr>
		  </thead>
		  <?php 
while ($array = mysqli_fetch_array($busca))
{
$id_op = $array['id_op'];
$op_num = $array['op_num'];
$op_item = $array['op_item'];
$po_cliente = $array['po_cliente'];
$item_po = $array['item_po'];
$cliente = $array['cliente'];
$projeto = $array['projeto'];
$qtd = $array['qtd'];
$equipamento = $array['equipamento'];
$horas_orc = $array['horas_orc'];
$prazo_contratual = $array['prazo_contratual'];
$inicio = $array['inicio'];
$horas_real = $array['horas_real'];
$prazo_previsto = $array['prazo_previsto'];
$termino_real = $array['termino_real'];

?>
		    	<tr>
				      <td><?php echo $op_num ?></td>
				      <td><?php echo $op_item ?></td>
				      <td><?php echo $po_cliente ?></td>
					  <td><?php echo $item_po ?></td>
					  <td><?php echo $cliente ?></td>
					  <td><?php echo $projeto ?></td>
					  <td><?php echo $qtd ?></td>
					  <td><?php echo $equipamento ?></td>
					  <td><?php echo $horas_orc ?></td>
					  <td><?php echo $prazo_contratual ?></td>
					  <td><?php echo $inicio ?></td>
					  <td><?php echo $horas_real ?></td>
					  <td><?php echo $prazo_previsto ?></td>
					  <td><?php echo $termino_real ?></td>
		      		<td>

	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 20px" href="editar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a>

		      		<!-- <a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a> -->
			    	<?php } ?>
			    	</td>
		    	</tr>
		</table>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>