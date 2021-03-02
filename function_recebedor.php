<?php
include 'conexao.php';

function retorna($recebedor, $conexao) {
	$result = "SELECT * FROM recebimento WHERE recebedor = '$recebedor'";
	$resultado = mysqli_query($conexao, $result);
	if($resultado->num_rows){
		$row = mysqli_fetch_assoc($resultado);
		$valores['id_usuario'] = $row['id_usuario'];
	}else{
		$valores['id_usuario'] = '';
	}
	return json_encode($valores);
}
if(isset($_GET['recebedor'])){
	echo retorna($_GET['recebedor'], $conexao);
}
?>