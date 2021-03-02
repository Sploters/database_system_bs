<?php
include 'conexao.php';

function retorna($cnpj, $conexao) {
	$result = "SELECT * FROM fornecedor WHERE cnpj = '$cnpj'";
	$resultado = mysqli_query($conexao, $result);
	if($resultado->num_rows){
		$row = mysqli_fetch_assoc($resultado);
		$valores['nome_fornecedor'] = $row['nome_fornecedor'];
	}else{
		$valores['nome_fornecedor'] = 'CNPJ Inválido';
	}
	return json_encode($valores);
}
if(isset($_GET['cnpj'])){
	echo retorna($_GET['cnpj'], $conexao);
}
?>