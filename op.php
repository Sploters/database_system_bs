<!DOCTYPE html>
<html>
<head>
	<title>OP</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;600&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
	.button {
	  background-color: #FECA57; /* Green */
	  border: none;
	  border-radius: 4px;
	  color: white;
	  padding: 8px 16px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  margin: -8px 2px;
	  transition-duration: 0.4s;
	  cursor: pointer;
	}

	.button1 {
	  background-color: white; 
	  color: black; 
	  border: 2px solid #FECA57;
	}

	.button1:hover {
	  background-color: #FECA57;
	  color: white;
	}

	.button2 {
	  background-color: #1DD1A1; 
	  color: white; 
	  border: 2px solid #1DD1A1;
	}

	.button2:hover {
	  background-color: white;
	  color: #1DD1A1;
	}

	.button3 {
	  background-color: white; 
	  color: black; 
	  border: 2px solid #2E86DE;
	}

	.button3:hover {
	  background-color: #2E86DE;
	  color: white;
	}

	.button span {
	  cursor: pointer;
	  display: inline-block;
	  position: relative;
	  transition: 0.5s;
	}

	.button span:after {
	  content: '\1F814';
	  position: absolute;
	  opacity: 0;
	  top: 0;
	  left: -5px;
	  transition: 0.15s;
	}

	.button:hover span {
	  color: white;
	  padding-left: 25px;
	}

	.button:hover span:after {
	  opacity: 1;
	  left: 0;
	}

	.text {
	margin: 4px 0px;
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
while ($array = mysqli_fetch_array($busca))
{
	$id_op = $array['id_op'];
}
?>
<nav class="fixed-top collapse.navbar-collapse bg-dark ">

<a class="slidein" href="http://www.jfrmetalurgica.com.br"><img class="img-responsive" alt="81x90" width="81" height="90" src="http://jfrmetalurgica.com.br/wp-content/uploads/2020/04/oie_14195353uRfQCoq-270x300.png" class="img-responsive"></a>

  <span style="color:#FFF; font-family: Roboto;" >
  	<h2>CARTEIRA DE PRODUÇÃO</h2>
  </span>
  <!-- <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
  </form> -->

	<a href="menu.php" role="button" class="button button3"form-group><span> Voltar</span></a>
	<a class="button button2" type="button" data-toggle="modal" data-target="#confirm" form-group ><i class="fas fa-plus"></i>&nbsp;Adicionar</a>
</nav>
	
			<div class="modal fade" id="confirm" role="dialog">
			  <div class="modal-dialog modal-md">

			    <div class="modal-content">
			      <div class="modal-body">
			            <p> Deseja utilizar os dados anteriores?</p>
			      </div>
			      <div class="modal-footer">
				      <a href="adicionar_op.php?id=<?php echo $id_op+1 ?>" type="button" class="button button2" id="<?php $id = 'sim'; ?>">Sim, Continuar</a>
				      <?php 
				      	if ($id == 'sim') {}
				      ?>
				      <a href="adicionar_op.php?id=<?php echo $id_op+1 ?>" type="button" class="button button3">Não, Criar um novo</a>
			      </div>
			    </div>

			  </div>
			</div>

	<div style="margin-top: 40px">
	<br><center><h3>Lista de OPs</h3></center></br>
		<table class="table table-striped table-hover">
		  <thead>
		    <tr style="text-align:center; font-family: Oswald;">
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
		
		$sql = "SELECT * FROM `op`";

		$busca = mysqli_query($conexao,$sql);

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
		$data1 = $array['prazo_contratual'];
		$data2 = $array['inicio'];
		$horas_real = $array['horas_real'];
		$data3 = $array['prazo_previsto'];
		$data4 = $array['termino_real'];

		//Na hora de pegar a data do BD e exibir na tela, faça a mesma coisa que fiz acima, porém troquei '-' por '/':
		$dataP1 = explode('-', $data1);
		$prazo_contratual = $dataP1[2].'/'.$dataP1[1].'/'.$dataP1[0];
		$dataP2 = explode('-', $data2);
		$inicio = $dataP2[2].'/'.$dataP2[1].'/'.$dataP2[0];
		$dataP3 = explode('-', $data3);
		$prazo_previsto = $dataP3[2].'/'.$dataP3[1].'/'.$dataP3[0];
		$dataP4 = explode('-', $data4);
		$termino_real = $dataP4[2].'/'.$dataP4[1].'/'.$dataP4[0];
		$state = $array['state'];

		?>
		    	<tr style="text-align:center; font-family: Oswald;"<?php if($state == 'oculto'){ ?> visibility: hidden <?php } ?> >
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

	      			<a class="button button1" form-group href="editar_op.php?id=<?php echo $id_op ?>" >Editar</a>

		      		<!-- <a class="btn btn-danger btn-sm" form-group style="margin-left: 20px" href="deletar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a> -->
			    	<?php } ?>
			    	</td>
		    	</tr>
		</table>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>