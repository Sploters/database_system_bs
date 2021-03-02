<!DOCTYPE html>
<html>
<head>
<meta name="color-scheme" content="dark light">
	<title>Adicionando Recebimentos</title>
	<!--<link rel="stylesheet" href="css/bootstrap.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>

<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}

body{
	background-color: #ffffff;
	color = black;
}

#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
		}

.dark-mode{
	background-color: #181818;
	color = white;
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



<div class="container" style="width: 400px; margin-top: 20px">
<?php
include 'conexao.php';

//$sql = "SELECT * FROM `usuarios`";
$sql = "SELECT nome_usuario FROM usuarios WHERE '$usuario' = mail_usuario";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);
$nome_usuario = $array['nome_usuario'];

//$nome_usuario = $_SESSION['usuario'];

?>

	<form action="_insert_recebimento.php" method="post">


		<h4>Cadastro de Recebimentos</h4>

		<?php
		include 'conexao.php';

		//$sql = "SELECT * FROM `usuarios`";
		$sql = "SELECT ticket FROM recebimento";
		$buscar = mysqli_query($conexao,$sql);
		$array = mysqli_fetch_array($buscar);
		$ticket = $array['ticket'];

		//$nome_usuario = $_SESSION['usuario'];

		?>

		<div class="form-group" style="margin-top: 40px">
	    	<label>Ticket</label>
	    	<input name="ticket" type="text" class="form-control" required autocomplete="off" value="<?php echo $ticket + 1 ?>" readonly>
  		</div>


		<div class="form-group" style="margin-top: 20px">
	    	<label>Nome do Recebedor</label>
	    	<input name="id_usuario" type="text" class="form-control" required autocomplete="off" value="<?php echo $nome_usuario ?>" readonly>
  		</div>
  		<?php
		include 'conexao.php';

		//$sql = "SELECT * FROM `usuarios`";
		$sql = "SELECT * FROM recebimento";
		$buscar = mysqli_query($conexao,$sql);
		$array = mysqli_fetch_array($buscar);
			$id_material = $array['id_material'];
			$id_fornecedor = $array['id_fornecedor'];
			$id_certificado = $array['id_certificado'];

		//$nome_usuario = $_SESSION['usuario'];

		?>


<div class="form-group" style="margin-top: 20px">
	<label>Origem</label>
	<div class="form-group">

<select name = "recebedor" class="selectpicker form-control" id="mySelect" onchange="origem_empresa(this)">
	<optgroup label="ORIGEM">
		<option id="selecione" value="selecione" selected="selected" disabled="disabled">Selecione...</option>
		<option id="jfr_origem" value="jfr">JFR</option>
	  	<option id="ng_origem" value="ng">NG</option>
	  	
	  </optgroup>
	  
</select>



<script language="javascript" type="text/javascript">

function origem_empresa(val) {
	if(val.value == 'jfr'){
        document.getElementById('ng').style.display = 'none';
     	document.getElementById('mc').style.display = 'none';
     	document.getElementById('idr').style.display = 'block';
     } else {
     	document.getElementById('ng').style.display = 'block';
     	document.getElementById('mc').style.display = 'block';
     	document.getElementById('idr').style.display = 'none';
     }     

     if(val.value == 'cli1'){
        document.getElementById('cnpj').style.display = 'none';
        document.getElementById('nome_forn').style.display = 'none';
     } else {
     	document.getElementById('cnpj').style.display = 'block';
     	document.getElementById('nome_forn').style.display = 'block';
     }

	};

</script>




	</div>
</div>

		<div id="ng" class="form-group" style="margin-top: 20px">
			
	    	<select name ="status_receb" class="form-control" id="origem_empresa_ng" onchange="origem_empresa(this)">
				<optgroup label="NG">
				<option id="selecione" value="selecione" selected="selected" disabled="disabled">Selecione...</option>
				<option id="cli1" value="cli1" >Direto do Cliente</option>
				<option id="cli2" value="cli2">Do Fornecedor</option>
			  </optgroup>
			</select>
  		</div>

	    	<label id="idr" onchange="origem_empresa(this)" selected="selected"></label>
	    	<label id="mc" onchange="origem_empresa(this)"></label>
	    	<!-- <input name="id_origem" type="text" class="form-control" required autocomplete="off" placeholder="IDR" readonly>
 -->

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Data</label>
	    	<input name = "data_receb" type="text" id="data" class="form-control" required autocomplete="off" value="<?php $hoje = date('d/m/Y'); echo $hoje; ?>">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>OP</label>
	    	<input name = "id_op" type="text" class="form-control" required autocomplete="off">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Nota Fiscal</label>
	    	<input name = "nf_num" type="text" class="form-control" required autocomplete="off" placeholder="Nº NF">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Item da Nota Fiscal</label>
	    	<input type="text" name="item_nf" class="form-control" required autocomplete="off" placeholder="Item NF">
  		</div>



		<script type="text/javascript">
  			//CNPJ
			$("#pj").mask("99.999.999/9999-99");
			//Data
			$("#data").mask("99/99/9999");
  		</script>
  		<div id="cnpj" class="form-group" style="margin-top: 20px">
	    	<label>CNPJ Fornecedor</label>
	    	<input type="text" name="cnpj" id="pj" class="form-control" required autocomplete="off" placeholder="CNPJ do Fornecedor">
  		</div>

  		<?php 	
			$cnpj=""; 
			
		  		include 'conexao.php';
				$sql = "SELECT * FROM fornecedor WHERE '$cnpj' = cnpj";
				$buscar = mysqli_query($conexao,$sql);
				$array = mysqli_fetch_array($buscar);
				$nome_fornecedor = $array['nome_fornecedor'];
			?> 
			
			<script type="text/javascript">
			$(document).ready(function(){
				$("input[name='cnpj']").blur(function(){
					var $nome_fornecedor = $("input[name='nome_fornecedor']");
					$.getJSON('function_fornecedor.php',{
						cnpj: $ (this).val()
					}, function(json){
						$nome_fornecedor.val(json.nome_fornecedor);
					});
				});
			});
		</script>

  		<div id="nome_forn" class="form-group" style="margin-top: 20px">
	    	<label>Fornecedor</label>
	    	<input type="text" name = "nome_fornecedor" value="<?php echo $nome_fornecedor?>" class="form-control" required autocomplete="off" readonly>
  		</div>



  		<div id="id_pedido" class="form-group" style="margin-top: 20px">
	    	<label>Pedido</label>
	    	<input type="text" name="pedido" class="form-control" required autocomplete="off" placeholder="Nº do Pedido">
  		</div>
