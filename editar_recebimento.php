<?php 

include 'conexao.php';

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Formulário de Certificados</title>
	<!-- CSS only -->
		<link rel="stylesheet" href="css/bootstrap.css">

	<style type="text/css">

		#tamanhoContainer {
			width: 500px;
			height: 700px;
		}

		#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
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
<!-- <form action="ocultar.php" method="get">
<div style="text-align: right;">
	<a type="sub" class="btn btn-danger" form-group href="ocultar.php">Excluir<i class="fas fa-trash-alt"></i></a>
</div>
</form> -->
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
		<center><h3>Inspecionar Recebimento</h3></center>
		<form action="_atualizar_certificado.php" method="post">
			<?php

			$sql = "SELECT * FROM `recebimento` WHERE ticket = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){
				 $id_usuario =  $array['id_usuario'];
				 $id_fornecedor =  $array['id_fornecedor'];
				 $nome_fornecedor =  $array['nome_fornecedor'];
				 $id_origem = $array['id_origem'];
				 $recebedor = $array['recebedor'];//FELIPE
				 $data_receb = $array['data_receb'];
				 $qtd_receb = $array['qtd_receb'];
				 $nf_num = $array['nf_num'];
				 $item_nf = $array['item_nf'];
				 $id_pedido = $array['id_pedido'];
				 $pedido_num = $array['pedido_num'];
				 $item_pedido = $array['item_pedido'];
				 //$id_op = $array['id_op'];
				 // $status_receb = $array['status_receb'];//
				 // $cod_material = $array['cod_material'];
				 // $den_material = $array['den_material'];
				 // $dim_material = $array['dim_material'];
				 // $mat_material = $array['mat_material'];
				 //$status_certificado = $array['status_certificado'];
				 $id_material =  $array['id_material'];
				 $numero_certificado = $array['num_certificado'];

			?>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Certificado Item</label>
			    	<input type="text" autocomplete="off" class="form-control" name="numero_certificado" value="<?php echo $numero_certificado ?>">
		  		</div>

		  			<div class="form-group" style="margin-top: 20px">
						<label>Certificado Status</label>
						<select name ="status_certificado" class="form-control">
							<optgroup>
								<option value="Pendente">Pendente</option>
								<option value="Finalizado">Finalizado</option>
								<option value="Recebido">Recebido</option>
								<option value="Ok">Ok</option>
							</optgroup>
						</select>
					</div>

		    	<div style="text-align: right;">
		    		<a href="recebimento.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		    		<button id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		    	</div>
		    	
		    <?php } ?>

		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>
