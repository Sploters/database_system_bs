<?php include_once('conexao.php');
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$result = "SELECT * FROM material";
$resultado = mysqli_query($conexao,$result);
$total = mysqli_num_rows($resultado);
$quantidade_pg = 50; //quantidade de itens por pág
$num_pag = ceil($total/$quantidade_pg);
$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
$result = "SELECT * FROM material LIMIT $inicio, $quantidade_pg";
$resultado = mysqli_query($conexao,$result);
$total = mysqli_num_rows($resultado);
$limitedelinks = 10;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Material</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<style type="text/css">
		#tamanhoContainer {
			width: 1500px;
		}
	</style>
</head>
<body>

<?php 
include 'conexao.php';

$sql = "SELECT * FROM material";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);
$id_material = $array['id_material'];
?>

<nav class="navbar fixed-top navbar bg-dark">
<a form-group style="margin-left: 80px"><img alt="54x60" width="54" height="60" src="http://jfrmetalurgica.com.br/wp-content/uploads/2020/04/oie_14195353uRfQCoq-270x300.png" href="index.php" class="img-responsive"></a>
  <form class="form-inline">

    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
  </form>
    <div form-group style="margin-right: 80px">
	<a href="menu.php" role="button" class="btn btn-primary"form-group>Voltar</a>
	<a class="btn btn-success" form-group href="adicionar_material.php?id=<?php echo $id_material+1 ?>" role="button"><i class="fas fa-plus"></i>&nbsp;Adicionar</a>
	</div>
</nav>

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

<div id="tamanhoContainer">	
	<div><br><center><h3>Lista de Materiais</h3></center></br></div>
		<table class="table table-light table-hover" style="width:2000px">
		  <thead>
		    <tr>
		    	<th><center>Alterações</center></th>
		    	<th scope="col">Chave</th>
			    <th scope="col">Código</th>
			    <th scope="col">Denominação</th>
			    <th scope="col">Material</th>
			    <th scope="col">Requesitos</th>
			    <th scope="col">Dimensões</th>
			    <th scope="col"><center>Narrativa</center></th>
			    <th scope="col">Unidade</th>
			    <th scope="col">Kg/Un.</th>
		        
		    </tr>
		  </thead>

		    	<?php
		    		include 'conexao.php';
		    		//$sql = "SELECT * FROM `material` LIMIT 50";
		    		$result = "SELECT * FROM `material` LIMIT $inicio, $quantidade_pg";

		    		$busca = mysqli_query($conexao,$result);

		    		while ($array = mysqli_fetch_array($busca))
		    		{
		    			$id_material = $array['id_material'];
					    $chave_material = $array['chave_material'];
					    $cod_material = $array['cod_material'];
					    $den_material = $array['den_material'];
					    $mat_material = $array['mat_material'];
					    $req_material = $array['req_material'];
					    $dim_material = $array['dim_material'];
					    $nar_material = $array['nar_material'];
					    $um_material = $array['um_material'];
					    $peso_espec_material = $array['peso_espec_material'];
		    		?>
		    	<tr>
		      		<td>

	      			<a class="btn btn-warning btn-sm" form-group style="margin-left: 10px" href="editar_material.php?id=<?php echo $id_material ?>" role="button"><i class="fas fa-edit"></i></a>

		      		<a class="btn btn-danger btn-sm" form-group href="deletar_material.php?id=<?php echo $id_material ?>" role="button"><i class="fas fa-trash-alt"></i></a>
			    	</td>
			    	
				    <td><?php echo $chave_material?>
					<td><?php echo $cod_material?>
					<td><?php echo $den_material?>
					<td><?php echo $mat_material?>
					<td><?php echo $req_material?>
					<td><?php echo $dim_material?>
					<td style="width:1000px"><?php echo $nar_material?>
					<td><?php echo $um_material?>
					<td><?php echo $peso_espec_material?>
				    <?php } ?>  

		    	</tr>
		   </table>

		<?php
			$pag_ant = $pagina - 1;
			$pag_pos = $pagina + 1;
		?>
		<nav class="text-center">
		  <ul class="pagination">
		  	<li>

		  		<?php 
		  			if($pag_ant > 1) { ?>
		  				<a class="page-link" href="material.php?pagina=<?php echo $pag_ant; ?>" aria-label="Previous">
		      	<span aria-hidden="true">&laquo;</span>
		      </a>
		  			<?php } ?>		      
		    </li>

		      <?php
		      	$resultado = mysqli_query($conexao,$result);
				$total = mysqli_num_rows($resultado);
				$quantidade_pg = 50; //quantidade de itens por pág
				$num_pag = ceil($total/$quantidade_pg); 

		      	for($i = $pagina - 3, $num_pag = $i + 6; $i < $num_pag + 1; $i++) {
		      	if ($i < 1){
		      		$i = 1;
		      		$limitedelinks = 7;
		      	}
		      	if($limitedelinks > $num_pag){
		      	$limitedelinks = $num_pag;
		      	$i = $limitedelinks - 6;
				}
				if($i < 1){
					$i = 1;
					$limitedelinks = $num_pag;
		      	 }
		      	 ?>
				
		      	<li><a class="page-link" href="material.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		      	<?php } ?>

			    <li>
		  		<?php 
		  			if($pag_pos <= 269) { ?>
		  				<a class="page-link" href="material.php?pagina=<?php echo $pag_pos; ?>" aria-label="Next">
		      	<span aria-hidden="true">&raquo;</span>
		      </a>
		  			<?php } ?>
		    </li>
		  </ul>
		</nav>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>