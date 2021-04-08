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
	<script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="sorttable.js"></script>
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

	.button-sm {
	  background-color: #FECA57; /* Green */
	  border: none;
	  border-radius: 4px;
	  color: white;
	  padding: 4px 8px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 8px;
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

	.button4 {
	  background-color: #ff6b6b;
	  color: white;
	  border: 2px solid #ff6b6b; 
	}

	.button4:hover {
	  background-color: white; 
	  color: black;
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

	.hidden-xs
	.hidden-sm
	.hidden-md
	.hidden-lg

	.visible-md-inline

	* {
		.tabelaEditavel {
	    border:solid 1px;
	    width:100%
	}

	.tabelaEditavel td {
	    border:solid 1px;
	}

	.tabelaEditavel .celulaEmEdicao {
	    padding: 0;
	}

	.tabelaEditavel .celulaEmEdicao input[type=text]{
	    width:100%;
	    border:0;
	    background-color:rgb(255,253,210);
	}
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

$sql = "SELECT * FROM `op`";

$busca = mysqli_query($conexao,$sql);
while ($array = mysqli_fetch_array($busca))
{
	$id_op = $array['id_op'];
}
?>
<nav class="navbar-expand-lg navbar-lg bg-dark" style="width: 100%; height: 120px;">
	<!-- 	<button type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	   -->
	<div style="text-align: left;">
		<a href="http://www.jfrmetalurgica.com.br"><img class="hidden-xs hidden-sm" style="margin-top: 20px;" alt="81x90" width="81" height="90" src="http://jfrmetalurgica.com.br/wp-content/uploads/2020/04/oie_14195353uRfQCoq-270x300.png"></a>
	</div>

	<div class="hidden-xs hidden-sm" style= "text-align: center; margin-top: -80px;">
	  <span class="nav-item" style="color:#FFF; font-family: Roboto; font-size: 36px;" >
	  CARTEIRA DE PRODUÇÃO
	  </span>
	</div>

	<div style="text-align: left;">
		<img class="hidden-md hidden-lg" style="margin-top: 20px;" alt="81x90" width="81" height="90" src="nav-color.jpg">
	</div>

	<div class="hidden-md hidden-lg" style= "text-align: center; margin-top: -70px;">
	  <span class="nav-item" style="color:#FFF; font-family: Roboto; font-size: 30px;" >
	  CARTEIRA DE PRODUÇÃO
	  </span>
	</div>
	  <!-- <form class="form-inline">
	    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
	  </form> -->
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="text-align: right;">
		<a class="button button3 hidden-xs hidden-sm" href="menu.php" role="button" form-group><span> Voltar</span></a>
		<a class="button button2 hidden-xs hidden-sm" type="button" data-toggle="modal" data-target="#confirm" form-group ><i class="fas fa-plus"></i>&nbsp;Adicionar</a>

		<a class="button button3 hidden-md hidden-lg" type="button" data-toggle="modal" href="menu.php" form-group><i class="fas fa-arrow-circle-left"></i></a>
		<a class="button button2 hidden-md hidden-lg" type="button" data-toggle="modal" data-target="#confirm" form-group ><i class="fas fa-plus"></i></a>
	</div>

		
				<div class="modal fade" id="confirm" role="dialog">
				  <div class="modal-dialog modal-md">

				    <div class="modal-content">
				      <div class="modal-body">
				            <p> Deseja utilizar os dados anteriores?</p>
				      </div>
				      <div style="text-align: center;">
					      <a href="adicionar_op.php?id=<?php echo $id_op+1 ?>" type="button" class="button button2 hidden-xs" id="<?php $id = 'sim'; ?>">Criar Novo Item</a>
					      <?php 
					      	if ($id == 'sim') {

					      	}
					      ?>
					</div>
					<div style="text-align: center; margin: 40px 0px 20px 0px;"> 
					      <a href="copiar_op.php?id=<?php echo $id_op+1 ?>" type="button" class="hidden-xs" style="text-align: center;" >copiar dados anteriores</a>
					</div>
					      <a href="adicionar_op.php?id=<?php echo $id_op+1 ?>" type="button" class="button button2 hidden-sm hidden-md hidden-lg" id="<?php $id = 'sim'; ?>">Sim</a>
					      <?php 
					      	if ($id == 'sim') {}
					      ?>
					      <a href="adicionar_op.php?id=<?php echo $id_op+1 ?>" type="button" class="button button3 hidden-sm hidden-md hidden-lg">Não</a>
				      </div>
				    </div>
				  </div>
				</div>
				<form style="text-align: right; margin-top: 40px;" class="form-inline">
				    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
			  	</form>

		<div style="margin-top: 30px">
			<table style="text-align: center;" id="tabelaEditavel" class="table table-striped table-hover table-bordered tabelaEditavel table-list-search sorttable">
			  <thead>
			    <tr style="text-align:center; font-family: Oswald;">
			    	<tr class ="hidden-xs" style="text-align:center; font-family: Oswald;">
			    	<th>TOTAL</th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    			<th>
	    			<?php

	    			include 'conexao.php';
				 
				    $resultado = mysqli_query($conexao, "SELECT sum(horas_orc) FROM op");
				    $linhas = mysqli_num_rows($resultado);
				 
				 
				    while($linhas = mysqli_fetch_array($resultado)){
				         echo $linhas['sum(horas_orc)'].'<br/>';
				            
				            ?>
				 
				    <?php } ?>
	    			</th>
	    			<th></th>
	    			<th></th>
	    			<th>
	    			<?php

	    			include 'conexao.php';
				 
				    $resultado = mysqli_query($conexao, "SELECT sum(horas_real) FROM op");
				    $linhas = mysqli_num_rows($resultado);
				 
				 
				    while($linhas = mysqli_fetch_array($resultado)){
				         echo $linhas['sum(horas_real)'].'<br/>';
				            
				            ?>
				 
				    <?php } ?>
	
	    			</th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    		</tr>

			    	</nav>
			      	<th style="text-align: center; margin-top: 40px;" scope="col">OP <select id='filterText' style='display:inline-block' onchange='filterText()'>
							<option value='all' selected>TUDO</option>
							<option value='25.21'>25.21</option>
							<option value='30.21'>30.21</option>
							<option value='36.21'>36.21</option>
							<option value='48.21'>48.21</option>
							<option value='52.21'>52.21</option>
							<option value='57.21'>57.21</option>
							<option value='66.21'>66.21</option>
							<option value='67.21'>67.21</option>
						</select>
					</th>
			      <th style="text-align: center;" scope="col">Item</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Pedido</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Item Ped.</th>
			      <th style="text-align: center;" scope="col">Cliente</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Projeto</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">QTD.</th>
			      <th style="text-align: center;" scope="col">Equipamento</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Horas Orçadas</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Prazo Contrato</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Início</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Horas Real</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Prazo Previsto</th>
			      <th style="text-align: center;" class ="hidden-xs" scope="col">Término Real</th>
			      <th style="text-align: center;" >Ações</th>
			    </tr>
			  </thead>
		</div>

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
		    	<tbody>
		    		<tr class="content" style="text-align:center; font-family: Oswald;"<?php if($state == 'oculto'){ ?> visibility: hidden <?php } ?> >
				      <td><?php echo $op_num ?></td>
				      <td><?php echo $op_item ?></td>
				      	<td class ="hidden-xs"><?php echo $po_cliente ?></td>
					  	<td class ="hidden-xs"><?php echo $item_po ?></td>
						  <td><?php echo $cliente ?></td>
						  <td class ="hidden-xs"><?php echo $projeto ?></td>
						  <td class ="hidden-xs"><?php echo $qtd ?></td>
						  <td><?php echo $equipamento ?></td>
						  <td class ="hidden-xs"><?php echo $horas_orc ?></td>
						  <td class ="hidden-xs"><?php echo $prazo_contratual ?></td>
						  <td class ="hidden-xs"><?php echo $inicio ?></td>
						  <td class ="hidden-xs"><?php echo $horas_real ?></td>
						  <td class ="hidden-xs"><?php echo $prazo_previsto ?></td>
						  <td class ="hidden-xs"><?php echo $termino_real ?></td>
		      		<td>

			      		<a class="button button1 hidden-xs hidden-sm" form-group href="editar_op.php?id=<?php echo $id_op ?>" >Ver <i class="fas fa-plus"></i></a>
			      		<a class="button-sm button1 hidden-md hidden-lg" form-group href="editar_op.php?id=<?php echo $id_op ?>" ><i class="fas fa-plus"></i></a>


						<a class="button button4 hidden-xs hidden-sm" form-group href="deletar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-trash-alt"></i>&nbsp;Excluir</a>
			      		<a class="button-sm button4 hidden-md hidden-lg" form-group href="deletar_op.php?id=<?php echo $id_op ?>" role="button"><i class="fas fa-trash-alt"></i></a>
		<?php } ?>
			    	</td>
		    	</tr>
		    </tbody>
		</table>
	</div>

	<!-- JavaScript Bundle with Popper -->		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/JavaScript"src="js/bootstrap.js"></script>

	<script>
		function filterText()
			{  
				var rex = new RegExp($('#filterText').val());
				if(rex =="/all/"){clearFilter()}else{
					$('.content').hide();
					$('.content').filter(function() {
					return rex.test($(this).text());
					}).show();
			}
			}
			
		function clearFilter()
			{
				$('.filterText').val('');
				$('.content').show();
			}
	</script>
</body>
</html>