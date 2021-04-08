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

$op_num = $_POST['op_num'];
$op_item = $_POST['op_item'];
$po_cliente = $_POST['po_cliente'];
$item_po = $_POST['item_po'];
$cliente = $_POST['cliente'];
$projeto = $_POST['projeto'];
$qtd = $_POST['qtd'];
$equipamento = $_POST['equipamento'];
$horas_orc = $_POST['horas_orc'];
$prazo_contratual = $_POST['prazo_contratual'];
$inicio = $_POST['inicio'];

$sql = "INSERT INTO `op`( `op_num`,`op_item`,`po_cliente`,`item_po`,`cliente`,`projeto`,`qtd`,`equipamento`,`horas_orc`,`prazo_contratual`, `inicio`, `horas_real`, `prazo_previsto`, `termino_real`) VALUES ($op_num, '$op_item', '$po_cliente', '$item_po', '$cliente', '$projeto', '$qtd', '$equipamento', '$horas_orc', '$prazo_contratual', '$inicio', 0, '2021-01-01', '2021-01-01')";
$inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width:400px; margin-top: 20px;">
<center>
	<h3>Pedido adicionado com sucesso!</h3>
	<div style="margin-top: 20px">
		<a href="op.php" class="btn btn-warning">Voltar</a>
</center>
</div>

