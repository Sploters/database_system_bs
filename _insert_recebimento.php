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

 $dataB = $_POST['data_receb'];
//Pegue a data no formato dd/mm/yyyy
//Exploda a data para entrar no formato aceito pelo DB.
$dataP = explode('/', $dataB);
//Altera a data para o Banco de Dados ler.

 $id_usuario =  $_POST['id_usuario'];
 $id_fornecedor =  $_POST['id_fornecedor'];
 $nome_fornecedor =  $_POST['nome_fornecedor'];
 $id_origem = $_POST['id_origem'];
 $ticket = $_POST['ticket'];
 $recebedor = $_POST['recebedor'];//FELIPE
 $data_receb = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
 $qtd_receb = $_POST['qtd_receb'];
 $nf_num = $_POST['nf_num'];
 $item_nf = $_POST['item_nf'];
 $id_pedido = $_POST['id_pedido'];
 $pedido_num = $_POST['pedido_num'];
 $item_pedido = $_POST['item_pedido'];
 //$id_op = $_POST['id_op'];
 // $status_receb = $_POST['status_receb'];//

 $cod_material = $_POST['cod_material'];
 $den_material = $_POST['den_material'];
 $dim_material = $_POST['dim_material'];
 $mat_material = $_POST['mat_material'];
 //$status_certificado = $_POST['status_certificado'];
 $id_material =  $_POST['id_material'];
 $numero_certificado = $_POST['num_certificado'];
	$sql = "SELECT id_certificado FROM `certificado`";
		$busca = mysqli_query($conexao,$sql);
		while ($array = mysqli_fetch_array($busca))
		{
			$id_certificado = 1 + $array['id_certificado'];

			if ($numero_certificado == ''){
				$num_certificado = "Pendente";
				$num_certificado;
			}
			else{
				$num_certificado = $_POST['num_certificado'];
				$num_certificado;
			}
		}

$sql = "INSERT INTO `certificado` (`num_certificado`) VALUES ($num_certificado)";
$inserir = mysqli_query($conexao,$sql);


echo $sql = "INSERT INTO `recebimento` ( `id_usuario`, `id_fornecedor`, `nome_fornecedor`, `id_certificado`, `id_origem`, `id_material`, `ticket`, `recebedor`, `data_receb`, `qtd_receb`, `nf_num`, `item_nf`, `id_pedido`, `pedido_num`, `item_pedido`, `num_certificado`) VALUES ($id_usuario, $id_fornecedor, '$nome_fornecedor', $id_certificado, $id_origem, $id_material, $ticket, '$recebedor', '$data_receb', $qtd_receb, $nf_num, '$item_nf', $id_pedido, $pedido_num, '$item_pedido', '$num_certificado')";
$inserir = mysqli_query($conexao,$sql);

?>

<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Recebimento adicionado com sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="recebimento.php" role="button" class="btn btn-warning">Voltar</a>
	</div>
</center>
</div>