<!--value="<?php echo $pedido?>"-->
  		<div id="item_pedido" class="form-group" style="margin-top: 20px">
	    	<label>Item Pedido</label>
	    	<input type="text" name="item_pedido" class="form-control" required autocomplete="off" placeholder="Nome do Pedido">
  		</div>

<!--value="<?php echo $item_pedido?>"-->
  		<div class="form-group" style="margin-top: 20px">
	    	<label>Quantidade</label>
	    	<input type="text" name="qtd_receb" class="form-control" required autocomplete="off" placeholder="Quantidade">
  		</div>
<!--value="<?php echo $qtd_receb?>"-->
		<div class="form-group" style="margin-top: 20px">

	    	<label>ID do Material</label>
	    	<input type="text" name="id_material" class="form-control" required autocomplete="off" placeholder="ID do Material">
  		</div>


  		<div class="form-group" style="margin-top: 20px">

	    	<label>Código do Material</label>
	    	<input type="text" name="cod_material" class="form-control" required autocomplete="off" placeholder="Código do Material">
  		</div>



		<?php 	
			$cod_material=""; 
			
		  		include 'conexao.php';
				$sql = "SELECT * FROM material WHERE '$cod_material' = cod_material";
				$buscar = mysqli_query($conexao,$sql);
				$array = mysqli_fetch_array($buscar);
					$id_material = $array['id_material'];
					$den_material = $array['den_material'];
					$dim_material = $array['dim_material'];
					$mat_material = $array['mat_material'];

			?> 
			<script type="text/javascript">
			$(document).ready(function(){
				$("input[name='cod_material']").blur(function(){
					var $den_material = $("input[name='den_material']");
					var $dim_material = $("input[name='dim_material']");
					var $mat_material = $("input[name='mat_material']");
					$.getJSON('function.php',{
						cod_material: $ (this).val()
					}, function(json){
						$den_material.val(json.den_material);
						$dim_material.val(json.dim_material);
						$mat_material.val(json.mat_material);
					});
				});
			});
		</script>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Descrição</label>
	    	<input type="text" value="<?php echo $den_material ?>" name="den_material" class="form-control" required autocomplete="off" readonly>
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Dimensão</label>
	    	<input type="text" value="<?php echo $dim_material ?>" name="dim_material" class="form-control" required autocomplete="off" readonly>
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Material</label>
	    	<input type="text" value="<?php echo $mat_material ?>" name="mat_material" class="form-control" required autocomplete="off" readonly>
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Status Material</label>
	    	<select name ="status_material" class="form-control">
				<optgroup>
					<option value="Pendente">Pendente</option>
					<option value="Finalizado">Finalizado</option>
					<option value="Recebido">Recebido</option>
					<option value="Ok">Ok</option>
				</optgroup>
			</select>
  		</div>




  		<div class="form-group" style="margin-top: 20px">
	    	<label>Volume Corrida</label>
	    	<input type="text" class="form-control" required autocomplete="off" placeholder="Volume Corrida">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Número Certificado</label>
	    	<input type="text" name="id_fornecedor" class="form-control" required autocomplete="off" placeholder="Nº Certificado">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Item Certificado</label>
	    	<input type="text" name="id_fornecedor" class="form-control" required autocomplete="off" placeholder="Nome Certificado">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Status Certificado</label>
	    	<select name ="status_certificado" class="form-control">
				<optgroup>
					<option value="Pendente">Pendente</option>
					<option value="Finalizado">Finalizado</option>
					<option value="Recebido">Recebido</option>
					<option value="Ok">Ok</option>
				</optgroup>
			</select>
  		</div>

  		<div class="form-group" style="margin-top: 20px">
	    	<label>Rastreio Cliente</label>
	    	<input type="text" name="id_fornecedor" class="form-control" required autocomplete="off" placeholder="ID do Fornecedor">
  		</div>

  		<div class="form-group" style="margin-top: 20px">
			<label>Status Material</label>
			<select name ="status_receb" class="form-control">
				<optgroup>
					<option value="Pendente">Pendente</option>
					<option value="Finalizado">Finalizado</option>
					<option value="Recebido">Recebido</option>
					<option value="Ok">Ok</option>
				</optgroup>
			</select>
		</div>

		<div style="text-align: right; margin-top: 20px">
			<a href="recebimento.php" role="button" class="btn btn-primary">Voltar</a>
			<button type="submit" id="botao" class="btn">Cadastrar</button>
		</div>
			
	</form>
</div>
<script type="text/JavaScript"src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<!--<script type="text/javascript">src="personalizado.js"</script>-->
</body>
</html>