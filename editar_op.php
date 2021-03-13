<?php 

include 'conexao.php';

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Formulário de OPs</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>
	<style type="text/css">

		#tamanhoContainer {
			width: 350px;
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
<script type="text/javascript">
</script>

	<div class="container" style="width: 370px; margin-top: 70px">
		<nav class="navbar fixed-top navbar bg-light">
			<h4 id="font1" style="margin-left: 20px" >Editando Equipamento</h4>
		</nav>
		<form action="_atualizar_op.php" method="post">
			<?php
			$sql = "SELECT * FROM `op` WHERE id_op = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){

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
				$po_cliente = $array['po_cliente'];
				$data1 = $array['prazo_contratual'];
				$data2 = $array['inicio'];
				$horas_real = $array['horas_real'];
				$data3 = $array['prazo_previsto'];
				$data4 = $array['termino_real'];

				//Pegue a data no formato dd/mm/yyyy
				//Exploda a data para entrar no formato aceito pelo DB.
				$dataP = explode('-', $data1);
				$dataP2 = explode('-', $data2);
				$dataP3 = explode('-', $data3);
				$dataP4 = explode('-', $data4);
				// $dataP3 = explode('/', $data3);
				// $dataP4 = explode('/', $data4);
				//Altera a data para o Banco de Dados ler.
				$prazo_contratual = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
				$inicio = $dataP2[2].'/'.$dataP2[1].'/'.$dataP2[0];
				$prazo_previsto = $dataP3[2].'/'.$dataP3[1].'/'.$dataP3[0];
				$termino_real = $dataP4[2].'/'.$dataP4[1].'/'.$dataP4[0];
			?>

		<div class="form-group" style="margin-top: 20px">
			<label>Ordem de Produção(OP/JFR)</label>
			<input type="text" class="form-control" name="op_num" value="<?php echo $op_num ?>">
			<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		</div>

		<div class="form-group" style="margin-top: 20px">
			<label>Item da Ordem de Produção</label>
			<input type="text" class="form-control" name="op_item" value="<?php echo $op_item ?>">
		</div>
		
		<div class="form-group" style="margin-top: 20px">
	    	<label>Pedido de Compra Cliente</label>
	    	<input type="text" name="po_cliente" class="form-control" value="<?php echo $po_cliente ?>">
  		</div>

		  <div class="form-group" style="margin-top: 20px">
	    	<label>Item do Pedido do Cliente</label>
	    	<input type="text" name="item_po" class="form-control" value="<?php echo $item_po ?>">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Cliente</label>
	    	<input type="text" name="cliente" class="form-control" value="<?php echo $cliente ?>"> <!-- fazer um modo de seleção de clientes no DB -->
  		</div>
		
		<div class="form-group" style="margin-top: 20px">
	    	<label>Projeto</label>
	    	<input type="text" name="projeto" class="form-control" value="<?php echo $projeto ?>">
  		</div>

		  <div class="form-group" style="margin-top: 20px">
	    	<label>Quantidade</label>
	    	<input type="number" name="qtd" class="form-control" value="<?php echo $qtd ?>">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Equipamento</label>
	    	<input type="text" name="equipamento" class="form-control" value="<?php echo $equipamento ?>">
  		</div>
		
		<div class="form-group" style="margin-top: 20px">
	    	<label>Horas Orçadas</label>
	    	<input type="number" name="horas_orc" class="form-control" value="<?php echo $horas_orc ?>">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Prazo Contratual</label>
	    	<input type="date" name="prazo_contratual" class="form-control" value="<?php echo $prazo_contratual ?>">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Data de Início</label>
	    	<input type="date" name="inicio" class="form-control" value="<?php echo $inicio ?>">
  		</div>

		<div class="form-group" style="margin-top: 20px">
	    	<label>Horas Reais</label>
	    	<input type="number" name="horas_real" class="form-control" value="<?php echo $horas_real ?>" autocomplete="off" placeholder="Horas Reais">
  		</div>

		  <div class="form-group" style="margin-top: 20px">
	    	<label>Prazo Previsto</label>
	    	<input type="date" name="prazo_previsto" class="form-control" value="<?php echo $prazo_previsto ?>" autocomplete="off" placeholder="Data prevista">
  		</div>

		  <div class="form-group" style="margin-top: 20px">
	    	<label>Término Real</label>
	    	<input type="date" name="termino_real" class="form-control" value="<?php echo $termino_real ?>" autocomplete="off" placeholder="Data do Término">
  		</div>

		<div style="text-align: right; margin: 20px 0px 20px 0px">
			<a href="op.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
			<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		</div>
		    	
		    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>
