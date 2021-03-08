<?php
include 'conexao.php';

function retorna($pedido_num, $conexao) {
	$result = "SELECT * FROM pedido WHERE pedido_num = '$pedido_num'";
	$resultado = mysqli_query($conexao, $result);
	if($resultado->num_rows){
		$row = mysqli_fetch_assoc($resultado);
		$valores['id_pedido'] = $row['id_pedido'];
	} //else{
	// 	$valores['id_pedido'] = 'Pedido Não Cadastrado';
	// }
	return json_encode($valores);
}
if(isset($_GET['pedido_num'])){
	echo retorna($_GET['pedido_num'], $conexao);
}
?>