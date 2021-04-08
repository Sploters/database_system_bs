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

$id = $_POST['id'];
$op_num = $_POST['op_num'];
$op_item = $_POST['op_item'];
$po_cliente = $_POST['po_cliente'];
$item_po = $_POST['item_po'];
$projeto = $_POST['projeto'];
$qtd = $_POST['qtd'];
$equipamento = $_POST['equipamento'];
$horas_orc = $_POST['horas_orc'];
$prazo_contratual = $_POST['prazo_contratual'];
$inicio = $_POST['inicio'];
$horas_real = $_POST['horas_real'];
$prazo_previsto = $_POST['prazo_previsto'];
$termino_real = $_POST['termino_real'];

$sql = "UPDATE `op` SET `op_num`= $op_num,`op_item`='$op_item', `po_cliente`= '$po_cliente', `item_po`= '$item_po', `projeto`= '$projeto',`qtd`= $qtd,`equipamento`= '$equipamento',`horas_orc`= $horas_orc,`prazo_contratual`= '$prazo_contratual',`inicio`= '$inicio',`horas_real`= $horas_real,`prazo_previsto`= '$prazo_previsto',`termino_real`= '$termino_real' WHERE id_op = $id";

$atualizar = mysqli_query($conexao,$sql);
?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Atualizado com Sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="op.php" class="btn btn-warning">Voltar</a>
</center>
</div>