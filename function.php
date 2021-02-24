<?php
include 'conexao.php';

function retorna($cod_material, $conexao) {
	$result = "SELECT * FROM material WHERE cod_material = '$cod_material'";
	$resultado = mysqli_query($conexao, $result);
	if($resultado->num_rows){
		$row = mysqli_fetch_assoc($resultado);
		$valores['den_material'] = $row['den_material'];
		$valores['dim_material'] = $row['dim_material'];
		$valores['mat_material'] = $row['mat_material'];
	}else{
		$valores['den_material'] = 'Código Inválido';
	}
	return json_encode($valores);
}
if(isset($_GET['cod_material'])){
	echo retorna($_GET['cod_material'], $conexao);
}
?>