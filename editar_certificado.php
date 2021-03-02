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

	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
		<h3>Formulário de Certificados</h3>
		<form action="_atualizar_certificado.php" method="post">
			<?php

			$sql = "SELECT * FROM `certificado` WHERE id_certificado = $id";
			$buscar = mysqli_query($conexao,$sql);
			while ($array = mysqli_fetch_array($buscar)){

				$id_certificado = $array['id_certificado'];
    			$num_certificado = $array['num_certificado'];
    			$item_certificado = $array['item_certificado'];
    			$status_certificado = $array['status_certificado'];
			?>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Número do Certificado</label>
			    	<input type="text" autocomplete="off" class="form-control" name="num_certificado" value="<?php echo $num_certificado ?>">
			    	<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
		  		</div>

		  		<div class="form-group" style="margin-top: 20px">
			    	<label>Certificado Item</label>
			    	<input type="text" autocomplete="off" class="form-control" name="item_certificado" value="<?php echo $item_certificado ?>">
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
		    		<a href="certificado.php" role="button" class="btn btn-primary"form-group style="margin-top: 20px">Voltar</a>
		    		<button type="submit" id="botao" class="btn "form-group style="margin-top: 20px">Atualizar</button>
		    	</div>
		    	
		    <?php } ?>
		</form>
	</div>	

<!-- JavaScript Bundle with Popper -->		
<script type="text/JavaScript"src="js/bootstrap.js"></script>

</body>
</html>
